
$("#accept").click(function () {
  $(".wrapper").removeClass("show").delay(500);
  sessionStorage.setItem("btnClicked", true);
});
$("#reject").click(function () {
  $(".wrapper").removeClass("show").delay(500);
  sessionStorage.setItem("btnClicked", false);
});


$(document).ready(function () {
  var clicked = sessionStorage.getItem("btnClicked");
  console.log(clicked);
  if (clicked) {
    $(".wrapper").removeClass("show").delay(500);
  }
  else {
    $(".wrapper").addClass("show").delay(500);
  }
});

