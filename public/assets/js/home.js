
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

 counter = 10;
$(window).on("load" ,function () {
  $(".posts > section:nth-child(-n + " + counter + " ").css("display", "block");
  counter+=10;
});

$("#loadbtn").on("click", function () {
  $(".posts > section:nth-child(-n + " + counter + " ").css("display", "block");
  counter += 10;
});



$(".fa-regular").click(function() {
  $(this).toggleClass("fa-solid");
});


