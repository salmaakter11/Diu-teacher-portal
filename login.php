<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
	
	  $user_name = $_POST['user_name'];
             $password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			$alert = "<script>alert('wrong username or password!');</script>";
			echo $alert;
		}else
		{
			$alert = "<script>alert('wrong username or password!');</script>";
			echo $alert;
		}
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Teacher Portal</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="icon" type="image/png" href="images/favicon.ico"/>

	<link rel="stylesheet" type="text/css" href="file/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="file/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="file/animate.css">

	<link rel="stylesheet" type="text/css" href="file/hamburgers.min.css">

	<link rel="stylesheet" type="text/css" href="fileselect2.min.css">

	<link rel="stylesheet" type="text/css" href="file/util.css">
	<link rel="stylesheet" type="text/css" href="file/main.css">

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
		background-color: lightblue;
		border: none;
	}
        
 
        

	#box{

		background-color: #f9c74f;
		margin: auto;
		width: 300px;
		padding: 20px;
                
                
	}
        
        .footer-left{
            margin: auto;
            text-align: center;
        }

	</style>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

					<div id="box">
		<span class="login100-form-title">
                    <b style="color : #7D0552">Teacher Portal</b>
					</span>
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Login</div>

                        <input id="text" type="text" name="user_name" placeholder="Enter Username"><br><br>
                        <div ><input size="28" id="password" type="password" name="password" placeholder="Enter Password">  <br><br>  <input type="checkbox" id="checkbox"> Show Password </div><br>

                        <div class="parent2"><input id="button" type="submit" value="Login"></div><br>
                        <p>Don't Have any account?</p>

                        <div class="parent" id="button" style="text-align: center"><a href="signup.php">Sign Up</a></div><br><br>
		</form>
                                            
                                                      
                                            
	</div>
                            
                            <footer class="footer-distributed">

        <div class="footer-left" >

            <h3>Daffodil Teacher Portal<span></span></h3>

      

            <p>Copyright © 2022 Daffodil International University. All Rights Reserved.</p>
        </div>


    </footer>
			</div>
		</div>
	</div>
	
	
<script src="js/jquery-3.6.0.js"></script>
        <script src="js/j1.js"></script>
	

	<script src="file2/jquery-3.2.1.min.js"></script>

	<script src="file2/popper.js"></script>
	<script src="file2/bootstrap.min.js"></script>

	<script src="file2/select2.min.js"></script>

	<script src="file2/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		});
	</script>

	<script src="file2/main.js"></script>

</body>
</html>
