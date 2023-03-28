<?php
session_start();
if ($_SESSION['Login'] == FALSE) {
  session_destroy();
  header('location: /');
}
require_once 'loader.html';
require_once 'navbar.php';
require_once 'cookie.html';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="theme-color" content="#1d3041" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#1d3041" />
  <link rel="stylesheet" href="../../public/assets/css/homepage.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js" integrity="sha512-JZSo0h5TONFYmyLMqp8k4oPhuo6yNk9mHM+FY50aBjpypfofqtEWsAgRDQm94ImLCzSaHeqNvYuD9382CEn2zw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="http://benalman.com/code/projects/jquery-throttle-debounce/jquery.ba-throttle-debounce.js"></script>
  <title>Home</title>
</head>

<body>
  <div class="container">
    <div class="search-result">
      <div class="search">
        <div class="search-box">
          <input class="search-input" name="search" type="text" placeholder="Search.." id="search" autocomplete="off">
          <a class="search-btn">
            <i class="fas fa-search"></i>
          </a>
        </div>
      </div>
      <span id="result">
      </span>
    </div>
    <a href="#" id="scroll"><span></span></a>
    <section class="create-post">
      <img class="post__avatar" src="<?php echo  $_SESSION['filepath']; ?>" alt="" />
      <form enctype="multipart/form-data" id="create-post-form" class="create-post__form" action="home" method="POST">
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
              <img id="imagePreview" />
              <input type="file" name="post-img" id="create-post-media" accept=".png, .jpg, .jpeg, .gif" />
            </button>
            <button type="button" aria-label="Add an image to the post" class="create-post__asset-btn" for="create-post-media" onclick="this.querySelector('input').click()">
              <i class="fa-solid fa-video post-icon"></i>
              Video
              <input type="file" name="video" id="create-post-media" accept=".mp4" />
            </button>
            <button type="button" aria-label="Add an image to the post" class="create-post__asset-btn" for="create-post-media" onclick="this.querySelector('input').click()">
              <i class="fa-solid fa-music post-icon"></i>
              Audio
              <input type="file" name="audio" id="create-post-media" accept=".mp3" />
            </button>
            <button type="button" aria-label="Add an image to the post" class="create-post__asset-btn" for="create-post-media" onclick="this.querySelector('input').click()">
              <i class="fa-solid fa-user-tag post-icon"></i>
              TagUsers
              <input type="file" id="create-post-media" accept=".png, .jpg, .jpeg, .gif" />
            </button>
          </div>
          <button class="create-post__submit" type="submit" id="create-post-submit-btn" name="submit">Post</button>
        </div>

      </form>
    </section>
    <div class="posts">
      <?php
      for ($i = count($array) - 1; $i >= 0; $i--) { ?>
        <section id="posts-container">

          <article class="post">

            <img class="post__avatar" src="<?php echo $array[$i]['Image']; ?>" alt="" />
            <div class="post__content" id="post_div">
              <header class="post__header">

                <a class="post__user" href="self/<?php echo base64_encode($array[$i]['Email']); ?>">
                  <?php echo ucwords(strtolower($array[$i]['Username'])); ?>
                </a>

                <div class="post__meta">

                  <button class="post__header-btn">

                  </button>
                  <button class="post__header-btn">

                  </button>
                </div>
              </header>
              <div class="post__body">
                <p class="caption"><?php echo $array[$i]['Content']; ?></p>
                <img class="post__img" id="post_image" src="<?php echo $array[$i]['Image_Content']; ?>" alt="">
                <?php
                if (strlen($array[$i]['Video']) > 20) {
                ?>
                  <video class="post__img" controls src="<?php echo $array[$i]['Video']; ?>"></video>
                <?php } ?>
                <?php
                if (strlen($array[$i]['Audio']) > 20) {
                ?>
                  <audio class="post__img" controls type="audio/mpeg" src="<?php echo $array[$i]['Audio']; ?>"></audio>
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
                <a href="https://www.facebook.com/sharer/sharer.php?s=100&p[url]=http://www.napster.com&$array[$i][Image][0]=&p[title]=Title%20Goes%20Here&p[summary]=Description%20goes%20here!" target="_blank" " onclick=" window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250'); return false"><img class="fb" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADkAAAAUCAMAAAAA9GVfAAACnVBMVEU0TI01TIw1TY01TY41TY81To82TY42TY85UZU6U5k7VJs7VZ07VaE8VZs8Vp08VqE8VqI8V6I9Vp49V6A9V6M+WJ8+WKA+WKQ+WaQ+WaU/WaM/WaQ/WaY/WqY/WqdAW6ZAW6dAW6hBW6dBXKhBXKlCXapCXatCXqpCXqxDXqtDXqxDX6xEX65EYK5EYK9FX65FYK9FYa9FYbBGYbBGYrFGYrJHYrFHY7JHY7NIZLNIZLRIZbRJZbVJZrZKZrZKZ7dLZ7hLaLhLaLlMablSaKpSaaxTaq1ZcbVbc7hfdLJfdbNfdbRfdrZgdrdhd7dhe8Fiebtie8Fofr9qgcFsgb5shMVthcZugrhugrtvgrxwhL1whL5xhb9xhcBzh8JziL9ziMJziMN1isV1isZ2iL12ir52isF5jMWAjreAk8eEk7+ElMOFlseFmMiIl7yKmsqOnL+RnsGSnsGVpdCXp9SeqsmfrNKfrNOfrdSgrdOgrdSgrtOgrtWhrtShrtWhr9Sir9WisNaisNejsNimstWoss+qtM+suNesudyuudmwvNyyvNazvNizvdqzvtqzvtu0vtu0vty0v9y0v961v921v962v9i3v9a3wd24wt65wtu5w+G8xeG8xuG9xNq+xtzAyeHAyePByuHCyd7Dy+DEzOPFzOHGz+fGz+nJ0OLL0uXN1OjP1urQ1+vS1+bS2OfT2evU2uzV2+vW2+jY3evZ3uzZ3u3b4O7c4vHd4ezd4/Le4/Df4+3f4+/g5PHg5fHh5vHk5/Dk6PLn6vXo6/Xo7Pbp7PTq7fbr7vTr7vbt8Pbx8vfx8vjx8/j09fr09vn19vr19/v29/r3+Pv5+vz6+/z6+/37+/37/P78/P38/P78/f79/f7+/v////+ZYdejAAACCUlEQVR4AWNYEebkTAYMXMHg7+BIFgxlsLMnEzLY2tja7LqHBHYARYiBDFbWVtb3UABQhBjIYGlhaQHTszw5uOTePZCIpakoEwOvmQarMpCNHTKYmJuYQzUeBbKT7t0DiZj4rbtzd09K49UpQDZ2yGBibGIM1dlsEnQESIFETFquL+i4sbzhajcbs5SxkRATA6e+PCMHs5IYMxOfAVgFg56hniFUZ5NeIogCiehNvjuPS12v/uqxazcXa3uvv3P3YOqke6duzVx5687mcLAKBl0dXR2wviNNcboeTbPv3QOJ6KYfv7szT6L26u6EQ6czu85ktd6cOOnepoBZF4oKLy0Dq2DQ0tbSButcC2JpFd+7B6a1QxZevD2t+uoMrVXnc13a9l65N2HCvQnaW0Aq94FVMGiqaaqBdR6uidV0r1lz7x5IRJObRTr+xLEZV/s1V53PWXJ9afvVfqBOta3ns6XZhcEqGFRUVVSh/qxTiQFRIBGV1ddKM84e6LzapwLUue1ywfy7Pb33elXn3J5eemUuWAWDiqKKIlRnlUo0WKciEKbtv3P3ZH7ttSkqqy/mVJy7e/zyhqn3pir6brh1Z6MPWAWDnIKcAlRnpVwUiAKKEAMZZGVkZaA6y2UjQRRQhBjIIC4pLrkdorNMPAJIbgeKEAMZxEXIhAxuggJkQS+GRZ78PGRA10UAUdSA0BPiLlkAAAAASUVORK5CYII=" width="70" /></a>
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
    </div>
  </div>
  <!-- <span id="emni"></span> -->
  <!-- Go to www.addthis.com/dashboard to customize your tools -->
  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6422dcbca4cb35fd"></script>

</body>

</html>
<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
<script src="../../public/assets/js/home.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
