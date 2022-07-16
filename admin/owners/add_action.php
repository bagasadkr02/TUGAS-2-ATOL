<?php

session_start();
if ($_SESSION['status'] != "status") {
    header("location:../login/login.php");
}

// koneksi database
include '../../connection.php';

// menginput data ke database
$owner_company = $_POST['owner_company'];
$company_name = $_POST['company_name'];

$set = mysqli_query($mysqli, "INSERT INTO company VALUES('', '$company_name', '$owner_company')");
// mengalihkan halaman kembali ke index.php
header("location:index.php");
