<?php

session_start();
if ($_SESSION['status'] != "status") {
    header("location:../login/login.php");
}

// koneksi database
include '../../connection.php';

// menginput data ke database
$name = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$set = mysqli_query($mysqli, "INSERT INTO users VALUES('', '$name', '$username','$hashed_password')");
// mengalihkan halaman kembali ke index.php
header("location:index.php");
