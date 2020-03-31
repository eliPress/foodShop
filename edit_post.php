<?php

require_once './functions.php';
//session_start();
startMySession();
areUconected();
require_once './tpl/header.php';
//areUconected();


$err_title="";
$err_post="";

if(isset($_GET['post_id']) && is_numeric($_GET['post_id'])){
         $con = db_conect();
         $post_id=trim(filter_input(INPUT_GET, 'post_id',FILTER_SANITIZE_STRING));  
//        $sql ="SELECT post FROM `posts` JOIN `users` ON posts.uid={$_SESSION['id']}";
          $sql = "SELECT * FROM posts WHERE id = '$post_id' AND uid = '{$_SESSION['uid']}'";
//         $sql="SELECT * FROM posts WHERE uid={$_SESSION['id']} ";
   

       
              $result = mysqli_query($con, $sql);

         
           if($result && mysqli_num_rows($result)==1){
         $data= mysqli_fetch_assoc($result);
        
//        echo '<pre>';
//         print_r($data);die;
           }
}
if(isset($_POST['submit'])){

    if(empty($_POST['title'])){
        $err_title='Must Fill The Title!';
    }elseif(empty($_POST['post'])) {
        $err_post="Must Fill The Post First";
        
    }else{
        
        $post_title=$_POST['title'];
        $post=$_POST['post'];
         $uid=$_SESSION['uid'];
         $post_id=$_GET['post_id'];
        
        $con= db_conect();
        
        $post_title= mysqli_real_escape_string($con, $post_title);   //<=SQL הגנה מפני 
        $post= mysqli_real_escape_string($con, $post);               //<=SQL הגנה מפני 
        
        $post_title=filter_input(INPUT_POST,'title',FILTER_SANITIZE_STRING);   //<= בדיקה לפני העלאה לשרת
        $post=filter_input(INPUT_POST,'post',FILTER_SANITIZE_STRING);          //<= בדיקה לפני העלאה לשרת
        
//        $sql ="UPDATE `posts` SET `uid`='$uid',`title`='$post_title',`post`='$post',`created_at`=NOW() WHERE uid='$get'";
       $sql = "UPDATE `posts` SET `uid`='$uid',`title`='$post_title',`post`='$post',`created_at`=NOW() WHERE id = '$post_id' AND uid = '{$_SESSION['uid']}'";
//       print_r($sql);die;
        $result= mysqli_query($con, $sql);
        
        if($result && mysqli_affected_rows($con)>0){
            header("location: blog.php");
        
        
//        $sql="SELECT * FROM `posts` JOIN `users` ON posts.uid=users.id";
//        $result= mysqli_query($con, $sql);
//        
//        if($result && mysqli_num_rows($con)==1){
//            $data = mysqli_fetch_assoc($result);
//            
        }
       }
       
    
    
}
$token = csrfToken();
$_SESSION['token']=$token;
?>


<link rel="stylesheet" href="css/addPost.css"/>
<div class="container">
  <div class="row">
    
    <form class="form-signin" method="post" action="">

  <h1 class="h3 mb-3 font-weight-normal">Add a new post</h1>
  
  <span>Title:</span>
  <input name="title" type="text" id="inputEmail" class="form-control" value="<?= htmlspecialchars($data['title']) ;?>" autofocus>  
<!-- בדיקה של תגיות לפני הוצאת המידע מהשרת-->
  <br><span style="color: red;"><?=$err_title;?></span>
  
  
  <span>Post:</span>
  <span style="color: red;"><?=$err_post;?></span>
  <textarea  name="post" id="summernote"  ><?= htmlspecialchars($data['post']) ;?>
<!-- בדיקה של תגיות לפני הוצאת המידע מהשרת-->
</textarea>
  
    
  
  <div class="checkbox mb-3">
    <input type="hidden" name="token" value="<?= $token ;?>"
  </div>
  <button name="submit" class="btn btn-lg btn-primary btn-block" type="submit">Save post</button>

</form>    
  </div>
</div>



<?php require_once 'tpl/footer.php' ;?>
    
