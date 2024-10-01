<?php

namespace App\Models;
use CodeIgniter\Model;

class GenreModel extends Model{

    protected $table = "genre"; // Nama tabel genre
    protected $primaryKey = "id_genre"; // Primary key pada tabel genre
    protected $useAutoIncrement = true; // Menggunakan auto increment untuk primary key
    protected $allowedFields = ['nama_genre']; // Field yang diizinkan untuk insert/update

    // Method untuk mengambil semua genre
    public function getAllGenre()
    {
        return $this->findAll(); // Mengambil semua genre
    }

    public function getGenre($id)
    {
    return $this->where('id_genre', $id)->first();
    }

}