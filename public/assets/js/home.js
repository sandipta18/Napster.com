
function darkmode() {
  var element = document.body;
  element.classList.toggle("darkmode");
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
