$("#accept").on('click',$.debounce(500,cookieTrue));
function cookieTrue()
{
  $(".wrapper").removeClass("show");
  localStorage.setItem("btnClicked", true);
  $.ajax({
    url: "cookie_ajax",
    method: "POST",
    data: {value : 1},
    datatype: "text",
  })
};

$("#reject").on('click',$.debounce(500,cookieFalse));
function cookieFalse()
{
  $(".wrapper").removeClass("show");
  localStorage.setItem("btnClicked", false);
  $.ajax({
    url: "cookie_ajax",
    method: "POST",
    data: { value: 0 },
    datatype: "text",
  })
};

$(document).on('ready',function () {
  var clicked = localStorage.getItem("btnClicked");
  if (clicked) {
    $(".wrapper").removeClass("show");
  }
  else {
    $(".wrapper").addClass("show");
  }
});

setTimeout(check, 0.1);
function check() {
  $(".wrapper").removeClass("show");
}

