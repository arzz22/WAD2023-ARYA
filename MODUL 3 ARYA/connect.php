<!-- File ini berisi koneksi dengan database yang telah di import ke phpMyAdmin kalian -->


<?php
// Buatlah variable untuk connect ke database yang telah di import ke phpMyAdmin
$servername = "localhost:3308"; 
$username = "root"; 
$password = ""; 
$database = "tugas7"; 

// 
$conn = mysqli_connect($servername, $username, $password, $database);  
// Buatlah perkondisian jika tidak bisa terkoneksi ke database maka akan mengeluarkan errornya
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());}
// 

?>