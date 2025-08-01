<?php namespace App\Controllers;

class Contact extends BaseController
{
    public function submit()
    {
        // Ambil data dari formulir
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $subject = $this->request->getPost('subject');
        $message = $this->request->getPost('message');

        // Lakukan sesuatu dengan data di sini (misalnya, kirim email)
        
        // Beri pesan sukses dan kembali ke halaman kontak
        session()->setFlashdata('success', 'Pesan Anda berhasil dikirim!');
        return redirect()->to(base_url('contact'));
    }
}