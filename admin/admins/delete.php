<?php
include '../../connection.php';
session_start();
if ($_SESSION['status'] != "status") {
    header("location:../login/login.php");
}
$id = $_GET['id'];

mysqli_query($mysqli, "DELETE FROM users WHERE id='$id'");

header("location:index.php");
