<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
        return redirect()->to(site_url('login'));
    }

    public function login()
    {
        if (session('user_id')) {
            return redirect()->to(site_url('home'));
        } else {
            return view('auth/login');
        }
    }

    public function proseslogin()
    {
        $post   = $this->request->getPost();
        $query  = $this->db->table('user')->getWhere(['nip' => $post['nip']]);
        $user   = $query->getRow();

        if ($user) {
            if ($user->ket_aktif == 1) {
                if (SHA1($post['password']) == $user->password) {
                    $params = ['user_id' => $user->nip];
                    session()->set($params);

                    return redirect()->to(site_url('home'));
                } else {
                    return redirect()->back()->with('error', 'Password tidak sesuai!');
                }
            } else {
                return redirect()->back()->with('error', 'Akun Sinergi Borneo Anda Belum di Aktivasi. <br> Silahkan lakukan aktivasi terlebih dahulu');
            }
        } else {
            return redirect()->back()->with('error', 'NIP tidak ditemukan!. <br> Silahkan hubungi HTD Area Anda');
        }
    }

    public function logout()
    {
        session()->remove('user_id');
        return redirect()->to(site_url('login'));
    }

    public function aktivasi()
    {
        return view('auth/aktivasi');
    }

    public function prosesaktivasi()
    {
        $post   = $this->request->getPost();
        $query  = $this->db->table('user')->getWhere(['nip' => $post['nip']]);
        $user   = $query->getRow();

        $nip   = $this->request->getPost('nip');

        if ($user) {

            if ($user->ket_aktif == 0) {
                $email1 = $this->request->getPost('email_korpo');
                $email2 = $email1 . '@gmail.com';

                $query  = $this->db->table('user')->getWhere(['email_non' => $email2]);
                $emaill = $query->getRow();

                if ($emaill) {
                    return redirect()->back()->with('error', 'email sudah digunakan !');
                } else {
                    // token
                    $token = base64_encode(random_bytes(32));
                    $user_token = [
                        'email'         => $email2,
                        'token'         => $token,
                        'date_created'  => time(),
                        'nip'           => $nip,
                    ];
                    $data = ['email_non' => $email2,];
                    $this->db->table('user')->where(['nip' => $nip])->update($data);
                    $this->db->table('user_token')->insert($user_token);
                    $this->_sendEmail($token);

                    return redirect()->to(site_url('auth/login'))->with('success', 'Terimakasih ' . $user->nama_user . '. <br>Link aktivasi Akun Sinergi Borneo Anda sudah dikirim ke email ' . $email2 . ', Silahkan buka link tersebut untuk melanjutkan aktivasi Akun Anda.');
                }
            } else {
                return redirect()->back()->with('error', 'NIP sudah diaktivasi !');
            }
        } else {
            return redirect()->back()->with('error', 'NIP tidak ditemukan !');
        }
    }

    private function _sendEmail($token)
    {
        $email = \Config\Services::email();
        $email1 = $this->request->getPost('email_korpo');
        $email2 = $email1 . '@gmail.com';
        $post   = $this->request->getPost();
        $query  = $this->db->table('user')->getWhere(['nip' => $post['nip']]);
        $user   = $query->getRow();


        $email->setTo($email2);

        $email->setSubject('Aktivasi Akun Sinergi Borneo');
        $email->setMessage('<h3>Hai ' . $user->nama_user . '</h3> <br> <h4>Untuk melanjutkan aktivasi Akun Sinergi Borneo Anda <br> Silahkan klik link berikut <a href="' . base_url() . '/auth/verify?email=' . $email2 . '&token=' . urlencode($token) . '">Aktivasi</a></h4>');



        if ($email->send()) {
            return true;
        } else {
            echo $email->printDebugger();
            die;
        }
    }

    public function verify()
    {
        $email_get  = $this->request->getGet('email');
        $token_get  = $this->request->getGet('token');

        $query  = $this->db->table('user')->getWhere(['email_non' => $email_get]);
        $user   = $query->getRow();

        if ($user) {
            $query          = $this->db->table('user_token')->getWhere(['token' => $token_get]);
            $token_query    = $query->getRow();

            if ($token_query) {
                $data2 = ['ket_aktif' => '1',];
                $action = $this->db->table('user')->where(['email_non' => $email_get])->update($data2);

                if ($action) {
                    return redirect()->to(site_url('auth/login'))->with('success', 'Akun Sinergi Borneo Anda telah Aktive, <br>silahkan Login menggunakan password tanggal lahir Anda dengan format "yyyy-mm-dd"');
                }
            } else {
                return redirect()->to(site_url('auth/login'))->with('error', 'Aktivasi Akun Sinergi Borneo Gagal, Token tidak sesuai!');
            }
        } else {
            return redirect()->to(site_url('auth/login'))->with('error', 'Aktivasi Akun Sinergi Borneo Gagal, email tidak sesuai!');
        }
    }

    public function forgot()
    {
        return view('auth/forgot');
    }

    public function prosesforgot()
    {
        $email1 = $this->request->getPost('email_korpo');
        $email2 = $email1 . '@gmail.com';
        $query  = $this->db->table('user')->getWhere(['email_non' => $email2, 'ket_aktif' => '1']);
        $user   = $query->getRow();

        if ($user) {
            $email1 = $this->request->getPost('email_korpo');
            $email2 = $email1 . '@gmail.com';

            // token
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email'         => $email2,
                'token'         => $token,
                'date_created'  => time(),
            ];

            $this->db->table('user_token')->insert($user_token);
            $this->_sendEmailReset($token);

            return redirect()->to(site_url('auth/forgot'))->with('success', 'Terimakasih ' . $user->nama_user . '. <br>Link Reset Password Akun Sinergi Borneo Anda sudah dikirim ke email ' . $email2 . ', Silahkan buka link tersebut untuk melanjutkan Reset Password Akun Anda.');
        } else {
            return redirect()->to('auth/forgot')->with('error', 'Akun tidak ditemukan atau belum diaktivasi');
        }
    }

    private function _sendEmailReset($token)
    {
        $email = \Config\Services::email();
        $email1 = $this->request->getPost('email_korpo');
        $email2 = $email1 . '@gmail.com';

        $email->setTo($email2);

        $email->setSubject('Reset Password Akun Sinergi Borneo');
        $email->setMessage('<h3>Hai</h3> <br> <h4>Untuk melanjutkan Reset Password Akun Sinergi Borneo Anda <br> Silahkan klik link berikut <a href="' . base_url() . '/auth/resetpassword?email=' . $email2 . '&token=' . urlencode($token) . '">Reset Password</a></h4>');

        if ($email->send()) {
            return true;
        } else {
            echo $email->printDebugger();
            die;
        }
    }

    public function resetpassword()
    {
        $email_get  = $this->request->getGet('email');
        $token_get  = $this->request->getGet('token');

        $query  = $this->db->table('user')->getWhere(['email_non' => $email_get]);
        $user   = $query->getRow();

        if ($user) {
            $query          = $this->db->table('user_token')->getWhere(['token' => $token_get]);
            $token_query    = $query->getRow();

            if ($token_query) {
                session()->set('reset_email', $email_get);
                return $this->changePassword();
                // return view('auth/changepassword');
            } else {
                return redirect()->to(site_url('auth/login'))->with('error', 'Reset Password Akun Sinergi Borneo Gagal, Token tidak sesuai!');
            }
        } else {
            return redirect()->to(site_url('auth/login'))->with('error', 'Reset Password Akun Sinergi Borneo Gagal, email tidak sesuai!');
        }
    }

    public function changePassword()
    {
        if (!session('reset_email')) {
            return view('auth/login');
        }

        if (!$this->validate([
            'password' => [
                'rules'     => 'required|min_length[6]',
                'errors'    => [
                    'required'      => '{field} harus diisi.',
                    'min_length'    => '{field} minimal 6 (enam) karakter',
                ]
            ],
            'confirmpassword' => [
                'rules'     => 'matches[password]',
                'errors'    => '{field} tidak sama',
            ]
        ])) {
            $validation = \Config\Services::validation();
            $data['validation'] = $validation;
            return view('auth/changepassword', $data);
        } else {
            $password  = $this->request->getPost('password');
            $password2 = sha1($password);
            $email     = session('reset_email');

            $data2 = ['password' => $password2,];

            $action = $this->db->table('user')->where(['email_non' => $email])->update($data2);
            if ($action) {
                session()->remove('reset_email');
                return redirect()->to(site_url('auth/login'))->with('success', 'Password Anda berhasil diubah, <br>silahkan Login');
            }
        }
    }
}
