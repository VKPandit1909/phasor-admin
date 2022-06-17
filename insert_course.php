<?php

session_start();
require_once("function.php");

$course_title = $_POST['course_title'];
$course_desc = $_POST['course_desc'];
$course_cat = $_POST['course_cat'];

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

$dataArr = array('course_title' => $course_title, 'course_desc' => $course_desc, 'course_category' => $course_cat, 'course_photo' => $docfile );
$res = insert("courses", $dataArr, "no");

if ($res) {
    echo "<script>window.location.href='add_course.php?msg=Added Successfully';</script>";
} else {
    echo "<script>window.location.href='add_course.php?msg=Failed';</script>";
}

?>