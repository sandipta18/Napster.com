
$('#scroll').on('click',function (e) {
  e.preventDefault();
  $('html, body').animate({ scrollTop: 0 }, '1000');
});

$(window).on('scroll',scroller);

function scroller ()
{
  var scroll = $(window).scrollTop();
  if (scroll >= 300) {
    $("#scroll").addClass("show");
  } else {
    $("#scroll").removeClass("show");
  }
};

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


// This is the load more functionality
counter = 10;
$(window).on("load", function () {
  $(".posts > section:nth-child(-n + " + counter + " ").css("display", "block");
  counter += 10;
});

$("#loadbtn").on("click", function () {
  $(".posts > section:nth-child(-n + " + counter + " ").css("display", "block");
  counter += 10;
});



$(".fa-regular").on('click', function () {
  $(this).toggleClass("fa-solid");
});



// This is the search user functionality

$("#search").on('keydown', $.debounce(500,searchUser));

function searchUser() {
  var input = $(this).val();
  if (input != "") {

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

};


// This function is used to toggle between dark and light mode
var type = document.getElementById('mode');
function darkmode() {

  document.body.classList.toggle("darkmode");
  document.body.classList.toggle("dark-theme");

  if (document.body.classList.contains("dark-theme")) {
    type.innerHTML = "Light Mode";
    theme = "light";
  }
  else {
    type.innerHTML = "Dark Mode";
    theme = "dark";
  }
  localStorage.setItem("PageTheme", JSON.stringify(theme));

}
// This function is used to preserve the light mode
setInterval(() => {
  var element = document.body;
  let getTheme = JSON.parse(localStorage.getItem("PageTheme"));
  if (getTheme === "dark") {
    document.body.classList.remove("dark-theme");
    element.classList.remove("darkmode");
    type.innerHTML = "Dark Mode";
  } else {
    document.body.classList.add("dark-theme");
    element.classList.add("darkmode");
    type.innerHTML = "Light Mode";
  }
}, 1);


