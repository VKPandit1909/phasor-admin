<?php

session_start();
require_once("function.php");

$id = $_GET['r_id'];
$dataArr = array('id' => $id );
$res = delete_data("results", $dataArr);

if ($res) {
    echo "<script>window.location.href='view_results.php?msg=Deleted Successfully';</script>";
} else {
    echo "<script>window.location.href='view_results.php?msg=Failed';</script>";
}

?>