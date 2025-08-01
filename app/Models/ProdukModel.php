<?php namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'produk_id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama_produk', 'deskripsi_produk', 'harga', 'status', 'id_pengguna'];

    // Anda bisa menambahkan validasi di sini jika diperlukan
    // protected $validationRules = [
    //     'nama_produk' => 'required|min_length[5]|max_length[255]',
    //     'harga' => 'required|numeric',
    // ];
    // protected $validationMessages = [];
}