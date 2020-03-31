<?php
$err_title = "";
$err_post = "";

require_once './functions.php';
startMySession();
areUconected();
//session_start();

require_once './tpl/header.php';

$re = '/image\/[a-zA-Z]{2,}/';
if (isset($_POST['submit'])) {
    if (isset($_SESSION['uid'])) {    //<= בדיקה באם המשתמש מחובר
        if (isset($_POST['token']) && $_SESSION['token'] == $_POST['token']) {
            if (empty($_POST['title'])) {
                $err_title = 'Must Fill The Title!';
            } elseif (empty($_POST['post'])) {
                $err_post = "Must Fill The Post First";
            } else {
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                define('UPLOAD_MAX_SIZE', 1024 * 1024 * 20);
                $ex = ['jpg', 'jpeg', 'png', 'gif'];

                if (!empty($_FILES['image']['name'])) {

                    if (is_uploaded_file($_FILES['image']['tmp_name'])) {

                        if ($_FILES['image']['size'] <= UPLOAD_MAX_SIZE && $_FILES['image']['error'] == 0) {

                            $file_info = pathinfo($_FILES['image']['name']);
                            $type = finfo_file($finfo, $_FILES['image']['tmp_name']);
                            finfo_close($finfo);
                            $file_ex = strtolower($file_info['extension']);
//                            debug(preg_match($re, $type));   בדיקה לראות האם הרגקס תואם והאם יש קובץ עם שם מישני מחזיר 1.
                            if (in_array($file_ex, $ex) && preg_match($re, $type)) {

                                move_uploaded_file($_FILES['image']['tmp_name'], "pics/" . $_FILES['image']['name']);
                                $post_pic = $_FILES['image']['name'];
                            }
                        }
                    }
                }


                $post_title = $_POST['title'];
                $post = $_POST['post'];
                $uid = $_SESSION['uid'];

                $con = db_conect();

                $post_title = mysqli_real_escape_string($con, $post_title);   //<=SQL הגנה מפני
                $post = mysqli_real_escape_string($con, $post);               //<=SQL הגנה מפני

                $post_title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);   //<=ניקוי לפני העלאה לשרת
                $post = filter_input(INPUT_POST, 'post', FILTER_SANITIZE_STRING);          //<=ניקוי לפני העלאה לשרת

                $sql = "INSERT INTO `posts`(`id`, `uid`, `title`, `post`, `pic`, `created_at`) VALUES ('','$uid','$post_title','$post','$post_pic',NOW())";
                

                $result = mysqli_query($con, $sql);

                if ($result && mysqli_affected_rows($con) > 0) {
                    echo 'YES';
                    header("location:blog.php");
                }else{
                    echo "somwthing wrong";
                }
            }
        }
    } else {
        header("location:signin.php");
    }
}
$token = csrfToken();
$_SESSION['token'] = $token;
?>
<link rel="stylesheet" href="css/addPost.css"/>
<div class="container">
    <div class="row">

        <form class="form-signin" method="post" action="" enctype="multipart/form-data">

            <h1 class="h1 mb-3 font-weight-bold text-white">Add a new Recipe <i class="fas fa-utensils"></i></h1>

            <span class="font-weight-bold text-white h5">Title:</span>
            <input name="title" type="text" id="inputEmail" class="form-control" value="<?= old('title'); ?>" autofocus>
            <br><span style="color: red;"><?= $err_title; ?></span>

            <span class="font-weight-bold text-white h5">Post Image:</span>
            <input type="file" name="image"><br><br>


            <span class="font-weight-bold text-white h5">Post:</span>
            <span style="color: red;"><?= $err_post; ?></span>
            <span class="summernotes">
                <textarea  name="post" id="summernote" value="<?= old('post'); ?>">
                </textarea>
            </span>



            <div class="checkbox mb-3">
                <input type="hidden" name="token" value="<?= $token; ?>">
            </div>
            <button name="submit" class="btn btn-lg btn-block" type="submit">Save post</button>

        </form>    
    </div>
</div>



<?php require_once './tpl/footer.php'; ?>