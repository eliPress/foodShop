<?php

$errFname="";
$errLname="";
$errEmail="";
$errPassword="";

require_once './functions.php';
startMySession();
areUconected(true);
require_once './tpl/header.php';
//session_start();



if(isset($_POST['submit'])){
    if(isset($_POST['token']) && $_SESSION['token']==$_POST['token']){
    if(empty($_POST['firstname'])){
        $errFname='Must Fill The Name';
    }elseif(empty($_POST['lastname'])) {
        $errLname='Must Fill The Last Name';
    }elseif(empty($_POST['email'])) {
        $errEmail='Must Fill The Email';
    }elseif(empty ($_POST['password'])) {
        $errPassword='Must Fill The Password';
        
    }else{
        
        define('UPLOAD_MAX_SIZE', 1024 * 1024 * 20);
  $ex = ['jpg', 'jpeg', 'png', 'gif', 'bpm', 'pdf', 'doc', 'docx'];
        
        $fname=$_POST['firstname'];
        $lname=$_POST['lastname'];
        $email=$_POST['email'];
        $password= $_POST['password'];
        
        $con= db_conect();
        
        $fname= mysqli_real_escape_string($con, $fname);       //<=SQL הגנה מפני
        $lname= mysqli_real_escape_string($con, $lname);       //<=SQL הגנה מפני
        $email= mysqli_real_escape_string($con, $email);       //<=SQL הגנה מפני
        $password= mysqli_real_escape_string($con, $password); //<=SQL הגנה מפני
        
        
        $fname=filter_input(INPUT_POST,'firstname',FILTER_SANITIZE_STRING);  //<=ניקוי לפני העלאה לשרת
        $lname=filter_input(INPUT_POST,'lastname',FILTER_SANITIZE_STRING);   //<=ניקוי לפני העלאה לשרת
        $email=filter_input(INPUT_POST,'email',FILTER_SANITIZE_STRING);      //<=ניקוי לפני העלאה לשרת
        $password=filter_input(INPUT_POST,'password',FILTER_SANITIZE_STRING); //<=ניקוי לפני העלאה לשרת
        
        $sqlCheck = "SELECT * FROM `users` WHERE email='$email' LIMIT 1";
        $resutlCheck= mysqli_query($con, $sqlCheck);
        if($resutlCheck && mysqli_num_rows($resutlCheck)>0){
            $errEmail='email already exists';
        } else {
              $password = password_hash($password, PASSWORD_BCRYPT);
              if (!empty($_FILES['image']['name'])) {

            if (is_uploaded_file($_FILES['image']['tmp_name'])) {

              if ($_FILES['image']['size'] <= UPLOAD_MAX_SIZE && $_FILES['image']['error'] == 0) {

                $file_info = pathinfo($_FILES['image']['name']);


                $file_ex = strtolower($file_info['extension']);

                if (in_array($file_ex, $ex)) {

                  move_uploaded_file($_FILES['image']['tmp_name'], "avatar/" . $_FILES['image']['name']);
                  $avatar = $_FILES['image']['name'];
                }
              }
            }
          }
                $con= db_conect();

        $sql= "INSERT INTO `users`(`id`, `name`, `email`, `password`, `role`, `avatar`, `updated_at`) VALUES ('','$fname','$email','$password','','$avatar',NOW())";
        $resutl= mysqli_query($con, $sql);
        
        if($resutl && mysqli_affected_rows($con)> 0 ){
                   $_SESSION['name'] = $name; 
                   $_SESSION['uid'] = mysqli_insert_id($link); 
                   $_SESSION['ms'] = "you made it this far!!";
                           header("location:signin.php");

        } else {
            
        }
        }
        
      
     }
     
    }
    
}




$token = csrfToken();
$_SESSION['token']=$token;
?>

<link rel="stylesheet" href="css/signup.css"/>
<div class="container-fluid bg" style="margin-top: 1.07%;height: 700px;">
	<div class="container">
	    <div class="row">
		<div class="col-md-8 ">
		    <div class="row">
		        <div class="col-sm-3 col-md-2 col-lg-2">
                            <i class="is lni lni-enter " aria-hidden="true"></i>
		        </div>
		        
		        <div class="col-sm-9 col-md-10 col-lg-10">
		            <h1 class="heading">Register</h1>
		            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
		        </div>
		    </div>
		    
		     <div class="row">
		        <div class="col-sm-3 col-md-2 col-lg-2">
		            <i class="is lni lni-user" aria-hidden="true"></i>
		        </div>
		        
		        <div class="col-sm-9 col-md-10 col-lg-10">
		            <h1 class="heading">Make Your Profile</h1>
		            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
		        </div>
		    </div>
		    
		      <div class="row">
		        <div class="col-sm-3 col-md-2 col-lg-2">
		            <i class="is lni lni-cloud-upload" aria-hidden="true"></i>
		        </div>
		        
		        <div class="col-sm-9 col-md-10 col-lg-10">
		            <h1 class="heading">Upload Recipes</h1>
		            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
		        </div>
		    </div>
		    
		    <div class="row">
		        <div class="col-sm-3 col-md-2 col-lg-2">
		            <i class="is lni lni-search" aria-hidden="true"></i>
		        </div>
		        
		        <div class="col-sm-9 col-md-10 col-lg-10">
		            <h1 class="heading">Search For A Recipes</h1>
		            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
		        </div>
		    </div>
		</div>
		
		<div class="col-md-4">
		        <div class="card regform wow bounce animated" data-wow-delay="0.05s">
		            <div class="card-body regform">
		               <div class="myform form ">
                        <div class="logo mb-3">
                           <div class="col-md-12 text-center">
                              <h1 class="sign">Signup</h1>
                           </div>
                        </div>
                                   <form action method="post" name="registration" enctype="multipart/form-data">
                           <div class="form-group">
                              <label for="exampleInputEmail1">First Name</label>
                              <input type="text"  name="firstname" class="form-control" id="firstname" aria-describedby="emailHelp" value="<?= old('firstname') ;?>">
                              <span style="colore:red;"><? =$errFname ;?></span>
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Last Name</label>
                              <input type="text"  name="lastname" class="form-control" id="lastname" aria-describedby="emailHelp" value="<?= old('lastname') ;?>">
                              <span style="color: red;"><?= $errLname ;?></span>
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Email address</label>
                              <input type="email" name="email"  class="form-control" id="email" aria-describedby="emailHelp" value="<?= old('email') ;?>">
                              <span style="color: red;"><?= $errEmail ;?></span>
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Password</label>
                              <input type="password" name="password" id="password"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Password">
                              <span style="color: red;"><?= $errPassword ;?></span>
                              <input type="hidden" name="token" value="<?= $token ;?>">
                              <input type="file" name="image"><br><br>
                           </div>
                
                           <div class="col-md-12 text-center mb-3">
                               <button type="submit" name="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Sign Up</button>
                           </div>
                           <div class="col-md-12 ">
                              <div class="form-group">
                                  <p class="text-center"><a href="signin.php" id="signin">Already have an account?</a></p>
                              </div>
                           </div>
                            </div>
		            </div>
		        </div>
		    </div>
	</div>
	</div>
</div>


