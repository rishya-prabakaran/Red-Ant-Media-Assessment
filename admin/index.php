<?php

 $conn = mysqli_connect("remotemysql.com", "nAv0yUO8Ak", "nbxIxgQVBI", "nAv0yUO8Ak");
          
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }

if($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		if(isset($_POST['submit'])) {
			
			$user = $_POST['username'];
			$pass = $_POST['password'];
			
			if($user != "" && $pass != "") {
				
				$verify = $conn->query("SELECT * FROM admin WHERE username='$user' AND password='$pass' LIMIT 1");
				
				if($verify->num_rows) {
					
					$row = $verify->fetch_assoc();
					
					//$_SESSION['user'] = $row['username'];
                    header("location: display.php");
					
					//echo "LOGGED IN";
					
				}else{
					
					echo "<script>alert('Invalid login credentials. Please try again')</script>";
					
				}
				
			}else{
				
				echo "<script>alert('Some fields are empty. All fields required!')</script>";
				
			}
			
		}
		
	}
	
?>

<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Gate Register</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


   
	
</head>
<body>

<div class="login_wrapper">
	
	<div class="login_holder">
			
		<form method="post" action="index.php">
			
			<div class="header">
				<h4 style="border-bottom: 1px solid #334FFF;" class="title">Login Form</h4>
			</div>
			
			<div class="form-group" method="post" action="#">
				<label>Username</label>
				<input type="text" name="username" class="form-control" placeholder="Enter Username" autofocus>
			</div>
			
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" class="form-control" placeholder="Enter your password">
			</div>
			
			<!--<p><a style="color: #FF5722;" href="register.php">No account yet! Click Here to register</a></p>-->
			
			<input type="submit" name="submit" value="Login" class="btn btn-info btn-fill pull-right" style="background: #334FFF; border-color: #334FFF;" />
			<div class="clearfix"></div>
			
		</form>
		
	</div>
	
</div>

</body>

</html>
