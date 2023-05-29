<!DOCTYPE html>
<html>

<head>
    <title>DAFTAR ISI DOMPET</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <?php
        //Include file koneksi, untuk koneksikan ke database
        include "koneksi.php";

        //Fungsi untuk mencegah inputan karakter yang tidak sesuai
        function input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        //Cek apakah ada kiriman form dari method post
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $nama = input($_POST["nama"]);
            $uang = input($_POST["uang"]);
            $other = input($_POST["other"]);
            $desk = input($_POST["deskripsi"]);


            //Query input menginput data kedalam tabel anggota
            $sql = "insert into dompet (nama,uang,other,desk) values
		('$nama','$uang','$other','$desk')";

            //Mengeksekusi/menjalankan query diatas
            $hasil = mysqli_query($kon, $sql);

            //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
            if ($hasil) {
                header("Location:crud.php");
            } else {
                echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
            }
        }
        ?>
        <h2>Input Data</h2>


        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <div class="form-group">
                <label>Nama:</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required />

            </div>
            <div class="form-group">
                <label>uang:</label>
                <input type="text" name="uang" class="form-control" placeholder="Jumlah Uang" required />
            </div>
            <div class="form-group">
                <label>other :</label>
                <input type="text" name="other" class="form-control" placeholder="Barang Lain" required />
            </div>
            </p>
            <div class="form-group">
                <label>Deskripsi:</label>
                <input type="text" name="desk" class="form-control" placeholder="Deskripsi Penggunaan" required />
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>