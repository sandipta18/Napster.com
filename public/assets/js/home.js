
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

document.cookie = "theme=dark expires=Fri, 31 Dec 9999 23:59:59 GMT /*Not to expire*/" //when switching dark mode
document.cookie = "theme=light expires=Fri, 31 Dec 9999 23:59:59 GMT /*Not to expire*/" //when switching light mode

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

window.addEventListener("load", function () {
  if (getCookie("theme") == "light") {
    darkmode();
  } else if (getCookie("theme") == "dark") {
    darkmode();
  }
});

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


var element = document.body;
var type = document.getElementById('mode');
function darkmode() {

  element.classList.toggle("darkmode");
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

// themeBtn.onclick = function () {
//   var theme;
//   document.body.classList.toggle("dark-theme");
//   if (document.body.classList.contains("dark-theme")) {
//     themeText.innerHTML = "Light theme";
//     theme = "light";
//   }
//   else {
//     themeText.innerHTML = "Dark theme";
//     theme = "dark";
//   }
//   localStorage.setItem("PageTheme", JSON.stringify(theme));
// }
// setInterval(() => {
//   let getTheme = JSON.parse(localStorage.getItem("PageTheme"));
//   if (getTheme === "dark") {
//     document.body.classList.remove("dark-theme");
//   } else {
//     document.body.classList.add("dark-theme");
//   }
// }, 5);
