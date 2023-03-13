<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../public/assets/css/register.css">
  <script src="../../public/assets/js/register.js"></script>
  <title>Login Page</title>
</head>

<body>
  <form enctype="multipart/form-data" id="signup_form" method="POST" action="registration" class="signup" autocomplete="off">
    <h1>Create account</h1>
    <h2>Already have an account? <a href="/login">Sign in</a></h2>

    <div class="signup__field">
      <input class="signup__input" type="text" name="username" id="username" required />
      <label class="signup__label" for="username">Username</label>
    </div>

    <div class="signup__field">
      <input class="signup__input" type="email" name="email" id="email" required />
      <label class="signup__label" for="email">Email</label>
    </div>

    <div class="signup__field">
      <input class="signup__input" type="password" name="password" id="password" required />
      <label class="signup__label" for="password">Password</label>
    </div>

    <button name="submit_register">Sign up</button>
    <div class="message">
    <?php
    if (isset($_SESSION['signup']) && $_SESSION['signup'] == true) {
      echo "Signed Up";
    } elseif (isset($_SESSION['signup']) && $_SESSION['signup'] == false) {
      echo "Already signed up";
    }
    ?>
    </div>
  </form>
</body>

</html>