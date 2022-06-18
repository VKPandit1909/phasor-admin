<?php

session_start();
require_once("function.php");

$id = $_GET['t_id'];
$dataArr = array('id' => $id );
$res = delete_data("testimonials", $dataArr);

if ($res) {
    echo "<script>window.location.href='view_testimonials.php?msg=Deleted Successfully';</script>";
} else {
    echo "<script>window.location.href='view_testimonials.php?msg=Failed';</script>";
}

?>