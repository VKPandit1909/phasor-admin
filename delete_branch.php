<?php

session_start();
require_once("function.php");

$id = $_GET['b_id'];
$dataArr = array('id' => $id );
$res = delete_data("branches", $dataArr);

if ($res) {
    echo "<script>window.location.href='view_branches.php?msg=Deleted Successfully';</script>";
} else {
    echo "<script>window.location.href='view_branches.php?msg=Failed';</script>";
}

?>