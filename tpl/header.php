<?php
ob_start();
verifiUser();


?>

<!doctype html>
<html lang="en">
    <head>
       
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>My Blog</title>



    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.css" />
<link rel="stylesheet" href="https://cdn.lineicons.com/1.0.0/LineIcons.min.css">
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
<link rel="stylesheet" href="css/index.css"/>

<link rel="stylesheet" href="css/signin.css"/>
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      body {
        padding-top: 3.5rem;
      }
    </style>
   
  </head>
  
  <body>
     
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        
  <a class="navbar-brand" href="index.php">Eli's </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#"></a>
      </li>
     

     

    </ul>
      <h1 style="color:#fff;margin-right: 32%;"><i class="fas fa-utensils"></i> All You Can Eat <i class="fas fa-utensils"></i></h1>
      <?php if(empty($_SESSION['uid'])): ?>
    
      <a style="border-radius: 25%;margin-right: 0.5%;" class="btn btn-outline-light my-2 my-sm-0 signin_signup" href="signin.php">Signin</a>
      <a style="border-radius: 25%;" class="btn btn-outline-light my-2 my-sm-0 signin_signup" href="signup.php">Signup</a>
     <?php else : ?>
     <a class="btn btn-outline-success my-2 my-sm-0 signout" href="signout.php">Signout</a>
     <img width="50px" height="50px" src="avatar/<?= avatar() ;?>"> 

<?php endif; ?>

  </div>
  
</nav>
 <?php if(isset($_SESSION['ms'])):?>
  <div class="alert alert-success ms" role="alert">
      <?= $_SESSION['ms']; ?>
</div>
<?php endif; ?>