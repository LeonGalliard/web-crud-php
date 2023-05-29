<?php
session_start();
require_once("koneksi.php");
$db = $kon;

if (isset($_POST['submit'])) {
    $fullname = strip_tags($_POST['fullname']);
    $username = strip_tags($_POST['username']);
    $password = strip_tags($_POST['password']);

    $query_sql = "SELECT * FROM users WHERE fullname = '$fullname' AND password = '$password'";

    $result = mysqli_query($kon, $query_sql);

    if (mysqli_num_rows($result) > 0) {
        session_start();
        header("location:crud.php");
    } else {

        header("location:index.php");
    }
}
