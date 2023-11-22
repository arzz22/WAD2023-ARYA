<!-- File ini berisi koneksi dengan database MySQL -->
<?php 

// (1) Buatlah variable untuk connect ke database yang telah di import ke phpMyAdmin
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "siap4";

$conn = mysqli_connect("localhost:3308","root", "", "siap4");
// 

// (2) Buatlah perkondisian untuk menampilkan pesan error ketika database gagal terkoneksi
if (!$conn){
    die ("Koneksi Failed to Connect!" . mysqli_connect_error());
}
// 
 
?>