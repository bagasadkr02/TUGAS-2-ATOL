<?php

session_start();
if ($_SESSION['status'] != "status") {
    header("location:../login/login.php");
}

// koneksi database
include '../../connection.php';

// menginput data ke database
$group_name = $_POST['group_name'];
$company_name = $_POST['company_name'];

$set = mysqli_query($mysqli, "INSERT INTO kelompok VALUES('', '$group_name', '$company_name')");
// mengalihkan halaman kembali ke index.php
header("location:index.php");
