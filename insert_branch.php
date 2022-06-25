<?php

session_start();
require_once("function.php");

$branch_name = $_POST['branch_name'];
$branch_mobile = $_POST['branch_mobile'];
$branch_address = $_POST['branch_address'];

$dataArr = array('branch_name' => $branch_name, 'branch_mobile' => $branch_mobile, 'branch_address' => $branch_address );
$res = insert("branches", $dataArr, "no");

if ($res) {
    echo "<script>window.location.href='add_branch.php?msg=Added Successfully';</script>";
} else {
    echo "<script>window.location.href='add_branch.php?msg=Failed';</script>";
}

?>