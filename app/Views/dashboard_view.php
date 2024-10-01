<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
  <div class="container">
    <a class="navbar-brand" href="#">Bioskop Management</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <button class="btn btn-danger" onclick="window.location.href='/login/logout'">Logout</button>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <h1 class="text-center mb-4">PENGELOLAAN FILM BIOSKOP</h1>

  <!-- Tombol untuk memunculkan modal -->
  <div class="text-end mb-3">
    <!-- Ganti data-toggle menjadi data-bs-toggle -->
    <button class="btn btn-primary shadow-sm fw-bold" data-bs-toggle="modal" data-bs-target="#addItemModal">Tambah Film
      +</button>
  </div>

  <!-- Modal Tambah Data -->
  <div class="modal fade" id="addItemModal" tabindex="-1" aria-labelledby="addItemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addItemModalLabel">Tambah Film</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/dashboard/create" method="post">
            <div class="row">
              <div class="col mb-3">
                <label for="name" class="form-label">Nama Film</label>
                <input type="text" name="nama_film" class="form-control" placeholder="Masukkan nama film" required>
                <label for="genre" class="form-label">Genre</label>
                <select name="genre" class="form-select" required>
                  <option value="" disabled selected>Pilih genre</option>
                  <?php foreach($genres as $genre): ?>
                  <option value="<?= $genre['id_genre']; ?>"><?= $genre['nama_genre']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col mb-3">
                <label for="duration" class="form-label">Durasi</label>
                <input type="text" name="durasi" class="form-control" placeholder="Durasi dalam menit" required>
                <label for="sinopsis" class="form-label">Sinopsis</label>
                <textarea name="sinopsis" class="form-control" rows="4" placeholder="Masukkan sinopsis"
                  required></textarea>
              </div>
            </div>
            <!-- Tombol aksi -->
            <div class="text-end">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Tambah Film</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php if(session()->getFlashdata('success')): ?>
  <div class="alert alert-success" role="alert">
    <?= session()->getFlashdata('success') ?>
  </div>
  <?php endif; ?>

  <!-- Tabel Item -->
  <div class="card shadow-sm">
    <div class="card-body">
      <h5 class="card-title mb-4">Pengelolaan Film</h5>
      <table class="table table-hover">
        <thead class="table-dark">
          <tr>
            <th>#</th>
            <th>Nama Film</th>
            <th>Genre</th>
            <th>Durasi</th>
            <th>Sinopsis</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($movies as $movie): ?>
          <tr>
            <td><?= $movie['id'] ?></td>
            <td><?= $movie['nama_film'] ?></td>
            <td><?= $movie['genre_name'] ?></td>
            <td><?= $movie['duration'] ?></td>
            <td class="text-truncate" style="max-width: 250px;"><?= $movie['sinopsis'] ?></td>
            <td>
              <a href="/dashboard/edit/<?= $movie['id'] ?>" class="btn btn-sm btn-success text-white fw-bold">Edit</a>
              |
              <a href="/dashboard/delete/<?= $movie['id'] ?>" class="btn btn-sm btn-danger text-white fw-bold"
                onclick="return confirm('Are you sure?')">Hapus</a>
            </td>

          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?= $this->endSection() ?>