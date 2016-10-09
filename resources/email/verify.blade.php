<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<h2>Verify Your Email Address</h2>

		<p>Thanks for creating an account! Please follow the link below to verify your email address: {{ url('/register/verify/' . $confirmation_code) }}</p>
	</body>
</html>