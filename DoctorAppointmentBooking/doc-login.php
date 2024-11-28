
<!DOCTYPEhtml>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="style.css">
	<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</head>


<body>

	<div class="wrapper">
		<form action="login-doc.php" method="post">
			<h1>Doctor Login</h1>
			<div class="input-box">
				<input type="text" placeholder="E-mail" name="email" required>
				<box-icon type='solid' name='user-circle'></box-icon>
			</div>
			<div class="input-box">
				<input type="text" placeholder="Doctor's Id" name="id" minlength="4" required>
				<box-icon type='solid' name='user'></box-icon>
			</div>
			<div class="input-box">
				<input type="password" placeholder="Password" name="password" minlength="8" required>
				<box-icon type='solid' name='lock'></box-icon>
			</div>
			<button type="submit" class="btn" name="login">Login</button>
			<div class="register-link">
				<p>Don't have an account?<a href="doc-registration"><b>Sign Up As A DOCTOR</b></a></p>
			</div>
		</form>
	</div>

		
</body>

</html>