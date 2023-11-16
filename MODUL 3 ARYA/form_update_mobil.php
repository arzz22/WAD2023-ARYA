<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mobil</title>
</head>
<body>
    <?php 
        include("navbar.php");
        include("connect.php");
        $id = $_GET['id'];
        // Buatlah query untuk mengambil masing-masing data berdasarkan id dari database
        $sql = "SELECT * FROM showroom_mobil WHERE id = $id";

        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {

            $row = mysqli_fetch_assoc($result);
            $nama_mobil = htmlspecialchars($row['nama_mobil']);
            $brand_mobil = htmlspecialchars($row['brand_mobil']);
            $warna_mobil = htmlspecialchars($row['warna_mobil']);
            $tipe_mobil = htmlspecialchars($row['tipe_mobil']);
            $harga_mobil = htmlspecialchars($row['harga_mobil']);
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        //
    ?>
    <div class="row">
        <center>
            <h1>Perbarui Detail Mobil</h1>
            <div class="col-md-4 p-3">
                <div class="card">
                    <div class="card-body">
                        <form action="update.php?id=<?php echo $id ?>" method="POST" enctype="multipart/form-data">
                            <!-- Set form field values with retrieved data -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="nama_mobil" id="nama_mobil" value="<?php echo $nama_mobil; ?>">
                                <label for="nama_mobil">Nama Mobil</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="brand_mobil" id="brand_mobil" value="<?php echo $brand_mobil; ?>">
                                <label for="brand_mobil">Brand Mobil</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="warna_mobil" id="warna_mobil" value="<?php echo $warna_mobil; ?>">
                                <label for="warna_mobil">Warna Mobil</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="tipe_mobil" id="tipe_mobil" value="<?php echo $tipe_mobil; ?>">
                                <label for="tipe_mobil">Tipe Mobil</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" name="harga_mobil" id="harga_mobil" value="<?php echo $harga_mobil; ?>">
                                <label for="harga_mobil">Harga Mobil</label>
                            </div>
                            <button type="submit" name="update" id="update" class="btn btn-primary mb-3 mt-3 w-100">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </center>
    </div>
</body>
</html>
