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
// <i class="fa-solid fa-eye-slash"></i>
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
  console.log($(this).val());
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

