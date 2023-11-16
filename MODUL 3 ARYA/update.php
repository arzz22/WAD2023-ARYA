<?php
// (1) Jangan lupa sertakan koneksi database dari yang sudah kalian buat yaa
$connect = mysqli_connect("localhost:3308", "root", "", "tugas7");

// (2) Tangkap nilai "id" mobil (CLUE: gunakan GET)
if (isset($_GET['id'])) {
    $car_id = $_GET['id'];

    // (3) Buatkan fungsi "update" yang menerima data sebagai parameter
    function updateCar($connect, $car_id, $new_nama_mobil, $new_brand_mobil, $new_warna_mobil, $new_tipe_mobil, $new_harga_mobil) {
        // Dapatkan data yang dikirim sebagai parameter dan simpan dalam variabel yang sesuai.
        $new_nama_mobil = mysqli_real_escape_string($connect, $new_nama_mobil);
        $new_brand_mobil = mysqli_real_escape_string($connect, $new_brand_mobil);
        $new_warna_mobil = mysqli_real_escape_string($connect, $new_warna_mobil);
        $new_tipe_mobil = mysqli_real_escape_string($connect, $new_tipe_mobil);
        $new_harga_mobil = mysqli_real_escape_string($connect, $new_harga_mobil);

        // Buatkan perintah SQL UPDATE untuk mengubah data di tabel, berdasarkan id mobil
        $sql = "UPDATE showroom_mobil SET 
                nama_mobil='$new_nama_mobil', 
                brand_mobil='$new_brand_mobil', 
                warna_mobil='$new_warna_mobil', 
                tipe_mobil='$new_tipe_mobil', 
                harga_mobil='$new_harga_mobil' 
                WHERE id=$car_id";

        // Eksekusi perintah SQL
        $result = mysqli_query($connect, $sql);

        // Buatkan kondisi jika eksekusi query berhasil
        if ($result) {
            echo "Data mobil berhasil diupdate.";
        } else {
            // Jika terdapat kesalahan, buatkan eksekusi query gagalnya
            echo "Error: " . mysqli_error($connect);
        }
    }

    // Panggil fungsi update dengan data yang sesuai
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset(
            $_POST["nama_mobil"],
            $_POST["brand_mobil"],
            $_POST["warna_mobil"],
            $_POST["tipe_mobil"],
            $_POST["harga_mobil"]
        )) {
            $new_nama_mobil = $_POST["nama_mobil"];
            $new_brand_mobil = $_POST["brand_mobil"];
            $new_warna_mobil = $_POST["warna_mobil"];
            $new_tipe_mobil = $_POST["tipe_mobil"];
            $new_harga_mobil = $_POST["harga_mobil"];
            updateCar($connect, $car_id, $new_nama_mobil, $new_brand_mobil, $new_warna_mobil, $new_tipe_mobil, $new_harga_mobil);
        } else {
            echo "One or more form fields are not set.";
        }
    }
} else {
    echo "ID mobil tidak valid.";
}

// Tutup koneksi ke database setelah selesai menggunakan database
mysqli_close($connect);
?>
