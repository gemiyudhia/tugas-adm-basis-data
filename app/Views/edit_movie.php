<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Item</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <?= $this->extend('layout') ?>
  <?= $this->section('content') ?>

  <div class="container mt-5">
    <h1 class="text-center mb-4">Edit Item</h1>

    <div class="bg-white p-4 rounded shadow mb-4">
      <form action="/dashboard/update/<?= $item['id'] ?>" method="post">
        <div class="mb-3">
          <label for="nama_film" class="form-label">Nama Film</label>
          <input type="text" name="nama_film" value="<?= $item['nama_film'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="genre" class="form-label">Genre</label>
          <select name="genre" class="form-select" required>
            <option value="">Pilih Genre</option>
            <?php foreach ($genres as $genre): ?>
            <option value="<?= $genre['id_genre'] ?>" <?= $item['id_genre'] == $genre['id_genre'] ? 'selected' : '' ?>>
              <?= $genre['nama_genre'] ?>
            </option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="mb-3">
          <label for="durasi" class="form-label">Durasi</label>
          <input type="text" name="durasi" value="<?= $item['duration'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="sinopsis" class="form-label">Sinopsis</label>
          <textarea name="sinopsis" class="form-control" required><?= $item['sinopsis'] ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Edit Film</button>
      </form>
    </div>
  </div>

  <?= $this->endSection() ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
</body>

</html>