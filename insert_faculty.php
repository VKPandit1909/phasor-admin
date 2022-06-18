<?php

session_start();
require_once("function.php");

$faculty_title = $_POST['faculty_name'];
$faculty_desc = $_POST['faculty_desc'];
$faculty_cat = $_POST['faculty_cat'];

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

$dataArr = array('faculty_name' => $faculty_title, 'faculty_desc' => $faculty_desc, 'faculty_cat' => $faculty_cat, 'faculty_profile' => $docfile );
$res = insert("faculty", $dataArr, "no");

if ($res) {
    echo "<script>window.location.href='add_faculty.php?msg=Added Successfully';alert('Success');</script>";
} else {
    echo "<script>window.location.href='add_faculty.php?msg=Failed';</script>";
}

?>