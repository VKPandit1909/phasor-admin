<?php

session_start();
require_once("function.php");

$id = $_GET['p_id'];
$dataArr = array('id' => $id );
$res = delete_data("partners", $dataArr);

if ($res) {
    echo "<script>window.location.href='view_partners.php?msg=Deleted Successfully';</script>";
} else {
    echo "<script>window.location.href='view_partners.php?msg=Failed';</script>";
}

?>