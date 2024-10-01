<?php namespace App\Controllers;

use App\Models\MovieModel;
use App\Models\GenreModel;
use CodeIgniter\Controller;

class Dashboard extends Controller
{
    protected $movieModel;
    protected $genreModel;

    public function __construct()
    {
        $this->movieModel = new MovieModel(); // Inisialisasi MovieModel
        $this->genreModel = new GenreModel(); // Inisialisasi GenreModel
    }


    public function index()
    {
        // Ambil data film beserta genre-nya
        $data['movies'] = $this->movieModel->getAllMoviesWithGenre();
        $data['genres'] = $this->genreModel->getAllGenre();

        // Kirim data ke view
        return view('dashboard_view', $data); 
    }


    public function create()
    {
        // Menggunakan movieModel untuk menyimpan data
        $this->movieModel->save([
            'nama_film' => $this->request->getPost('nama_film'),
            'genre_id' => $this->request->getPost('genre'), // Ambil genre dari select
            'durasi' => $this->request->getPost('durasi'),
            'sinopsis' => $this->request->getPost('sinopsis')
        ]);

        return redirect()->to('/dashboard'); // Redirect ke halaman dashboard
    }

    public function edit($id)
    {
        // Mengambil item film berdasarkan id dengan genre
        $data['item'] = $this->movieModel->getMovieForEdit($id);
        $data['genres'] = (new GenreModel())->findAll();  // Mengambil daftar genre
        
        if (!$data['item']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Film tidak ditemukan');
        }

        return view('edit_movie', $data); // Kirim data ke view untuk edit
    }


    public function update($id)
    {
        $data = [
            'nama_film' => $this->request->getPost('nama_film'),
            'id_genre' => $this->request->getPost('genre'),
            'duration' => $this->request->getPost('durasi'),
            'sinopsis' => $this->request->getPost('sinopsis')
        ];

        log_message('info', 'Update data: ' . print_r($data, true));

        $this->movieModel->update($id, $data);

        return redirect()->to('/dashboard')->with('success', 'Film berhasil diperbarui');
    }


    public function delete($id)
    {
        // Hapus data movie berdasarkan id
        $this->movieModel->delete($id);

        return redirect()->to('/dashboard'); // Redirect ke halaman dashboard
    }
}