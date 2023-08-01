<?php 
session_start();


	include("connection.php");
	include("functions.php");
        
             if (isset($_POST['signup'])){
            
        $user_name = $_POST['user_name'];
	$password = $_POST['password'];
        $dbname="login_sample_db";
        
        $query= mysqli_query($con, "SELECT * FROM users WHERE user_name='$user_name'") ;
        
        
        if(mysqli_num_rows($query)>0){
            echo "!!This User Account Already Available-Try New Name!!";
        }
 

      
	/*else if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
                
                
       
   
        }*/

		else if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
                    echo "Please enter some valid information!";
			
		
		}
             }  

        
?>


<!DOCTYPE html>
<html>
<head>
<title>Sign Up</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="file/style.css" rel="stylesheet" type="text/css" media="all" />

<link rel="icon" type="image/png" href="images/favicon.ico"/>
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
</head>
<body>

        
        <style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: burlywood;
		border: none;
	}

	#box{

		background-color: #4C787E;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>
	<div class="main-w3layouts wrapper">
            <h1><b>Teacher Sign Up Form</b></h1>
		<div class="main-agileinfo">
			<div id="box">
		
		<form method="post">
                    <div style="font-size: 20px;margin: 10px;color: white;"><b>Sign Up</b></div>

                        <input id="text" type="text" name="user_name" placeholder="Enter Username..." ><p class="text-danger">  <br><br>
                        <div ><input id="password" type="password" name="password" placeholder="Enter Password..."> <br><br> <input type="checkbox" id="checkbox"> Show Password </div><p class="text-danger">  <br>
                            
                            
                        <input id="button" type="submit" value="Sign Up" name="signup"><br><br>

                        <b><a href="login.php">Click To Login</a></b><br><br>
		</form>
	</div>
		</div>
		
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
        
        <script src="js/jquery-3.6.0.js"></script>
        <script src="js/j1.js"></script>

	<!-- //main -->
</body>
</html>
