<?php
include '../../connection.php';
session_start();
if ($_SESSION['status'] != "status") {
    header("location:../login/login.php");
}
$id_members = $_GET['id_members'];

mysqli_query($mysqli, "DELETE FROM members WHERE id_members='$id_members'");

header("location:index.php");
