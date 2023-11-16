<!-- Pada file ini kalian membuat coding untuk logika delete / menghapus data mobil pada showroom sesuai id-->
<?php 
// (1) Jangan lupa sertakan koneksi database dari yang sudah kalian buat yaa
$servername = "localhost:3308"; 
$username = "root"; 
$password = ""; 
$database = "tugas7"; 
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
// (2) Tangkap nilai "id" mobil (CLUE: gunakan GET)
if (isset($_GET["id"])) {
    $id_mobil = $_GET["id"];
    // (3) Buatkan perintah SQL DELETE untuk menghapus data dari tabel berdasarkan id mobil
    $sql = "DELETE FROM showroom_mobil WHERE id = $id_mobil";
    // (4) Buatkan perkondisi jika eksekusi query berhasil
    if (mysqli_query($conn, $sql)) {
        echo "Data mobil berhasil dihapus.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
// Tutup koneksi ke database setelah selesai menggunakan database
mysqli_close($conn);
?>
