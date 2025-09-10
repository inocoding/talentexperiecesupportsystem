/**
 * EditableRows - versi AJAX untuk #datatableRows
 */
class EditableRows {
  constructor() {
    if (!jQuery().DataTable) {
      console.log('DataTable is null!');
      return;
    }
    this._datatable = null;
    this._addEditModal = null;
    this._currentState = 'add';
    this._rowEditingNip = null;
    this._staticHeight = 62;

    this._createInstance();
    this._initBootstrapModal();
    this._wireButtons();
  }

  _createInstance() {
    const _this = this;
    const csrfName  = document.querySelector('meta[name="csrf-token-name"]').content;
    const csrfValue = document.querySelector('meta[name="csrf-token-value"]').content;

    this._datatable = jQuery('#datatableRows').DataTable({
      scrollX: true,
      buttons: ['copy', 'excel', 'csv', 'print'],
      info: false,
      serverSide: true,
      processing: true,
      searching: true,
      pageLength: 5,
      ajax: {
        url: `${window.location.origin}${window.location.pathname.includes('/masterdata') ? '' : ''}/masterdata/users_json`,
        dataSrc: 'data'
      },
      order: [], // sesuai view (tanpa default order)
      columns: [
        // No (auto number per page)
        { data: null, render: (d,t,r,meta)=> meta.row + 1 + (meta.settings._iDisplayStart), className:'text-nowrap' },
        // NIP (link)
        { data: 'nip', render: (d)=> d },
        // Nama Pegawai
        { data: 'nama_user' },
        // HTD Area (nama)
        { data: 'nama_htd' },
        // Role HTD (mapping 0..5)
        { data: 'role_htd', render: (d)=>{
            const map = {0:'Staf HTD',1:'Asman HTD',2:'MSB HTD',3:'VP HTD',4:'EVP HTD',5:'Non HTD'};
            return map[d] ?? '-';
        }},
        // Role badges (seperti view kamu)
        { data: null, render: (row)=>{
            const show = (flag, cls, txt)=> flag==1 ? `<span class="badge ${cls} me-1">${txt}</span>` : '';
            const html = [
              show(row.role_organisasi,'bg-outline-primary','Role Organisasi'),
              show(row.role_user,'bg-outline-success','Role User'),
              show(row.role_mutasi,'bg-outline-secondary','Role Mutasi'),
              show(row.role_komite,'bg-outline-tertiary','Role Komite'),
              show(row.role_dapeg,'bg-outline-info','Role Dapeg'),
              show(row.role_tugas_karya,'bg-outline-success','Role Tugas Karya'),
              show(row.role_ptb,'bg-outline-danger','Role PTB'),
              show(row.role_pensiun_dini,'bg-outline-warning','Role Pensiun Dini'),
              show(row.role_resign,'bg-outline-info','Role Resign'),
              show(row.role_mpp,'bg-outline-warning','Role Mpp'),
              show(row.role_ojt,'bg-outline-dark','Role Ojt'),
              show(row.role_idt,'bg-outline-primary','Role IDT'),
              show(row.role_aps,'bg-outline-secondary','Role APS'),
              show(row.role_fnp_admin,'bg-outline-tertiary','Role Adm FnP'),
              show(row.role_fnp_penguji,'bg-outline-success','Role Penguji FnP'),
              show(row.role_admin_komite,'bg-outline-danger','Role Admin TCM'),
            ].join('');
            return `<div style="max-width:200px; white-space:normal;">${html||'-'}</div>`;
        }},
        // Activation
        { data: 'ket_aktif', render: d => d==1 ? 'Activated' : 'Unactivated' },
        // Action buttons
        { data: null, orderable:false, render: (row)=> `
            <div class="d-inline-block">
              <button class="btn btn-icon btn-icon-only btn-foreground-alternate edit-datatable" data-nip="${row.nip}" title="Edit">
                <i data-cs-icon="edit"></i>
              </button>
              <button class="btn btn-icon btn-icon-only btn-foreground-alternate delete-datatable" data-nip="${row.nip}" title="Delete">
                <i data-cs-icon="bin"></i>
              </button>
            </div>
        `}
      ],
      language: { paginate: false },
      initComplete: function () { _this._setInlineHeight(); },
      drawCallback: function () {
        _this._setInlineHeight();
        _this._bindRowButtons(); // re-bind edit/delete setiap draw
      },
    });

    // helper untuk membuat SITE_URL seperti di PHP
    window.SITE_URL = function(path){ 
      const base = document.querySelector('base')?.href || '<?= rtrim(site_url(),"/") ?>/';
      return base + path.replace(/^\/+/,'');
    };
  }

  _initBootstrapModal() {
    this._addEditModal = new bootstrap.Modal(document.getElementById('addEditModal'));
    // pastikan tombol konfirm modal mengarah ke submit form
    const btn = document.getElementById('addEditConfirmButton');
    if (btn) {
      btn.onclick = () => document.getElementById('userForm')?.dispatchEvent(new Event('submit', {cancelable:true, bubbles:true}));
    }
  }

  _wireButtons() {
    // tombol Add di header (kelas sudah ada: .add-dapeg)
    document.querySelectorAll('.add-dapeg').forEach(el=>{
      el.addEventListener('click', (e)=>{
        e.preventDefault();
        this._currentState = 'add';
        this._rowEditingNip = null;
        this._setModalTitle('Add New','Add');
        this._fillForm(null); // kosong
        this._showAddFields(true);
        this._addEditModal.show();
      });
    });

    // submit form (add/edit)
    const form = document.getElementById('userForm');
    if (form) {
      form.addEventListener('submit', (e)=>{
        e.preventDefault();
        const fd = new FormData(form);
        const csrfName  = document.querySelector('meta[name="csrf-token-name"]').content;
        const csrfValue = document.querySelector('meta[name="csrf-token-value"]').content;
        fd.append(csrfName, csrfValue);

        const isEdit = (this._currentState === 'edit');
        const url = isEdit 
          ? SITE_URL('masterdata/user_update/'+ this._rowEditingNip)
          : SITE_URL('masterdata/user_store');

        fetch(url, { method:'POST', body: fd })
          .then(async r=>{
            if (!r.ok) {
              const j = await r.json().catch(()=> ({}));
              const msg = (j.errors) ? Object.values(j.errors).join('\n') : (j.message || r.statusText);
              throw new Error(msg);
            }
            return r.json();
          })
          .then(()=>{
            this._addEditModal.hide();
            jQuery('#datatableRows').DataTable().ajax.reload(null,false);
          })
          .catch(err=> alert('Gagal menyimpan: '+err.message));
      });
    }
  }

  _bindRowButtons() {
    // Edit
    document.querySelectorAll('#datatableRows .edit-datatable').forEach(btn=>{
      btn.addEventListener('click', (e)=>{
        e.preventDefault();
        const nip = btn.getAttribute('data-nip');
        fetch(SITE_URL('masterdata/user_show/'+nip))
          .then(r=>r.json())
          .then(u=>{
            this._currentState = 'edit';
            this._rowEditingNip = nip;
            this._setModalTitle('Edit','Done');
            this._fillForm(u);
            this._showAddFields(false); // sembunyikan input password default
            this._addEditModal.show();
          }).catch(()=> alert('Data tidak ditemukan'));
      });
    });

    // Delete
    document.querySelectorAll('#datatableRows .delete-datatable').forEach(btn=>{
      btn.addEventListener('click', (e)=>{
        e.preventDefault();
        const nip = btn.getAttribute('data-nip');
        if (!confirm('Apakah anda yakin menghapus data ini?')) return;

        const fd = new FormData();
        const csrfName  = document.querySelector('meta[name="csrf-token-name"]').content;
        const csrfValue = document.querySelector('meta[name="csrf-token-value"]').content;
        fd.append(csrfName, csrfValue);

        fetch(SITE_URL('masterdata/user_delete/'+nip), { method:'POST', body: fd })
          .then(async r=>{
            if (!r.ok) {
              const j = await r.json().catch(()=> ({}));
              throw new Error(j.message || r.statusText);
            }
          })
          .then(()=> jQuery('#datatableRows').DataTable().ajax.reload(null,false))
          .catch(err=> alert('Gagal menghapus: '+err.message));
      });
    });
  }

  _setModalTitle(title, button) {
    const h = document.getElementById('modalTitle');
    const b = document.getElementById('addEditConfirmButton');
    if (h) h.textContent = title;
    if (b) b.textContent = button;
  }

  _fillForm(u) {
    const f = document.getElementById('userForm');
    if (!f) return;
    f.reset();
    f.mode.value = u ? 'edit' : 'add';
    f.querySelector('[name="nip"]').readOnly = !!u;

    const set = (name, val)=> { const el = f.querySelector(`[name="${name}"]`); if (el) el.value = (val ?? ''); };

    set('nip', u?.nip);
    set('nama_user', u?.nama_user);
    set('htd_area', u?.htd_area);
    set('unit_induk', u?.unit_induk);
    set('unit_pelaksana', u?.unit_pelaksana);
    set('sub_unit_pelaksana', u?.sub_unit_pelaksana);
    set('role_htd', u?.role_htd ?? 0);
    set('ket_aktif', u?.ket_aktif ?? 1);
    // password: hanya saat add
  }

  _showAddFields(show) {
    document.querySelectorAll('#userForm .add-only').forEach(el=>{
      el.classList.toggle('d-none', !show);
    });
  }

  _setInlineHeight() {
    const pageLength = this._datatable?.page?.len?.() ?? 5;
    const body = document.querySelector('.dataTables_scrollBody');
    if (body) body.style.height = (this._staticHeight * pageLength) + 'px';
  }
}

if ($.fn.DataTable.isDataTable('#datatableRows')) {
  try {
    $('#datatableRows').DataTable().destroy(true); // true = bersihkan DOM tambahan
  } catch (e) {}
  // pastikan tbody bersih (thead tetap)
  $('#datatableRows tbody').empty();
}

// init
// document.addEventListener('DOMContentLoaded', () => new EditableRows());

// GANTI dengan guard berikut:
(function(){
  if (window.__editableRowsInit) return;
  window.__editableRowsInit = true;
  new EditableRows();
})();