
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


$("#search").keyup(function(){
  var input = $(this).val();
  if(input != "") {

    $.ajax({
      url: "search",
      method: "POST",
      data: { search: input },
      datatype: "text",
      success: function (html) {
        $("#result").html(html);
        $("#result").css("opacity", "1");
        $("#search").focusout(function () {
          $('#result').css('opacity', '0');
        });
        $("#search").focusin(function () {
          $('#result').css('opacity', '1');
        });
      },
    })

  }
  else {
    $("#result").css("opacity", "0");
  }

});
