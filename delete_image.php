<?php

session_start();
require_once("function.php");

$id = $_GET['i_id'];
$dataArr = array('id' => $id );
$res = delete_data("gallery", $dataArr);

if ($res) {
    echo "<script>window.location.href='view_images.php?msg=Deleted Successfully';</script>";
} else {
    echo "<script>window.location.href='view_images.php?msg=Failed';</script>";
}

?>