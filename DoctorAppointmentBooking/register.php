<?php include('connection.php') ?>
<!DOCTYPEhtml>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title>Register</title>
	<link rel="stylesheet" href="reg-style.css">
	<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</head>


<body>

	<div class="wrapper">
		<form action="reg1.php" method="post">
			<h1>Sign Up</h1>
			<div class="input-box">
				<input type="text" placeholder="Username" name="username" required>	
				<box-icon name='user'></box-icon>	
			</div>
			<div class="input-box">

                <input type="hidden" id="user-id" name="user-id" readonly>
        

    <script>
        
            const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            let randomId = '';

            for (let i = 0; i < 6; i++) {
                const randomIndex = Math.floor(Math.random() * characters.length);
                randomId += characters.charAt(randomIndex);
            }

            document.getElementById('user-id').value = randomId;
        
				</script>
			</div>

			<div class="input-box">
				<input type="email" placeholder="E-mail" name="email" required>
				<box-icon name='envelope'></box-icon>
			</div>
			<div class="input-box">
				<input type="text" placeholder="House Name" name="address" required>
				<box-icon name='home'></box-icon>
			</div>
			<div class="input-box">
				<input type="text" placeholder="Place" name="place" required>
			</div>
			<div class="input-box">
				<input type="text" placeholder="Mobile Number" name="mobile" required minlength="10" maxlength="10">
				<box-icon name='phone'></box-icon>
			</div>
			<div class="input-box">
				<input type="password" placeholder="Password" name="password" minlength="5" required>
				<box-icon name='lock-alt'></box-icon>
			</div>
			<div class="input-box">
				<input type="password" placeholder="Re-enter Password" name="repassword" minlength="5" required>
				<box-icon name='lock-alt'></box-icon>
			</div>
			<button type="submit" class="btn" name='submit'><span></span>Register</button>
			<div class="login">
				<p><b> Already have an account?</b><a href="login-main.php">Login</a></p>
			</div>
			
			
		</form>
	</div>
</body>

</html>