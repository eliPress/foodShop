<?php

if(!function_exists('db_conect')){//======DB Connection
    function db_conect(){
        $con= mysqli_connect("localhost", "root", "", "myshop");
        
        return $con;
    }
}



if(!function_exists('csrfToken')){ //===Token
    function csrfToken(){
        $token= sha1(time().md5('elis site'));
        
        return $token;
    }
}

if( !function_exists("old")){  //===Olf func
  function old($fn){
    return isset($_POST[$fn])?$_POST[$fn]:"";
  }
}

if( !function_exists("msMessage")){// ===successful msg
  function msMessage(){
   if(isset($_SESSION['ms']) && !empty($_SESSION['ms'])){
       unset($_SESSION['ms']);
   }
  }
}


if( !function_exists("verifiUser")){  // ===verifiUser
  function verifiUser(){
    if(!empty($_SESSION['uip'])){
      if($_SESSION['uip'] != $_SERVER['REMOTE_ADDR']){
      session_destroy();
      header("location: signin.php");
      }
    }
  }
}

if( !function_exists("areUconected")){  //?Connected
  function areUconected($isConected=false){
    if(!$isConected && empty($_SESSION['uid'])){
     header("location: signin.php"); 
    }elseif ($isConected && !empty($_SESSION['uid'])) {
     header("location: blog.php"); 
            
        }
  }
}

if( !function_exists("startMySession")){  //===Global Start Session
  function startMySession(){
      session_name('eli');
      session_start();
      session_regenerate_id();
  }
}


if( !function_exists("avatar")){  //Upload Pic
  function avatar(){
      $con=db_conect();
      $sql="SELECT `avatar` FROM `users` WHERE id={$_SESSION['uid']}";
      $result = mysqli_query($con, $sql);
      
      if($result && mysqli_num_rows($result)==1){
          $data= mysqli_fetch_assoc($result);
          
          return $data['avatar'];
      } else {
          return "none.png";
      }
  }
}

if( !function_exists("postPic")){  //===Post Img
  function postPic(){
      $con=db_conect();
      $sql="SELECT `pic` FROM `posts` WHERE id={$_SESSION['uid']} ";
      $result = mysqli_query($con, $sql);
      
      if($result && mysqli_num_rows($result)==1){
          $data= mysqli_fetch_assoc($result);
          
          return "pics/".$data['pic'];
      } else {
          return "https://loremflickr.com/320/240/food";
      }
  }
}
if( !function_exists("debug")){
function debug() {
    ob_clean();
    array_map(function($e){
    echo '<pre style="background-color:#ccc;">';
    if(is_array($e)){
        print_r($e);
    }else{
        var_dump($e);
    }
    echo '</pre><hr>';
    }, func_get_args());
    die(1);
}

}





