<?php

session_start();
require_once("function.php");

$id = $_GET['b_id'];
$dataArr = array('id' => $id );
$res = delete_data("banners", $dataArr);

if ($res) {
    echo "<script>window.location.href='view_banners.php?msg=Deleted Successfully';</script>";
} else {
    echo "<script>window.location.href='view_banners.php?msg=Failed';</script>";
}

?>