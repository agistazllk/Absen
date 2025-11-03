<?php
// 1. Panggil file koneksi.php
include 'koneksi.php';

$status_message = "";
$nim = $nama = $prodi = ''; // Inisialisasi variabel untuk form

// 2. Logika PHP untuk menangani Form Submission (INSERT Data)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];

    // Lakukan koneksi nyata
    $db = getDbConnection();
    
    // Simulasikan Query SQL (Ganti dengan kode query yang sebenarnya saat implementasi)
    $sql = "INSERT INTO mahasiswa (nim, nama, prodi) VALUES ('$nim', '$nama', '$prodi')";
    
    // Simulasikan eksekusi query berhasil
    if (true /* mysqli_query($db, $sql) */) { // Ganti 'true' dengan eksekusi query nyata
        $status_message = "✅ Data Mahasiswa dengan NIM: $nim berhasil ditambahkan (simulasi).";
        // Bersihkan nilai form setelah sukses
        $nim = $nama = $prodi = '';
    } else {
        $status_message = "❌ Gagal menambahkan data!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-primary mb-4">
  <div class="container">
    <a class="navbar-brand" href="index.php">📋 Kembali ke Data Mahasiswa</a>
  </div>
</nav>

<div class="container">
  <h3 class="mb-4">Tambah Data Mahasiswa Baru</h3>

  <?php if (!empty($status_message)): ?>
      <div class="alert alert-<?= (strpos($status_message, '❌') !== false) ? 'danger' : 'success' ?> alert-dismissible fade show" role="alert">
          <?= $status_message ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
  <?php endif; ?>

  <div class="card p-4">
      <form method="POST" action="tambah.php" onsubmit="return validateForm()">
          
          <div class="mb-3">
              <label for="nim" class="form-label">NIM</label>
              <input type="text" class="form-control" id="nim" name="nim" required value="<?= htmlspecialchars($nim) ?>">
          </div>
          
          <div class="mb-3">
              <label for="nama" class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control" id="nama" name="nama" required value="<?= htmlspecialchars($nama) ?>">
          </div>
          
          <div class="mb-3">
              <label for="prodi" class="form-label">Program Studi</label>
              <select class="form-select" id="prodi" name="prodi" required>
                  <option value="">Pilih Program Studi</option>
                  <option value="Manajemen Informatika" <?= ($prodi == 'Manajemen Informatika') ? 'selected' : '' ?>>Manajemen Informatika</option>
                  <option value="Teknik Komputer" <?= ($prodi == 'Teknik Komputer') ? 'selected' : '' ?>>Teknik Komputer</option>
                  <option value="Teknologi Informasi" <?= ($prodi == 'Teknologi Informasi') ? 'selected' : '' ?>>Teknologi Informasi</option>
              </select>
          </div>
          
          <button type="submit" class="btn btn-primary">Simpan Data</button>
      </form>
  </div>
</div>

<script>
    function validateForm() {
        var nim = document.getElementById("nim").value.trim();
        var nama = document.getElementById("nama").value.trim();
        var prodi = document.getElementById("prodi").value;
        
        // Cek field NIM
        if (nim === "") {
            alert("NIM harus diisi.");
            document.getElementById("nim").focus();
            return false;
        }
        
        // Cek field Nama
        if (nama === "") {
            alert("Nama harus diisi.");
            document.getElementById("nama").focus();
            return false;
        }

        // Cek apakah Prodi sudah dipilih
        if (prodi === "") {
            alert("Program Studi harus dipilih.");
            document.getElementById("prodi").focus();
            return false;
        }
        
        return true; // Form akan disubmit jika semua valid
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>