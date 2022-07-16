<?php
include '../../connection.php';

session_start();
if ($_SESSION['status'] != "status") {
    header("location:../login/login.php");
}


$id = $_POST['id_group'];
$group_name = $_POST['group_name'];
$company_name = $_POST['company_name'];
//query update
mysqli_query($mysqli, "update kelompok set  group_name='$group_name', company_name='$company_name'WHERE id_group='$id' ");

header("location:index.php");
