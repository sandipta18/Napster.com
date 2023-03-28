
$(document).on('ready', function () {

  $("#username").keydown(function () {
    return /[a-z]/i.test(event.key);
  });

});

function validateEmail() {
  var email = document.getElementById('email').value;
  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if (email.length < 1) {
    document.getElementById('btn').disabled = true;
    return false;
  }
  else {
    if (!regex.test(email)) {
      document.getElementById('btn').disabled = true;
      return true;
    }
    else {
      // document.getElementById('error').innerHTML = "";
      document.getElementById('btn').disabled = false;
      return false;
    }
  }
}

function validatePassword() {
  var password = document.getElementById('password').value;
  var regex = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
  if (password.length < 1) {
    document.getElementById('btn').disabled = true;
    return false;
  }
  else {
    if (!regex.test(password)) {
      document.getElementById('btn').disabled = true;
      return true;
    }
    else {
      document.getElementById('btn').disabled = false;
      return true;
    }
  }
}

const textarea = document.querySelector("textarea");
textarea.addEventListener("keydown", (e) => {
  textarea.style.height = "63px";
  let scHeight = e.target.scrollHeight;
  textarea.style.height = `${scHeight}px`;
});

$("#email").on('keydown',function () {
  $.ajax({
    url: "/validate_ajax",
    method: "POST",
    data: { email: $(this).val() },
    datatype: "text",
    success: function (html) {
      if (html) {
        $("#message").html(html);
        $("#btn").prop('disabled', true);
      }
      else {
        $("#btn").prop('disabled', false);
        $("#message").html("");
      }
    }
  })
});
