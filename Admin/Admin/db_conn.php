<?

$host="localhost";      
$username="id2472106_sonaln"; 
$password="Password@sn01"; 
$db_name="id2472106_sonaldb"; 



global $con;
$con=mysqli_connect("$host", "$username", "$password")or die("cannot connect"); 

mysqli_select_db($con, "$db_name") or die(mysqli_error($con));


	
?>