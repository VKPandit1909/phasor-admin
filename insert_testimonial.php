<?php

session_start();
require_once("function.php");

$fname = $_POST['fname'];
$testimonial_desc = $_POST['testimonial_desc'];
$relation = $_POST['relation'];

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

$dataArr = array('name' => $fname, 'testimonial' => $testimonial_desc, 'relation' => $relation, 'photo' => $docfile );
$res = insert("testimonials", $dataArr, "no");

if ($res) {
    echo "<script>window.location.href='add_testimonial.php?msg=Added Successfully';</script>";
} else {
    echo "<script>window.location.href='add_testimonial.php?msg=Failed';</script>";
}

?>