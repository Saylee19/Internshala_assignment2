<?php
session_start();

include_once('connection.php');

if(isset($_SESSION['user_id']))
	{
		$id = $_SESSION['user_id'];
		$query = "select * from users where user_id = '$id' ";
	}

$result=mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title>My Website</title>
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
	
    .icon{
        text-align : center;
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
        text-align: center;
	}

	</style>

<div class="head"><h3>Index Page</h3></div>
<div id="box">

<p class="icon"><i class='fas fa-user-alt' style='font-size:48px;color:white;'></i></p>
<h3>User Details</h3>
<?php 
 $rows=mysqli_fetch_assoc($result)
?>
Name : <?php echo $rows['user_name']; ?> <br>
Phone Number : <?php echo $rows['phn_number']; ?> <br>
Email : <?php echo $rows['user_email']; ?><br><br>

<button><a href="sign_out.php">Logout</a></button>


</div>
</body>
</html>