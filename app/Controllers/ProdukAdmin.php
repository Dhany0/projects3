<?php namespace App\Controllers;

use App\Models\ProdukModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class ProdukAdmin extends BaseController
{
    protected $produkModel;

    public function __construct()
    {
        // Pastikan Anda sudah membuat file model ProdukModel.php
        // Model ini akan digunakan untuk berinteraksi dengan tabel 'produk'
        $this->produkModel = new ProdukModel();
    }

    // Menampilkan daftar semua produk (CREATE & READ)
    // Tampilan akan berada di app/Views/admin_produk_list.php
    public function index()
    {
        $data = [
            'daftar_produk' => $this->produkModel->findAll()
        ];
        return view('admin_produk_list', $data);
    }

    // Menampilkan form untuk menambah produk baru (CREATE)
    // Tampilan akan berada di app/Views/admin_produk_create.php
    public function new()
    {
        return view('admin_produk_create');
    }

    // Menyimpan produk baru ke database (CREATE)
    public function create()
    {
        // Aturan validasi
        $validationRules = [
            'nama_produk' => 'required|min_length[5]|max_length[255]',
            'deskripsi_produk' => 'required',
            'harga' => 'required|numeric',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $data = [
            'nama_produk' => $this->request->getPost('nama_produk'),
            'deskripsi_produk' => $this->request->getPost('deskripsi_produk'),
            'harga' => $this->request->getPost('harga'),
            'status' => 'tersedia', // Contoh status default
            'id_pengguna' => 1, // Ganti dengan ID pengguna yang sedang login
        ];

        $this->produkModel->save($data);

        return redirect()->to(site_url('admin/produk'))->with('success', 'Produk berhasil ditambahkan!');
    }

    // Menampilkan form untuk mengedit produk yang sudah ada (UPDATE)
    // Tampilan akan berada di app/Views/admin_produk_edit.php
    public function edit($id)
    {
        $data = [
            'produk' => $this->produkModel->find($id)
        ];

        if (!$data['produk']) {
            throw PageNotFoundException::forPageNotFound('Produk tidak ditemukan.');
        }
        return view('admin_produk_edit', $data);
    }

    // Memperbarui produk di database (UPDATE)
    public function update($id)
    {
        // Aturan validasi
        $validationRules = [
            'nama_produk' => 'required|min_length[5]|max_length[255]',
            'deskripsi_produk' => 'required',
            'harga' => 'required|numeric',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $data = [
            'nama_produk' => $this->request->getPost('nama_produk'),
            'deskripsi_produk' => $this->request->getPost('deskripsi_produk'),
            'harga' => $this->request->getPost('harga'),
            'status' => $this->request->getPost('status'),
        ];

        $this->produkModel->update($id, $data);

        return redirect()->to(site_url('admin/produk'))->with('success', 'Produk berhasil diperbarui!');
    }

    // Menghapus produk dari database (DELETE)
    public function delete($id)
    {
        $this->produkModel->delete($id);

        return redirect()->to(site_url('admin/produk'))->with('success', 'Produk berhasil dihapus!');
    }
}