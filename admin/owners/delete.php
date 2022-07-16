<?php
include '../../connection.php';
session_start();
if ($_SESSION['status'] != "status") {
    header("location:../login/login.php");
}
$id_company = $_GET['id_company'];

mysqli_query($mysqli, "DELETE FROM company WHERE id_company='$id_company'");

header("location:index.php");
