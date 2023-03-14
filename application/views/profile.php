<?php 
session_start();
?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="profileone.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <link rel="stylesheet" href="../../public/assets/css/profilepage.css">
  <title>Profile Page</title>
</head>

<body>

<div class="container">
	<div class="box">
		<h1>Update Profile</h1>
		<form method="POST" class="form">
			<input id="demo1" class="demo1" type="file"  placeholder="Update Image" name="image" />
      <input type="submit" class="btn btn-primary submit"  name="submit">
		</form>
	<?php 
  if(isset($_SESSION['message'])){
    echo $_SESSION['message'];
    $_SESSION['message'] = "";
    unset($_SESSION['message']);
  }
  ?>
	</div>
</div>
</body>
<script src="../../public/assets/js/profile.js"></script>

</html>