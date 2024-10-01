<?php namespace App\Controllers;

use App\Models\LoginModel;
use CodeIgniter\Controller;

class Login extends Controller
{
    public function index()
    {
        return view('login_view');
    }

    public function authenticate()
    {
        $session = session();
        $LoginModel = new LoginModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Ambil data user berdasarkan username
        $user = $LoginModel->getUser($username);

        if ($user) {
            // Periksa apakah password sesuai
            if ($password === $user['password']) {
                // Set session jika login berhasil
                $sessionData = [
                    'username' => $user['username'],
                    'logged_in' => TRUE
                ];
                $session->set($sessionData);
                return redirect()->to('/dashboard'); // Ganti dengan halaman dashboard
            } else {
                // Jika password salah
                $session->setFlashdata('error', 'Password salah!');
                return redirect()->to('/login');
            }
        } else {
            // Jika username tidak ditemukan
            $session->setFlashdata('error', 'Username tidak ditemukan!');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}