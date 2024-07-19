<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class LoginController extends BaseController
{
  
    public function process()
{
    // Ambil data dari form login
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');

    // Validasi login (contoh sederhana menggunakan UserModel)
    $userModel = new UserModel();
    $user = $userModel->where('username', $username)
                     ->where('password', md5($password))
                     ->first();

    if ($user) {
        // Set session untuk user yang berhasil login
        $session = session();
        $userData = [
            'iduser' => $user['iduser'],
            'username' => $user['username'],
            'nama' => $user['nama']
            // Tambahkan sesuai kebutuhan lainnya
        ];
        $session->set($userData);

        return redirect()->to('/kecamatan')->with('status', 'Login berhasil. Selamat datang!');
    } else {
        // Jika login gagal, kembali ke halaman login dengan pesan error
        return redirect()->to('/kecamatan')->with('error', 'Login gagal. Username atau password salah.');
    }
}

public function logout()
{
    // Hapus sesi saat logout
    $session = session();
    $session->destroy();
    return redirect()->to('/kecamatan')->with('status', 'Data bengkel berhasil ditambahkan');
}

}
