<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class GuruFilter implements FilterInterface
{
    public function before(RequestInterface $request, $args = null)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        if (session()->get('role') !== 'guru') {
            return redirect()->to('/');
        }

        if (session()->get('status') === 'pending') {
            return redirect()->to('/guru/pending');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $args = null) {}
}

