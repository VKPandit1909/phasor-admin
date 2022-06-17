<?php

session_start();
require_once("function.php");

$id = $_GET['c_id'];
$dataArr = array('id' => $id );
$res = delete_data("courses", $dataArr);

if ($res) {
    echo "<script>window.location.href='view_courses.php?msg=Deleted Successfully';</script>";
} else {
    echo "<script>window.location.href='view_courses.php?msg=Failed';</script>";
}

?>