<!DOCTYPE html>
<html>

<head>
    <title>Form Pendaftaran Anggota</title>
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
        //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id
        if (isset($_GET['id'])) {
            $id = input($_GET["id"]);

            $sql = "select * from dompet where id=$id";
            $hasil = mysqli_query($kon, $sql);
            $data = mysqli_fetch_assoc($hasil);
        }

        //Cek apakah ada kiriman form dari method post
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $id = htmlspecialchars($_POST["id"]);
            $nama = input($_POST["nama"]);
            $uang = input($_POST["uang"]);
            $other = input($_POST["other"]);
            $desk = input($_POST["desk"]);

            //Query update data pada tabel anggota
            $sql = "update dompet set
			nama='$nama',
			uang='$uang',
			other='$other',
			desk='$desk'
			where id=$id";

            //Mengeksekusi atau menjalankan query diatas
            $hasil = mysqli_query($kon, $sql);

            //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
            if ($hasil) {
                header("Location:crud.php");
            } else {
                echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
            }
        }

        ?>
        <h2>Update Data</h2>


        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Nama:</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required />

            </div>
            <div class="form-group">
                <label>Uang:</label>
                <input type="text" name="uang" class="form-control" placeholder="Masukan jumlah uang" required />
            </div>
            <div class="form-group">
                <label>Other :</label>
                <input type="text" name="other" class="form-control" placeholder="Masukan benda lain" required />
            </div>
            <div class="form-group">
                <label>Deskripsi:</label>
                <input type="text" name="desk" class="form-control" placeholder="Deskripsi penggunaan" required />
            </div>
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>