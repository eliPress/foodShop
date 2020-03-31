<?php

require_once './functions.php';
//session_start();
startMySession();
areUconected(true);
require_once './tpl/header.php';
msMessage();

$err_mail="";
$err_pwd="";

if(isset($_POST['submit'])){
    if(isset($_POST['token']) && $_SESSION['token'] == $_POST['token']){
    if(empty($_POST['email'])){
        $err_mail='must fill the email fild';
    }elseif(empty($_POST['pwd'])){
        $err_pwd='must fill the password fild';
    } else {
        
        $con= db_conect();
        
        $email=$_POST['email'];
        $pwd=$_POST['pwd'];
        
        $email= mysqli_real_escape_string($con, $email);  //<=SQL הגנה מפני 
        $pwd= mysqli_real_escape_string($con, $pwd);      //<=SQL הגנה מפני 
        
        $sql="SELECT * FROM `users` WHERE email='$email' LIMIT 1 ";
        $resutl= mysqli_query($con, $sql);
        
        if($resutl && mysqli_num_rows($resutl)==1){
        $data = mysqli_fetch_assoc($resutl);
          if(password_verify($pwd, $data['password'])){
        
//        $_SESSION['id']=$data['id'];
        $_SESSION['email']=$data['email'];
        $_SESSION['pwd']=$data['password'];
        $_SESSION['ms']='you made it!';
        $_SESSION['name']=$data['name'];
        $_SESSION['uid']=$data['id'];
        $_SESSION['uip']=$_SERVER['REMOTE_ADDR'];
        
        
        header("location:blog.php");
        
        } else {
            $err_pwd='wrong email or username';
       }
       }
    }
    } 
}


$token = csrfToken();
$_SESSION['token']=$token;
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/signin.css"/>
<!------ Include the above in your HEAD tag ---------->




<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
        <img src="avatar/none.png" id="icon" alt="User Icon" />    </div>

    <!-- Login Form -->
    <form action method="post">
        <input type="text" id="login" class="fadeIn second" name="email" placeholder="email"><br>
      <span style="color:red;"><?=$err_mail;?></span>
      <input type="text" id="password" class="fadeIn third" name="pwd" placeholder="password"><br>
      <span style="color: red;"><?=$err_pwd;?></span>
      <input type="submit" name="submit" class="fadeIn fourth" value="Log In">
       <input type="hidden" name="token" value="<?= $token ;?>">  
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>

<?php require_once './tpl/footer.php'; ?>