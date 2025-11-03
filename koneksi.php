// Isi koneksi.php dengan kode ini:
<?php
$host = "localhost";
$user = "root";
$password = "";
$db_name = "db_absen";

function getDbConnection() {
    global $host, $user, $password, $db_name;
    $koneksi = mysqli_connect($host, $user, $password, $db_name);
    if (mysqli_connect_errno()) {
        die("Koneksi database GAGAL: " . mysqli_connect_error());
    }
    return $koneksi; 
}
?>