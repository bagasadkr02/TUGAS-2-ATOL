<?php
include '../../connection.php';

session_start();
if ($_SESSION['status'] != "status") {
    header("location:../login/login.php");
}


$id = $_POST['id_members'];
$nickname = $_POST['nickname'];
$name = $_POST['name'];
$group_name = $_POST['group_name'];
$groupSplit = explode("/", $group_name);

//query update

mysqli_query($mysqli, "UPDATE `members` SET `nickname` = '$nickname', `name` = '$name', `group_name` = '$groupSplit[0]', `company_name` = '$groupSplit[1]' WHERE `members`.`id_members` = $id;");

header("location:index.php");
