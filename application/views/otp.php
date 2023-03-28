<?php
require_once 'loader.html';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="#1d3041" />
	<title>Validate OTP</title>
	<link rel="stylesheet" href="../../public/assets/css/otp.css">
	<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
</head>

<body>
	<div class="prompt">
		Enter the code generated on your mobile device below to log in!
	</div>

	<form method="post" class="digit-group" data-group-name="digits" data-autosubmit="false" autocomplete="off" action="validateotp">
		<input type="text" id="digit-1" name="digit-1" data-next="digit-2" />
		<input type="text" id="digit-2" name="digit-2" data-next="digit-3" data-previous="digit-1" />
		<input type="text" id="digit-3" name="digit-3" data-next="digit-4" data-previous="digit-2" />
		<span class="splitter">&ndash;</span>
		<input type="text" id="digit-4" name="digit-4" data-next="digit-5" data-previous="digit-3" />
		<input type="text" id="digit-5" name="digit-5" data-next="digit-6" data-previous="digit-4" />
		<input type="text" id="digit-6" name="digit-6" data-previous="digit-5" />
		<button type="submit" name="submit"></button>
	</form>
	<div class="error" id="hideMeAfter5Seconds">
		<?php
		if (isset($GLOBALS['error'])) {
			echo $GLOBALS['error'];
		}
		?>
	</div>
	<div class="timer">
		<?php require_once 'timer.php'; ?>
	</div>
	<div class="option">
		<a href="resend" class="resend" id="resend">Resend OTP</a>
	</div>
	<script src="../../public/assets/js/otp.js"></script>
</body>

</html>
