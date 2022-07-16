<?php
include '../../connection.php';

session_start();
if ($_SESSION['status'] != "status") {
    header("location:../login/login.php");
}


$id = $_POST['id_company'];
$owner_company = $_POST['owner_company'];
$company_name = $_POST['company_name'];
//query update
mysqli_query($mysqli, "update company set company_name='$company_name', owner_company='$owner_company' WHERE id_company='$id' ");

header("location:index.php");
