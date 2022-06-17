<?php 
session_start();
require_once("function.php");
// error_reporting(E_ALL);
// ini_set('display_errors', '1');

if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=$_POST['password'];

    $username = filter_var($username , FILTER_SANITIZE_STRING);
    $password = filter_var($password , FILTER_SANITIZE_STRING);
    echo "ss";
    $response=login_chk($username, $password);
    echo "ss".$response;
    if($response==1){
    	$checktype=mysqli_query($conn,"SELECT * FROM admin WHERE username='".$_SESSION['username']."'");
        $rowtype=mysqli_fetch_assoc($checktype);
        header("Location: /dashboard-admin/index.php");
    }else{
        header("Location: /dashboard-admin/login.php?msg=Please try again !!!");  

    }    
    
}

?>