<?php
namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!$arguments || count($arguments) === 0) return;

        // Jika argumen pertama 'ALL', semua role wajib ada
        $requireAll = false;
        if (strtoupper($arguments[0] ?? '') === 'ALL') {
            $requireAll = true;
            array_shift($arguments);
        }

        $ok = $requireAll ? $this->all($arguments) : $this->any($arguments);
        if ($ok) return;

        // Tidak memenuhi role
        return redirect()->to(site_url('forbidden')); // bikin route/view sederhana
    }

    private function any(array $roles): bool
    {
        foreach ($roles as $r) {
            if ((int)(session($r) ?? 0) === 1) return true;
        }
        return false;
    }

    private function all(array $roles): bool
    {
        foreach ($roles as $r) {
            if ((int)(session($r) ?? 0) !== 1) return false;
        }
        return true;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {}
}
