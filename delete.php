<?php


require_once './functions.php';
startMySession();
areUconected();
require_once './tpl/header.php';
//session_start();
//areUconected();

if(isset($_POST['submit'])){
    
    $con= db_conect();
   $sql="DELETE FROM `posts` WHERE id = {$_GET['post_id']} AND uid = {$_SESSION['uid']} ";
//    $sql="DELETE FROM `posts` WHERE id={$_SESSION['id']}";
    $result= mysqli_query($con, $sql);

    if($result && mysqli_affected_rows($con)>0){
        
        header("location: blog.php");
    }
}
?>

<link rel="stylesheet" href="css/deletePost.css"/>
<div class="container">
  <div class="row">
    
    <form class="form-signin" method="post" action="">

  <h1 class="h3 mb-3 font-weight-normal text-white">Are you sure you want to delete this post?</h1>
  
  </div>
  <button name="submit" class="btn btn-lg btn-primary btn-block" type="submit">Delete</button>
  <a href="blog.php"><input  class="btn btn-lg btn-secondary btn-block" value="Cancel" ></a>
</form>    
  </div>

<?php include_once './tpl/footer.php';?>