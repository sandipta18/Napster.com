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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Home</title>
</head>

<body>
  <section class="create-post">

    <form id="create-post-form" class="create-post__form" action="">
      <span class="welcome"><?php echo 'Hello ' . ucwords(strtolower($_SESSION['name'])); ?> </span>
      <div class="create-post__text-wrap">
        <textarea aria-label="Share something ..." name="post-text" id="create-post-txt" oninput="this.parentNode.dataset.replicatedValue = this.value" placeholder="Write something about you..."></textarea>
      </div>

      <div class="create-post__media-wrap" id="create-post-media-wrap"></div>

      <div class="create-post__buttons">
        <div class="create-post__assets-buttons">
          <button type="button" aria-label="Add an image to the post" class="create-post__asset-btn" for="create-post-media" onclick="this.querySelector('input').click()">

            <i class="fa-solid fa-image"></i>
            Photo
            <input type="file" name="post-img" id="create-post-media" accept=".png, .jpg, .jpeg, .gif" />
          </button>
          <button type="button" aria-label="Add a video to the post" class="create-post__asset-btn" for="create-post-media">
            <i class="fa-solid fa-video"></i>
            Video
          </button>
          <button type="button" aria-label="Add a video to the post" class="create-post__asset-btn" for="create-post-media">

            <i class="fa-solid fa-location-dot"></i>
            Location
          </button>
          <button type="button" aria-label="Add a video to the post" class="create-post__asset-btn" for="create-post-media">

            <i class="fa-solid fa-tag"></i>
            Tag
          </button>
          <button type="button" aria-label="Add a video to the post" class="create-post__asset-btn" for="create-post-media">

            <i class="fa-solid fa-headphones"></i>
            Audio
          </button>
        </div>
        <button class="create-post__submit" type="submit" disabled id="create-post-submit-btn">Post</button>
      </div>
    </form>
  </section>

  <section id="posts-container">
  <article class="post">
      <!-- <img class="post__avatar" src="" alt="" /> -->
      <?php
        // echo "<img class='post_avatar' src=" . $_SESSION['filepath'] . " height=60 width=60 />";
        ?>
      <div class="post__content">
        <header class="post__header">
          <p class="post__user">
            <?php echo $_SESSION['name']; ?>
          </p>
          <div class="post__meta">
          
            <button class="post__header-btn">
              
            </button>
            <button class="post__header-btn">
            
            </button>
          </div>
        </header>
        <div class="post__body">
        <p class="caption">Chilling at sea</p>
          <img class="post__img" src="../../public/assets/img/self.jpeg" alt="">
          
        </div>
        <div class="post__footer">
        <i class="fa-sharp fa-solid fa-heart iconss"></i>
        <i class="fa-sharp fa-solid fa-comment iconss"></i>
        <i class="fa-sharp fa-solid fa-share iconss"></i>
        </div>
      </div>
    </article>
  </section>

</body>

</html>
<script src="../../public/assets/js/home.js"></script>