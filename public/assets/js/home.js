
function darkmode() {
  var element = document.body;
  var type = document.getElementById('mode');
  element.classList.toggle("darkmode");
  document.body.classList.toggle("dark-theme");
  if (document.body.classList.contains("dark-theme")) {
    type.innerHTML = "Light Mode";
  }
  else {
    type.innerHTML = "Dark Mode";
  }

}

  $('#scroll').click(function (e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: 0 }, '1000');
  });

$(window).scroll(function () {
  var scroll = $(window).scrollTop();

  if (scroll >= 300) {
    $("#scroll").addClass("show");
  } else {
    $("#scroll").removeClass("show");
  }
});

$(document).ready(() => {
  $("#imagePreview").css("display", "none");
  $("#create-post-media").change(function () {
    const file = this.files[0];
    if (file) {
      let reader = new FileReader();
      reader.onload = function (event) {
        $("#imagePreview")
          .attr("src", event.target.result);
        $("#imagePreview").css("display", "block");
      };
      reader.readAsDataURL(file);
    }
  });
});

var x = 10;
$(window).on("load" ,function () {
  $(".posts > section:nth-child(-n + " + x + " ").css("display", "block");
  x+=10;
});

$("#loadbtn").on("click", function () {
  $(".posts > section:nth-child(-n + " + x + " ").css("display", "block");
  x += 10;
});

$(document.querySelectorAll('.like')).on('click', function () {
  if ($(this).attr('data-click-state') == 1) {
    $(this).addClass('active');
    $(this).attr('data-click-state', 0);

  }
  else {
    $(this).attr('data-click-state', 1);
    $(this).removeClass('active');
  }
});

// $(document.querySelectorAll('.post__img')).on('dblclick', function () {
//   if ($(document.querySelector('.like')).attr('data-click-state') == 1) {
//     $(document.querySelector('.like')).addClass('active');
//     $(document.querySelector('.like')).attr('data-click-state', 0);

//   }
//   else {
//     $(document.querySelector('.like')).attr('data-click-state', 1);
//     $(document.querySelector('.like')).removeClass('active');
//   }
// });
