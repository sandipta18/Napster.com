function togglePassword() {
  var pass = document.getElementById("password");
  if (pass.type == "password") {
    pass.type = "text";
    event.target.classList.add("fa-eye-slash ");
  }
  else {
    pass.type = "password";
  }
}

function validateEmail() {

  var email = document.getElementById('email').value;
  var regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  if (regex.test(email)) {
    document.getElementById('email').style.borderColor = "green";
    document.getElementById("button").disabled = false;
  }
  else {
    document.getElementById('email').style.borderColor = "red";
    document.getElementById("button").disabled = true;
  }


}

function validatePassword() {
  var password = document.getElementById('password').value;
  var regex = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{7,}$/;
  if (regex.test(password)) {
    document.getElementById('password').style.borderColor = "green";
    document.getElementById("button").disabled = false;
  }
  else {
    document.getElementById('password').style.borderColor = "red";
    document.getElementById("button").disabled = true;
  }
}

function removeBorder(event) {
  event.target.style.borderColor = "white";
}


$("#email").on('keydown', function () {
  $.ajax({
    url: "/validate_ajax",
    method: "POST",
    data: { email: $(this).val() },
    datatype: "text",
    success: function (html) {
      $("#check").html(html);
    },
  })
});




$('#eye').on('click', changeIcon);

function changeIcon() {
  if ($(this).hasClass('fa-eye')) {
    $(this).removeClass('fa-eye');
    $(this).addClass('fa-eye-slash');
    $('#password').attr('type', 'text');
  } else {
    $(this).removeClass('fa-eye-slash');
    $(this).addClass('fa-eye');
    $('#password').attr('type', 'password');
  }
};


$("#accept").click(function () {
  $(".wrapper").removeClass("show");
  localStorage.setItem("btnClicked", true);
});
$("#reject").click(function () {
  $(".wrapper").removeClass("show");
  localStorage.setItem("btnClicked", false);
});
$(document).ready(function () {
  var clicked = localStorage.getItem("btnClicked");
  // console.log(clicked);
  if (clicked) {
    $(".wrapper").removeClass("show");
  }
  else {
    $(".wrapper").addClass("show");
  }
});
setTimeout(check(), 0.1);
function check() {
  $(".wrapper").removeClass("show");
}
