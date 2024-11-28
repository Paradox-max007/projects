
<!DOCTYPEhtml>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="style.css">
	<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
	<style>
		.close {
            width: 30px; /* Set the width and height to create a circle */
            height: 30px;
            border-radius: 30%; /* Border-radius 50% makes it a circle */
            background-color: none; /* Background color */
            color: white; /* Text color */
            border: 1px solid red; /* No border */
            cursor: pointer; /* Cursor style */
        }
        .close:hover {
        	background-color: red;
        }
	</style>
</head>


<body>

	<div id="loginModal" class="wrapper">
	<button class="close" onclick="closeModal()">&times;</button>	
		<form action="login.php" method="post">

			<h1>Login</h1>
			<div class="input-box">
				<input type="email" placeholder="E-mail" name="email" required>
				<box-icon type='solid' name='user-circle'></box-icon>
			</div>
			
			<div class="input-box">
				<input type="password" placeholder="Password" name="password" minlength="5" required>
				<box-icon type='solid' name='lock'></box-icon>
			</div>
			<div class="remember-forgot">
				<label><input type="checkbox">Remember me</label>
				<a href="#">Forgot Password?</a>
			</div>
			<button id="loginButton" type="submit" class="btn" name="login"><span></span>Login</button>
			<div class="login">
				<p><h3>Don't have an account?<a href="register.php"><b>Sign Up</b></a></h3></p>
			</div>
		</form>
	</div>
	 <script>
    // JavaScript function to close the modal
    function closeModal() {
      
    	window.history.back();
    }

      
  </script>
    
		
</body>

</html>