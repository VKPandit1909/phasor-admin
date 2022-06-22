<?php

session_start();
require_once("function.php");

$fname = $_POST['fname'];
$testimonial_desc = $_POST['testimonial_desc'];
$relation = $_POST['relation'];

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

$dataArr = array('name' => $fname, 'testimonial' => $testimonial_desc, 'relation' => $relation, 'photo' => $imgContent );
$res = insert("testimonials", $dataArr, "no");

if ($res) {
    echo "<script>window.location.href='add_testimonial.php?msg=Added Successfully';</script>";
} else {
    echo "<script>window.location.href='add_testimonial.php?msg=Failed';</script>";
}

?>