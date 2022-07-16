<?php
include '../../connection.php';

session_start();
if ($_SESSION['status'] != "status") {
    header("location:../login/login.php");
}


$id = $_POST['id'];
$password = $_POST['password'];


//query update
mysqli_query($mysqli, "update users set password='$password' WHERE id='$id' ");

header("location:index.php");
