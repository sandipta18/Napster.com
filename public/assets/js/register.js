
$(document).ready(function () {

    $("#username").keydown(function () {
      return /[a-z]/i.test(event.key);
    });

});

function validateEmail() {
  var email = document.getElementById('email').value;
  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if(email.length <1){
    document.getElementById('error').innerHTML = "";
    document.getElementById('btn').disabled = true;
  }
  else {
  if(!regex.test(email)) {
    document.getElementById('error').innerHTML = "Invalid email address";
    document.getElementById('btn').disabled = true;
  }
  else{
    document.getElementById('error').innerHTML = "";
    document.getElementById('btn').disabled = false;
  }
}
}

function validatePassword(){
  var password = document.getElementById('password').value;
  var regex = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
  if(password.length <1){
    document.getElementById('error_pass').innerHTML = "";
    document.getElementById('btn').disabled = true;
  }
  else{
    if(!regex.test(password)) {
      document.getElementById('error_pass').innerHTML = "Invalid password";
      document.getElementById('btn').disabled = true;
    }
    else{
      document.getElementById('error_pass').innerHTML = "";
      document.getElementById('btn').disabled = false;
    }
  }
}

const textarea = document.querySelector("textarea");
textarea.addEventListener("keyup", (e) => {
  textarea.style.height = "63px";
  let scHeight = e.target.scrollHeight;
  textarea.style.height = `${scHeight}px`;
});

$("#email").keyup(function () {
  $.ajax({
    url: "/validate_ajax",
    method: "POST",
    data: { email: $(this).val() },
    datatype: "text",
    success: function (html) {
      if(html){
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
