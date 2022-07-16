<?php
include '../../connection.php';

session_start();
if ($_SESSION['status'] != "status") {
    header("location:../login/login.php");
}


$id = $_POST['id'];
$name = $_POST['nama'];
$username = $_POST['username'];


//query update
mysqli_query($mysqli, "update users set  nama='$name', username='$username' WHERE id='$id' ");

header("location:index.php");
