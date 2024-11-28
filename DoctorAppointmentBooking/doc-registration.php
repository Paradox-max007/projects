
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
		<form action="registration.php" method="post" enctype="multipart/form-data">
			<h1>Sign Up</h1>
			<div class="input-box">
				<input type="text" placeholder="Name" name="username" required>	
				<box-icon name='user'></box-icon>	
			</div>
			<div class="input-box">
				<input type="email" placeholder="E-mail" name="email" required>
				<box-icon name='envelope'></box-icon>
			</div>
			<div class="input-box">
				<input type="text" placeholder="Medical Id" name="med-id" required minlength="5">
				
			</div>
			<div class="input-box">
				<input type="text" placeholder="Place" name="place" required>
			</div>
			<div class="input-box">
				<input type="text" placeholder="Mobile Number" name="mobile" required>
				<box-icon name='phone'></box-icon>
			</div>
			<div class="input-box">
				<label for="selectOption">Select Specialisation:</label>

				<select id="selectOption" name="specialisation">
            		<option value="Cardiology">Cardiology</option>
            		<option value="Neurology">Neurology</option>
            		<option value="Orthopedics">Orthopedics</option>
            		<option value="Pediatrics">Pediatrics</option>
            		<option value="Radiology">Radiology</option>
            		<option value="Family Medicine">Family Medicine</option>
            		<option value="ENT">ENT</option>
            		<option value="General Surgery">General Surgery</option>
            		<option value="Dermatology">Dermatology</option>
            		<option value="Gynecology">Gynecology</option>
        </select>
			</div>
			<div class="input-box">
				<input type="password" placeholder="Password" name="password" minlength="8" required>
				<box-icon name='lock-alt'></box-icon>
			</div>
			<div class="input-box">
				<input type="password" placeholder="Re-enter Password" name="repassword" minlength="8" required>
				<box-icon name='lock-alt'></box-icon>
			</div>
			<div class="image">
			<p>Please upload your profile picture</p>
			<label>Upload Image:</label>
			<input type="file" name="image" required>
		</div>
			
			<button type="submit" class="btn" name='submit'>Sign Up</button>
			<div class="login">
				<p><b> Already have an account?</b> <a href="doc-login.php">Login</a></p>
			</div>
			
			
		</form>
	</div>
</body>

</html>