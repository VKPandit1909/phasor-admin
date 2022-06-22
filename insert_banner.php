<?php

session_start();
require_once("function.php");

$banner_name = $_POST['banner_name'];
// Uploading Photo file
$imgContent = "";
if(!empty($_FILES["image"]["name"])){
    $fileName = basename($_FILES["image"]["name"]); 
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
        
    // Allow certain file formats 
    $allowTypes = array('jpg','png','jpeg','gif'); 
    if(in_array($fileType, $allowTypes)) { 
        $image = $_FILES['image']['tmp_name']; 
        $imgContent = addslashes(file_get_contents($image)); 
    }
}

$dataArr = array('banner_name' => $banner_name, 'banner' => $imgContent );
$res = insert("banners", $dataArr, "no");

if ($res) {
    echo "<script>window.location.href='add_banner.php?msg=Added Successfully';</script>";
} else {
    echo "<script>window.location.href='add_banner.php?msg=Failed';</script>";
}

?>