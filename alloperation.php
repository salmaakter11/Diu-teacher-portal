<?php
$servername="localhost";
$username="root";
$password="";
$dbname="login_sample_db";
$link=mysqli_connect($servername,$username,$password,$dbname);
$con=mysqli_select_db($link,$dbname);

if($con)
{
    echo "Connection ok";
}
else
{
    die("connection failed because".mysql_connect_error());
}
?>
<html>
<head><title>Student form</title></head>
<body>
<form name="form1" action = "" method="post">
<table>
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
<input type ="submit" name="submit1" value="insert">
<input type ="submit" name="submit2" value="delete">
<input type ="submit" name="submit3" value="update">
<input type ="submit" name="submit4" value="display">
<input type ="submit" name="submit5" value="search">
</td>
</tr>
</table>
</form>
</body>
</html>
<?php
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

}

if(isset($_POST["submit4"]))
{
$res=mysqli_query($link,"select * from info");


echo "<table border=1>";
            
            echo"<tr>";
            echo"<th>"; echo"Student ID";  echo"</th>";
                
             echo"<th>"; echo"Student Name";  echo"</th>";
                 
                  echo"<th>"; echo"CGPA";  echo"</th>";
                  
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
$res=mysqli_query($link,"select * from info where studen_id='$_POST[studen_id]' ");

echo"<table border=1>";
            
         echo"<tr>";
            echo"<th>"; echo"Student ID";  echo"</th>";
                
             echo"<th>"; echo"Student Name";  echo"</th>";
                 
                  echo"<th>"; echo"CGPA";  echo"</th>";
                  
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