<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Login Page</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
		integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link rel="stylesheet" href="abc.css">

</head>

<body>
	<!-- login-box -->
	<div class="box-form">
		<div class="left">
			<div class="overlay">
				<h1>APMC</h1>
				<p>make your bid at your home with better prices
					and get MSP by own </p>
			</div>
		</div>


		<div class="right">
			<h5>Login</h5>
			<p>Don't have an account? <a href="signup.php">Creat Your Account</a> it takes less than a minute</p>
			<div class="inputs">
				<form method="POST" action="login_db.php">
				<h4>login as</h4>
				<div class="radio-btns" required>
					<p>Farmer</p>
					<input type="radio" name="user" value="Farmer" required>
					<p>Trader</p>
					<input type="radio" name="user" value="Trader" required>
				</div>
				<input type="text" placeholder="phone number" id="phnnum" name="phno" required>
				<br>
				<input type="password" placeholder="password" id="password" name="password" required>
				<input type="submit" value="Login">
				</form>
			</div>

			<br><br>


			<br>
			
		</div>

	</div>

	<script>
        // phone number validation

        $('#phnnum').keyup(function () {
            validphone();
        });

        function validphone() {
            let phoneValue = $('#phnnum').val();
            var reg_phn = /[0-9 -()+]+$/;
            if (!reg_phn.test(phoneValue)) {
                alert("**Please Enter valid phone number");
                return false;
            }

			else if (phoneValue.length > 10)  {
                alert("**phone number must be lengh of 10");
                return false;
            }
            else {
            }
        }



		//password validation
		$('#password').keyup(function () {
            valipassword();
        });

        function valipassword() {
            let passwordvalue = $('#password').val();
            var reg_pass = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
            if (reg_pass.test(passwordvalue)) {
				return true;
			}
				else {
					return false;
            }
                
            
        }
    </script>
</body>

</html>