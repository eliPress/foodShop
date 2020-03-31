<?php
require_once './functions.php';
require_once './tpl/header.php';
//session_start();
?>

<main role="main">
    <link rel="stylesheet" href="css/index.css"/>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="">
        <header>
            <div class="overlay"></div>
            <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
                <source src="pics/Food.mp4" type="video/mp4">
            </video>
            <div class="container h-100">
                <div class="d-flex h-100 text-center align-items-center">
                    <div class="w-100 text-white">
                        <h1 class="display-3">hello guest</h1>
                        <p class="lead mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, totam, veniam, 
                            assumenda tenetur eum aperiam voluptatibus porro minima nisi impedit obcaecati architecto odio amet eius laudantium ipsa dolorem hic neque.</p>
                    </div>
                </div>
            </div>
        </header>
    </div>
</main>
<br>



<div class="  middelWrap">
    <div class="row">
        <div class="col">
            <img class="imgs" src="pics/burger.png" width="500px;" alt="" >
        </div>
        <div class="col miniWrap">
            orem ipsum dolor sit amet, consectetur adipisicing elit. Autem, magni, 
            nobis, eum eveniet molestias impedit dicta voluptatem temporibus incidunt 
            sequi ipsa neque reprehenderit accusantium totam ratione quidem numquam placeat maxime.
        </div>
    </div>

    <div class="middelWrapSec">
        <div class="row">
            <div class="col">
                orem ipsum dolor sit amet, consectetur adipisicing elit. Autem, magni, 
                nobis, eum eveniet molestias impedit dicta voluptatem temporibus incidunt 
                sequi ipsa neque reprehenderit accusantium totam ratione quidem numquam placeat maxime.
            </div>
            <div class="col miniWrapSec">
                <img class="imgs" src="pics/pizza.png" width="500px;" alt="" >
            </div>
        </div>
    </div>
  <div class="middelWrapThird">
    <div class="row">
        <div class="col">
            <img class="imgs" src="pics/pasta.png" width="500px;" alt="" >
        </div>
        <div class="col miniWrapThird">
            orem ipsum dolor sit amet, consectetur adipisicing elit. Autem, magni, 
            nobis, eum eveniet molestias impedit dicta voluptatem temporibus incidunt 
            sequi ipsa neque reprehenderit accusantium totam ratione quidem numquam placeat maxime.
        </div>
    </div>
  </div>
</div>

    
    
<?php require_once 'tpl/footer.php'; ?>




    