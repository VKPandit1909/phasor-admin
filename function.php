 <?php
$servername = "208.91.198.197:3306";
$username = "Phasor";
$password = "admin@12345!";
$database = "Phasor";

// Create connion
$GLOBALS['conn'] = mysqli_connect($servername, $username, $password, $database);
// Check connion
if (!$GLOBALS['conn']) {
    die("connion failed: " . mysqli_conn_error());
}

function login_chk($username,$password){  
  $select=mysqli_query($GLOBALS['conn'],"SELECT * FROM admin_users WHERE username='".$username."' AND password='".md5($password)."'");
  if(mysqli_num_rows($select)>0){
    $res=mysqli_fetch_assoc($select);
    if (md5($password)==$res['password']) {
      $_SESSION['username']=$res['username'];
      $_SESSION['password']=$res['password'];
      $_SESSION['type']=$res['usertype'];
      if($_SESSION['username']!='' && $_SESSION['password']){
          return 1;
      }else{
          return 0;
      }  
    } else {
      return 0;
    }
  }else{     
    return 0;    
  }
}

function logout(){
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    unset($_SESSION['type']);
    session_destroy();
    return 0;
}


  function insert($table,$values,$id){
    $i=0;
    foreach ($values as $key => $val) {
      if($key == 'password'){
        $arrayTemp[$i] = "'".md5($val)."'";
      }else{
        $arrayTemp[$i] = "'".($val)."'";
      }
      $arrayTemp1[$i] = "`".($key)."`";
      $i++;
    }
    $val=implode(',', $arrayTemp);

    $rows=implode(',', $arrayTemp1);
    date_default_timezone_set('Europe/Berlin');
    $timestamp = date('d/m/Y H:i:s');
    $insert="INSERT INTO `".$table."` (".preg_replace('#<script(.*?)>(.*?)</script>#is', '', $rows).",`date`) VALUES (".preg_replace('#<script(.*?)>(.*?)</script>#is', '', $val).",'".$timestamp."')";

    $qu=mysqli_query($GLOBALS['conn'],$insert);
    if($qu){
        if($id=='yes'){    
          $result = mysqli_insert_id($GLOBALS['conn']);
        }else{
          $result = 'true';
        }
    }else{
      $result ='false';
    }
    return $result;
  }


  function update($table,$values,$id){
    $i=0;
    foreach ($values as $key => $val) {
      if($key == 'password'){
        $arrayTemp[$i] = $key."='".md5($val)."'";
      }else{
        $arrayTemp[$i] = $key."='".$val."'";
      }
      $i++;
    }
    $val1=implode(',', $arrayTemp);
    $j=0;
    foreach ($id as $key2 => $val2) {
      if($key2 == 'password'){
        $arrayTemp1[$j] = $key2."='".md5($val2)."'";
      }else{
        $arrayTemp1[$j] = $key2."='".$val2."'";
      }
      $j++;
    }
    $val3=implode(' AND ', $arrayTemp1);
    
    $update = "UPDATE ".$table." SET ".preg_replace('#<script(.*?)>(.*?)</script>#is', '',$val1)." WHERE ".preg_replace('#<script(.*?)>(.*?)</script>#is', '',$val3);

    if(mysqli_query($GLOBALS['conn'],$update)){ 
      return true;
    }else{
      return false;
    }
  }
    
  function delete_data($table,$condition){
    $j=0;
    foreach ($condition as $key2 => $val2) {
      if($key2 == 'password'){
        $arrayTemp1[$j] = $key2."='".md5($val2)."'";
      }else{
        $arrayTemp1[$j] = $key2."='".$val2."'";
      }
      $j++;
    }
    $val3=implode(' AND ', $arrayTemp1);
    
    $delete="DELETE FROM ".$table." WHERE ".$val3;
    if(mysqli_query($GLOBALS['conn'],$delete)){
      return true;
    }else{
      return false;
    }
  } 
    
function password_generate($chars) 
{
  $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
  return substr(str_shuffle($data), 0, $chars);
}    

?> 