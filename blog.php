<?php
require_once './functions.php';
//session_start();
startMySession();
areUconected();

require_once './tpl/header.php';
msMessage();

if (!isset($_SESSION['ms'])) {
    $con = db_conect();
    $sql = "SELECT posts.*,users.name FROM `posts` JOIN users ON users.id=posts.uid";

    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) > 0) {

        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

//          echo "<pre>";
//     print_r($data);
    }
}
?>
<link rel="stylesheet" href="css/blog.css">
<main role="main">

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container wrapIt ">
            <h1 class="display-3">Hello <?= $_SESSION['name']; ?></h1>
            <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
            <p><a class="btn btn-primary btn-lg add" href="add_post.php" role="button"> + Add A Recipe</a></p>
        </div>
    </div>
    <div>

    </div>

    <div class="container">
        <!-- Example row of columns -->
        <div class="row">


            <?php if (!empty($data)) : ?>
                <?php foreach ($data as $info): ?>
                    <div class="col-md-4 mb-2 ">
                        <div class="my-2 mx-auto p-relative bg-white shadow-1 blue-hover" style="width: 360px; overflow: hidden; border-radius: 1px;">
                            <div class="px-2 py-2">
                                <p class="mb-0 small font-weight-medium text-uppercase mb-1 text-muted lts-2px">
                                    <?= $info['title']; ?>
                                </p>

                                <?php if (!empty($info['pic'])) : ?>
                                    <img style="width: 350px;height: 250px;" src="<?= 'pics/' . $info['pic']; ?>" alt="food" class="d-block w-full">
                                <?php else : ?> 
                                    <img style="width: 350px;height: 250px;" src="https://loremflickr.com/320/240/food" alt="food" class="d-block w-full">
                                <?php endif; ?> 
                                    


                                <h1 class="ff-serif font-weight-normal text-black card-heading mt-0 mb-1" style="line-height: 1.25;">
                                    <?= $info['post']; ?>
                                </h1>

                                <p class="mb-1">
                                    Wrote By: <?= $info['name']; ?> &hellip;
                                </p>

                            </div>

                            <a href="#0" class="text-uppercase d-inline-block font-weight-medium lts-2px ml-2 mb-2 text-center styled-link">
                                Read More
                            </a>









                            <br><br>
                            <?php if ($_SESSION['uid'] == $info['uid']) : ?>
                                <p>
                                    <a style="width: 100px;margin-left: 85px;" class="btn btn-secondary " href="edit_post.php?post_id=<?= $info['id']; ?>" role="button">Edit</a>
                                    <a style="width: 100px;margin-left: 5px;margin-bottom: 5px;" class="btn btn-secondary " href="delete.php?post_id=<?= $info['id']; ?>" role="button">Delete</a>
                                </p>
                                
                            <?php endif; ?>
                        </div> <!--</info>--> 
                    </div> <!--</col>--> 
                <?php endforeach; ?>
            <?php endif; ?>
        </div> <!--</row>--> 
    </div>  <!--</container>--> 

<?php require_once 'tpl/footer.php'; ?>
    
