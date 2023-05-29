<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<?php
session_start();
include "koneksi.php";
$db = $kon;

?>

<body class="bg-secondary">

    <div class="container-sm bg-dark text-light align-content-center align-items-center text-center" style="width: 50%;">
        <h1>LOGIN MEMBER</h1>
        <br>
        <form action="prosesLogin.php" method="post" id="form_login">
            <div class="row mb-4">
                <label for="inputEmail3" class="col-sm-4 col-form-label">username</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control " id="idpengguna" name="idpengguna" style="width:70%;" required>
                    <div class="invalid-tooltip">
                        Harap Masukkan Username yang benar
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <label for="inputPassword3" class="col-sm-4 col-form-label">Password</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control " id="passwordpengguna" name="passwordpengguna" style="width:70%;" required>
                    <div class="invalid-tooltip">
                        Harap Masukkan Password Yang Benar
                    </div>
                </div>
            </div>

            <div class="col-12 d-grid gap-2 d-md-flex justify-content-md-center">
                <input type="submit" class="btn btn-primary" value="Login" name="submit">
                <a href="register.php" type="button" class="btn btn-primary ">daftar</a>

            </div>
        </form>
    </div>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</html>