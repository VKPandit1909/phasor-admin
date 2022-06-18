<?php

session_start();
require_once("function.php");

$banner_name = $_POST['banner_name'];

// Uploading Photo file
$docfile=$_POST['c_doc_data'];  
if(!empty($docfile)){
    // $data = $_POST["c_doc_data"];
    // $doc_array_1 = explode(";", $data);
    // $doc_array_2 = explode(",", $doc_array_1[1]);
    // $data = base64_decode($doc_array_2[1]);
    // $extension=end(explode(".", $_POST['c_doc_name']));
    // $name=str_replace(".".$extension, "", $_POST['c_doc_name']);
    // $doc_name = $name.rand().".".$extension;
    // $location = "/var/www/html/Insurancedata/assets/documents/";
    // $docName = $location.$doc_name;
    // $uploads = file_put_contents($docName, $data); 
}

$dataArr = array('banner_name' => $banner_name, 'banner' => $docfile );
$res = insert("banners", $dataArr, "no");

if ($res) {
    echo "<script>window.location.href='add_banner.php?msg=Added Successfully';</script>";
} else {
    echo "<script>window.location.href='add_banner.php?msg=Failed';</script>";
}

?>