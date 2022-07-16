<?php
include '../../connection.php';
session_start();
if ($_SESSION['status'] != "status") {
    header("location:../login/login.php");
}
$id_group = $_GET['id_group'];

mysqli_query($mysqli, "DELETE FROM kelompok WHERE id_group='$id_group'");

header("location:index.php");
