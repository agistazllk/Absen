<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-primary mb-4">
  <div class="container">
    <a class="navbar-brand" href="#">📋 Data Mahasiswa</a>
  </div>
</nav>

<div class="container">
  <h3 class="text-center mb-4">Daftar Mahasiswa</h3>

  <?php
  // Data mahasiswa (contoh statis)
  $mahasiswa = [
    ["NIM" => "23753001", "Nama" => "Agista", "Prodi" => "Manajemen Informatika"],
    ["NIM" => "23753002", "Nama" => "Budi", "Prodi" => "Teknik Komputer"],
    ["NIM" => "23753003", "Nama" => "Sinta", "Prodi" => "Teknologi Informasi"]
  ];
  ?>

  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Program Studi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      foreach ($mahasiswa as $mhs) {
        echo "<tr>
                <td>{$no}</td>
                <td>{$mhs['NIM']}</td>
                <td>{$mhs['Nama']}</td>
                <td>{$mhs['Prodi']}</td>
              </tr>";
        $no++;
      }
      ?>
    </tbody>
  </table>
</div>

<footer class="bg-dark text-white text-center py-3 mt-5">
  <p>&copy; 2025 Data Mahasiswa | Dibuat dengan ❤️ PHP + Bootstrap</p>
</footer>

</body>
</html>
