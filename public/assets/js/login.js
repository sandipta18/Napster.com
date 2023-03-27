function toggleFunction() {
 var pass = document.getElementById("password");
  if(pass.type == "password") {
    pass.type = "text";
    event.target.classList.add("fa-eye-slash ");
  }
  else{
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
    event.target.style.borderColor = "green";
    document.getElementById("button").disabled = false;
  }
  else {
    event.target.style.borderColor = "red";
    document.getElementById("button").disabled = true;
  }
}

function removeBorder() {
  event.target.style.borderColor = "white";
}


$("#email").keyup(function () {
  // console.log($(this).val());
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


$(function () {

  $('#eye').click(function () {

    if ($(this).hasClass('fa-eye')) {

      $(this).removeClass('fa-eye');

      $(this).addClass('fa-eye-slash');

      $('#password').attr('type', 'text');

    } else {

      $(this).removeClass('fa-eye-slash');

      $(this).addClass('fa-eye');

      $('#password').attr('type', 'password');
    }
  });
});



// ---- ---- Const ---- ---- //
const cookiesBox = document.querySelector('.wrapper'),
  buttons = document.querySelectorAll('.button');

// ---- ---- Show ---- ---- //
const executeCodes = () => {
  if (document.cookie.includes('AlexGolovanov')) return;
  cookiesBox.classList.add('show');

  // ---- ---- Button ---- ---- //
  buttons.forEach((button) => {
    button.addEventListener('click', () => {
      cookiesBox.classList.remove('show');

      if (button.id == 'acceptBtn') {
        document.cookie =
          'cookieBy= AlexGolovanov; max-age=' + 60 * 60 * 24 * 30;
      }
    });
  });
};

window.addEventListener('load', executeCodes);
