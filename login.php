<?php

session_start();

require '../fungsi.php';

if(isset($_POST["login"]))
    {
        $username=$_POST["username"];
		$password=$_POST["password"];
		
		$result = mysqli_query ($conn,"SELECT * FROM customer WHERE username = '$username'");
		
        if (mysqli_num_rows($result)==1)
        {
            $row=mysqli_fetch_assoc($result);
            
            if ($password==$row["password"])
            {
				//set session
				$_SESSION["login"]=true;
				
				$_SESSION["username"] = $row["username"];
				$_SESSION["password"] = $row["password"];
				$_SESSION["idcus"] = $row["idcus"];
				$_SESSION["nama"] = $row["nama"];
				$_SESSION["alamat"] = $row["alamat"];
				$_SESSION["daerah"] = $row["daerah"];
				$_SESSION["kodepos"] = $row["kodepos"];
				$_SESSION["email"] = $row["email"];
				$_SESSION["notelp"] = $row["notelp"];
				
				header("location:../all.php");
			}
			else if ($password!=$row["password"])
			{
				echo "
				<script type='text/javascript'>
				alert('Password Anda Salah!');
				history.back(self);
				</script>";
			}
                
		}
		else 
		{
			echo "
				<script type='text/javascript'>
				alert('Username & Password Anda Salah!');
				history.back(self);
				</script>";
		}
    }
	$error=true;
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Halaman Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/logo.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" href="fonts/icomoon/style.css">
<!--===============================================================================================-->

	<script>
		var close = document.getElementsByClassName("closebtn");
		var i;

		for (i = 0; i < close.length; i++) 
		{
			close[i].onclick = function()
			{
				var div = this.parentElement;
				div.style.opacity = "0";
				setTimeout(function(){ div.style.display = "none"; }, 600);
			}
		}
	</script>

	<style>
		.alert {
		padding: 20px;
		background-color: #f44336;
		color: white;
		opacity: 1;
		transition: opacity 0.6s;
		margin-bottom: 15px;
		}

		.alert.success {background-color: #4CAF50;}
		.alert.info {background-color: #2196F3;}
		.alert.warning {background-color: #ff9800;}

		.closebtn {
		margin-left: 15px;
		color: white;
		font-weight: bold;
		float: right;
		font-size: 22px;
		line-height: 20px;
		cursor: pointer;
		transition: 0.3s;
		}

		.closebtn:hover {
		color: black;
		}
	</style>
</head>
<body>
	
	<div class="limiter icons">
		<div class="container-login100">
			<div class="wrap-login100 p-t-85 p-b-20">
				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title p-b-50">
						Login Customer
					</span>
					<span class="login100-form-avatar">
						<img src="images/logo.png" alt="">
					</span>

					<div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "Enter Username">
						<input class="icon-user input100" type="text" name="username" required="required" >
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter Password">
						<input class="input100" type="password" name="password" required="required">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="login" type="submit">
							Login
						</button>
					</div>

					<ul class="login-more p-t-70">

 
							<span class="txt1">
							New Morfeen's Customer ?
							</span>
							
							<button type="button" class="btn btn-info" onclick="window.location='../register.php'" class="txt2">
							Daftar Sekarang
							</button>

					</ul>
				</form>
				<div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> by Deny Pratama | All rights reserved
            </p>
          </div>
          
        </div>
			</div>	
		</div>	
	</div>
	

	
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>