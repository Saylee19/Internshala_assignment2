<?php 
session_start();

	include("connection.php");
	include("functions.php");

	global $msg;
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$phn_number = $_POST['phn_number'];
		$user_email = $_POST['user_email'];
		$password = $_POST['password'];
		$cpassword = $_POST['cpassword'];


		if(!empty($user_name) && !empty($phn_number) && !empty($user_email) && !empty($password) && !empty($cpassword) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,phn_number,user_email,password,cpassword) values ('$user_id','$user_name','$phn_number','$user_email','$password','$cpassword')";

			mysqli_query($con, $query);

            if ($_POST['password'] !== $_POST['cpassword']) {
				echo " Password and Confirm password should match!" ; 
			 }

			else{
				header("Location: login.php");
				die;
			}
		}else
		{
			echo "Please enter some valid information!";
		}

		
	}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<title>Signup</title>
</head>
<body>

<style type="text/css">
	html {
    height: 100%;
    }
    body {
    height: 100%;
    margin: 0;
    background-repeat: no-repeat;
    background-attachment: fixed;
	
    } 
	
	.head{
		padding: 30px;
		margin: auto;
		text-align: center;
	}
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}


	#box{
		/* border: 2px solid black; */
		border-radius: 25px 0 25px 0;
		margin: auto;
		width: 400px;
		padding: 20px;
		background: rgb(2,0,36);
        background: linear-gradient(180deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
		color: white;
	}

	</style> 

<div class="head"><h3>Login & SignUp Form</h3></div>
<div id="box">		
<form method="post">

  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="user_name" class="form-control" id="name" placeholder="Enter name">
  </div>
  <div class="form-group">
    <label for="phone">Phone Number</label>
    <input type="tel" name="phn_number" pattern="[7-9]{2}[0-9]{8}" class="form-control" id="phone" title="Give valid phone number" required placeholder="Enter phone number">
  </div>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" name="user_email" class="form-control" id="email" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="Password">Password</label>
    <input type="password" name="password" pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{10,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required class="form-control" id="Password" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="cpassword">Confirm Password</label>
    <input type="password" name="cpassword"  required class="form-control" id="cpassword" placeholder="Confirm Password">
  </div>
  
  <button type="submit" class="btn btn-danger">Submit</button><br><br>
  <p>Already Registered?<a href="login.php" style="color:black;"> Click here to login</a></p><br><br>
</form>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>