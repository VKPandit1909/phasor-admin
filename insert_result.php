<?php

session_start();
require_once("function.php");


$result_cat = $_POST['course_cat'];
echo $result_cat;

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

 
$dataArr = array(  'result_photo' => $imgContent,'result_cat' => $result_cat );
$res = insert("results", $dataArr, "no");

if ($res) {
    echo "<script>window.location.href='add_result.php?msg=Added Successfully';</script>";
} else {
    echo "<script>window.location.href='add_result.php?msg=Failed';</script>";
}

?>