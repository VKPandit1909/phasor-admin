<?php

session_start();
require_once("function.php");

$course_title = $_POST['course_title'];
$course_desc = $_POST['course_desc'];
$course_cat = $_POST['course_cat'];

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

$dataArr = array('course_title' => $course_title, 'course_desc' => $course_desc, 'course_category' => $course_cat, 'course_photo' => $imgContent );
$res = insert("courses", $dataArr, "no");

if ($res) {
    echo "<script>window.location.href='add_course.php?msg=Added Successfully';</script>";
} else {
    echo "<script>window.location.href='add_course.php?msg=Failed';</script>";
}

?>