<?php

session_start();
require_once("function.php");

// Uploading Photo file
if(!empty($_FILES["image"]["name"])){
    $fileName = basename($_FILES["image"]["name"]); 
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
        
    // Allow certain file formats 
    $allowTypes = array('jpg','png','jpeg','gif'); 
    if(in_array($fileType, $allowTypes)) { 
        $image = $_FILES['image']['tmp_name']; 
        $imgContent = addslashes(file_get_contents($image)); 

        $dataArr = array('image' => $imgContent );
        $res = insert("gallery", $dataArr, "no");

        if ($res) {
            echo "<script>window.location.href='add_image.php?msg=Added Successfully';</script>";
        } else {
            echo "<script>window.location.href='add_image.php?msg=Failed';</script>";
        }

    }
} else {
    echo "<script>window.location.href='add_image.php?msg=Failed';</script>";
}

?>