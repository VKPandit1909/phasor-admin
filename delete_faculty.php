<?php

session_start();
require_once("function.php");

$id = $_GET['f_id'];
$dataArr = array('id' => $id );
$res = delete_data("faculty", $dataArr);

if ($res) {
    echo "<script>window.location.href='view_faculties.php?msg=Deleted Successfully';</script>";
} else {
    echo "<script>window.location.href='view_faculties.php?msg=Failed';</script>";
}

?>