<?php

session_start();
require_once("function.php");

$faculty_title = $_POST['faculty_name'];
$faculty_desc = $_POST['faculty_desc'];
$faculty_cat = $_POST['faculty_cat'];

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

$dataArr = array('faculty_name' => $faculty_title, 'faculty_desc' => $faculty_desc, 'faculty_cat' => $faculty_cat, 'faculty_profile' => $imgContent );
$res = insert("faculty", $dataArr, "no");

if ($res) {
    echo "<script>window.location.href='add_faculty.php?msg=Added Successfully';</script>";
} else {
    echo "<script>window.location.href='add_faculty.php?msg=Failed';</script>";
}

?>