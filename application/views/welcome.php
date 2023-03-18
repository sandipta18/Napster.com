<?php
session_start();
if ($_SESSION['Login'] == FALSE) {
  header('location: /');
}
require_once 'loader.html';
require_once 'navbar.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../public/assets/css/homepage.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Home</title>
</head>

<body>
  <section class="create-post">
  <img class="post__avatar" src="<?php echo  $_SESSION['filepath']; ?>" alt="" />
    <form enctype="multipart/form-data" id="create-post-form" class="create-post__form" action="home" method="POST" >
      <span class="welcome"><?php echo 'Hello ' . ucwords(strtolower($_SESSION['name'])); ?> </span>
      <div class="create-post__text-wrap">
        <textarea aria-label="Share something ..." name="post-text" id="create-post-txt" oninput="this.parentNode.dataset.replicatedValue = this.value" placeholder="Write something here..."></textarea>
      </div>
      <div class="create-post__media-wrap" id="create-post-media-wrap"></div>
      <div class="create-post__buttons">
        <div class="create-post__assets-buttons">
          <button type="button" aria-label="Add an image to the post" class="create-post__asset-btn" for="create-post-media" onclick="this.querySelector('input').click()">
            <i class="fa-solid fa-image post-icon"></i>
            Photo
            <input type="file" name="post-img" id="create-post-media" accept=".png, .jpg, .jpeg, .gif" />
          </button>
          <button type="button" aria-label="Add an image to the post" class="create-post__asset-btn" for="create-post-media" onclick="this.querySelector('input').click()">
          <i class="fa-solid fa-video post-icon"></i>
            Video
            <input type="file" name="video" id="create-post-media" accept=".mp4" />
          </button>
          <button type="button" aria-label="Add an image to the post" class="create-post__asset-btn" for="create-post-media" onclick="this.querySelector('input').click()">
          <i class="fa-solid fa-location-dot post-icon"></i>
            Checkin
            <input type="file"  id="create-post-media" accept=".png, .jpg, .jpeg, .gif" />
          </button>
          <button type="button" aria-label="Add an image to the post" class="create-post__asset-btn" for="create-post-media" onclick="this.querySelector('input').click()">
          <i class="fa-solid fa-user-tag post-icon"></i>
            TagUsers
            <input type="file"  id="create-post-media" accept=".png, .jpg, .jpeg, .gif" />
          </button>
        </div>
        <button class="create-post__submit" type="submit"  id="create-post-submit-btn" name="submit">Post</button>
      </div>
      
    </form>
  </section>
  <?php 
  for($i=0;$i<count($array);$i++) { ?>
   <section id="posts-container">
    
    <article class="post">

      <img class="post__avatar" src="<?php echo $array[$i]['Display']; ?>" alt="" />
      <div class="post__content">
        <header class="post__header">
          <p class="post__user">
            <?php echo ucwords(strtolower($array[$i]['Username'])); ?>
          </p>
          <div class="post__meta">
          
            <button class="post__header-btn">
              
            </button>
            <button class="post__header-btn">
            
            </button>
          </div>
        </header>
        <div class="post__body">
        <p class="caption"><?php echo $array[$i]['Content']; ?></p>
          <img class="post__img" src="<?php echo $array[$i]['Image'] ;?>" alt="">
          <?php 
          if(strlen($array[$i]['Video']) > 20){
          ?>
          <video class="post__img" controls src="<?php echo $array[$i]['Video']; ?>"></video>  
          <?php } ?>
        </div>
        <div class="post__footer">
        <i class="fa-regular fa-heart iconss"></i>
        <i class="fa-regular fa-comment iconss"></i>
        </div>
      </div>

    </article>
  </section> 
<?php } ?>
</body>

</html>


<!-- <script src="../../public/assets/js/home.js"></script> -->