<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
        
       

?>



<!DOCTYPE html>
<html>
<head>
<title>Student Information Database</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="file/style.css" rel="stylesheet" type="text/css" media="all" />

<link rel="icon" type="image/png" href="images/favicon.ico"/>

<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">

</head>
<body>
	
        
       
	<div class="main-w3layouts wrapper">
		<h1>Create Sign Up Form</h1>
		<div class="main-agileinfo">
		
                    <form name="form1" action = "" method="post">
<table style="border-color: red" borde="2">
<tr>
<td>Student ID</td>
<td><input type="text" name ="studen_id"></td>
</tr>
<tr>
<td>Student Name</td>
<td><input type="text" name ="student_name"></td>
</tr>
<tr>
<td>Student CGPA</td>
<td><input type="text" name ="cgpa"></td>
</tr>
<tr>
<td>Email</td>
<td><input type="email" name ="email"></td>
</tr>
<tr>
<td colspan = "2" align="center">
<input type ="submit" name="submit1" value="Insert">
<input type ="submit" name="submit2" value="Delete">
<input type ="submit" name="submit3" value="Update">
<input type ="submit" name="submit4" value="Display">
<input type ="submit" name="submit5" value="Search">
</td>
</tr>
<?php

$link=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
$con=mysqli_select_db($link,$dbname);
if(isset($_POST["submit1"]))
{
    mysqli_query($link,"insert into info values('$_POST[studen_id]','$_POST[student_name]','$_POST[cgpa]','$_POST[email]')");
echo "Record inserted successfully";}

if (isset($_POST["submit2"]))
{
    mysqli_query($link,"delete from info where studen_id='$_POST[studen_id]'");
echo "Record deleted successfully";
}
if(isset($_POST["submit3"]))
{
mysqli_query($link,"update info set cgpa='$_POST[cgpa]' where studen_id='$_POST[studen_id]' ");
 echo "Record Updated successfully";
}

if(isset($_POST["submit4"]))
{
$res=mysqli_query($link,"select * from info");

echo "Record Displayed successfully";


echo "<table border=1>";
            
            echo"<tr>";
            echo"<th>"; echo"Student ID"; echo '&nbsp'; echo '&nbsp'; echo '&nbsp'; echo '&nbsp';echo '&nbsp'; echo"</th>";
                
             echo"<th>"; echo"Student Name"; echo '&nbsp'; echo '&nbsp'; echo '&nbsp'; echo '&nbsp';echo '&nbsp'; echo"</th>";
                 
                  echo"<th>"; echo"CGPA"; echo '&nbsp'; echo '&nbsp';echo '&nbsp'; echo '&nbsp';echo '&nbsp'; echo"</th>";
                  
                   echo"<th>"; echo"Email";  echo"</th>";
                      
                 echo"</tr>";
                 
                 while($row=mysqli_fetch_array($res))
                 
                 {
                 echo"<tr>";
            echo"<td>"; echo $row["studen_id"];  echo"</td>";
                
             echo"<td>"; echo $row["student_name"];  echo"</td>";
                 
                  echo"<td>"; echo $row["cgpa"];  echo"</td>";
                   echo"<td>"; echo $row["email"];  echo"</td>";
                      
                 echo"</tr>";
                 }
                 
                 echo "</table>";
    

}


if(isset($_POST["submit5"]))
{
$res=mysqli_query($link,"select * from info where student_name='$_POST[student_name]' ");

echo "Record Searched successfully";

echo"<table border=1>";
            
         echo"<tr>";
            echo"<th>"; echo"Student ID";echo '&nbsp';echo '&nbsp';echo '&nbsp'; echo '&nbsp';echo '&nbsp'; echo"</th>";
                
             echo"<th>"; echo"Student Name";echo '&nbsp';echo '&nbsp';echo '&nbsp'; echo '&nbsp';echo '&nbsp'; echo"</th>";
                 
                  echo"<th>"; echo"CGPA"; echo '&nbsp';echo '&nbsp';echo '&nbsp';echo '&nbsp';echo '&nbsp'; echo"</th>";
                  
                   echo"<th>"; echo"Email";  echo"</th>";
                      
                 echo"</tr>";
                 
                 while($row=mysqli_fetch_array($res))
                 
                 {
                 echo"<tr>";
            echo"<td>"; echo $row["studen_id"];  echo"</td>";
                
             echo"<td>"; echo $row["student_name"];  echo"</td>";
                 
                  echo"<td>"; echo $row["cgpa"];  echo"</td>";
                  
                   echo"<td>"; echo $row["email"];  echo"</td>";
                      
                 echo"</tr>";
                 }
                 
                 echo "</table>";
    

}


?>
</table>
                    </form>           <br>           
                    <div align="center">   
                    	<a href="logout.php">Log Out</a>
	

	<br>
	Hello, <?php echo $user_data['user_name']; ?>
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
	
</body>
</html>

