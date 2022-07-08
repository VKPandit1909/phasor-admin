<?php

session_start();
require_once("function.php");

// print_r($_FILES);
// Uploading Photo file
if(!empty($_FILES["image"]["name"])){

    $fileName = basename($_FILES["image"]["name"]); 
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
        
    // Allow certain file formats 
    $allowTypes = array('jpg','png','jpeg','gif'); 
    if(in_array($fileType, $allowTypes)) { 
        $image = $_FILES['image']['tmp_name']; 
        $imgContent = addslashes(file_get_contents($image)); 

        $partner_name = $_POST["partner_name"];
        $dataArr = array('partner_name' => $partner_name, 'partner_image' => $imgContent );
        $res = insert("partners", $dataArr, "no");

        if ($res) {
            echo "<script>window.location.href='add_partner.php?msg=Added Successfully';</script>";
        } else {
            echo "<script>window.location.href='add_partner.php?msg=Failed';</script>";
        }
    }
} else {
    echo "<script>window.location.href='add_partner.php?msg=Failed';</script>";
}

?>