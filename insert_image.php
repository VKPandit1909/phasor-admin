<?php

session_start();
require_once("function.php");

// print_r($_FILES);
// Uploading Photo file
if(!empty($_FILES["images"]["name"])){
    $result = "false";
    for ($i=0; $i < count($_FILES["images"]["name"]); $i++) { 
        # code...
        // print_r($_FILES["images"]["name"][$i]);
        $fileName = basename($_FILES["images"]["name"][$i]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
            
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)) { 
            $image = $_FILES['images']['tmp_name'][$i]; 
            $imgContent = addslashes(file_get_contents($image)); 

            $dataArr = array('image' => $imgContent );
            $res = insert("gallery", $dataArr, "no");          
            $result = $res;
        }
    }
    if ($res) {
        echo "<script>window.location.href='add_image.php?msg=Added Successfully';</script>";
    } else {
        echo "<script>window.location.href='add_image.php?msg=Failed';</script>";
    }
} else {
    echo "<script>window.location.href='add_image.php?msg=Failed';</script>";
}

?>