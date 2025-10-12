<?php
use CodeIgniter\Config\Services;

/** Cek 1 role (flag 0/1 di session) */
function hasRole(string $key): bool
{
    return (int)(session($key) ?? 0) === 1;
}

/** Cek salah satu dari banyak role */
function anyRole(array $keys): bool
{
    foreach ($keys as $k) {
        if (hasRole($k)) return true;
    }
    return false;
}

/**
 * Return "active" kalau URL sekarang match kondisi segmen.
 * $conds: [segIndex => 'nilai']  (segIndex mulai dari 1)
 * contoh: isActive([1=>'masterdata', 2=>'dapeghtd'])
 */
function isActive(array $conds): string
{
    $uri = new \CodeIgniter\HTTP\URI(current_url(true));
    foreach ($conds as $i => $val) {
        $seg = $uri->getSegment((int)$i);

        // jika diminta null -> segmen harus kosong/tidak ada
        if ($val === null) {
            if ($seg !== null && $seg !== '') return '';
        } else {
            if ($seg !== $val) return '';
        }
    }
    return 'active';
}

/**
 * Cetak <li><a> menu item, hanya jika user punya role yang diminta.
 *
 * @param string              $label    Teks label menu
 * @param string              $url      site_url() path, contoh: 'masterdata/dapeghtd'
 * @param string|array        $roles    'role_user' atau ['role_aps','role_admin']
 * @param string|null         $icon     nama ikon csicons, contoh 'database' (opsional)
 * @param array               $activeIf Kondisi segmen utk class active, contoh [1=>'masterdata',2=>'dapeghtd']
 */
/**
 * $requireAll: false=ANY (default), true=ALL
 */
function menuItem(string $label, string $url, $roles, ?string $icon = null, array $activeIf = [], bool $requireAll = false): void
{
    $allowed = is_array($roles)
        ? ($requireAll ? allRoles($roles) : anyRole($roles))
        : hasRole($roles);

    if (!$allowed) return;

    // aktif?
    $active = '';
    if ($activeIf) {
        $uri = new \CodeIgniter\HTTP\URI(current_url(true));
        $ok = true;
        foreach ($activeIf as $i => $val) {
            $seg = $uri->getSegment((int)$i);
            if ($val === null) { if ($seg !== null && $seg !== '') $ok = false; }
            else               { if ($seg !== $val)               $ok = false; }
        }
        $active = $ok ? 'active' : '';
    }

    echo '<li><a href="'.site_url($url).'" class="'.$active.'">';
    if ($icon) echo '<i data-cs-icon="'.$icon.'" class="icon" data-cs-size="12"></i> ';
    echo '<span class="label">'.$label.'</span></a></li>';
}
