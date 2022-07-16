<?php

session_start();
if ($_SESSION['status'] != "status") {
    header("location:../login/login.php");
}

// koneksi database
include '../../connection.php';

// menginput data ke database
$nickname = $_POST['nickname'];
$name = $_POST['name'];
$group_name = $_POST['group_name'];
$groupSplit = explode("/", $group_name);

$set = mysqli_query($mysqli, "INSERT INTO members VALUES('','$nickname', '$name', '$groupSplit[0]', '$groupSplit[1]')");
// mengalihkan halaman kembali ke index.php
header("location:index.php");
