<?php

namespace App\Models;
use CodeIgniter\Model;

class MovieModel extends Model
{
    protected $table = 'film'; // Tabel yang digunakan
    protected $primaryKey = 'id'; // Primary key tabel
    protected $allowedFields = ['nama_film', 'id_genre', 'duration', 'sinopsis']; // Field yang bisa diisi

    // Method untuk mendapatkan semua film beserta genre-nya
    public function getAllMoviesWithGenre()
    {
        return $this->select('film.*, genre.nama_genre as genre_name')
                    ->join('genre', 'genre.id_genre = film.id_genre')
                    ->findAll();
    }

    public function getMovieForEdit($id)
    {
    return $this->select('film.*, genre.nama_genre as genre_name')
                ->join('genre', 'genre.id_genre = film.id_genre')
                ->where('film.id', $id)  // Ambil film berdasarkan ID
                ->first();  // Mengambil satu record
    }

}