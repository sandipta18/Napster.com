<?php
require_once 'loader.html';
require_once 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#1d3041" />
  <link rel="stylesheet" href="../../public/assets/css/homepage.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
  <script src="http://benalman.com/code/projects/jquery-throttle-debounce/jquery.ba-throttle-debounce.js"></script>
  <title>Posts</title>
</head>
<img src="public/assets/img/seeya.png" alt="">

<body>
  <div class="posts">
    <?php
    for ($i = count($array) - 1; $i >= 0; $i--) { ?>
      <section id="posts-container">

        <article class="post">

          <img class="post__avatar" src="<?php echo '../../' . $array[$i]['Image']; ?>" alt="" />
          <div class="post__content" id="post_div">
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
              <img class="post__img" id="post_image" src="<?php echo '../../' . $array[$i]['Image_Content']; ?>" alt="">
              <?php
              if (strlen($array[$i]['Video']) > 20) {
              ?>
                <video class="post__img" controls src="<?php echo '../../' . $array[$i]['Video']; ?>"></video>
              <?php } ?>
              <?php
              if (strlen($array[$i]['Audio']) > 20) {
              ?>
                <audio class="post__img" controls type="audio/mpeg" src="<?php echo '../../' . $array[$i]['Audio']; ?>"></audio>
                <marquee direction="right">
                <?php
                $size = strlen($array[$i]['Audio']);
                echo substr($array[$i]['Audio'], 20, $size);
              }
                ?>
                </marquee>
            </div>
            <div class="post__footer">
              <i class="fa-regular fa-heart iconss like"></i>
              <span id="count"></span>
              <span class="time">
                <?php
                $time = round(abs(time() - strtotime($array[$i]['Post_time'])) / 3600);
                if ($time >= 24) {
                  echo floor($time / 24) . "  Day Ago";
                } else {
                  echo round(abs(time() - strtotime($array[$i]['Post_time'])) / 3600) . " Hours Ago";
                }
                ?>
              </span>
            </div>
          </div>

        </article>
      </section>
    <?php } ?>

    <button name="loadmore" id="loadbtn">Load More</button>
</body>
<script src="../../public/assets/js/home.js"></script>

</html>
