<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Save</title>
</head>
<body>

<?php 

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$date=date('y-m-d',strtotime($_POST['date']));
//$aadhar=$_POST['aadhar'];
$address=$_POST['address'];
$email=$_POST['email'];
$number=$_POST['number'];
$alnumber=$_POST['alnumber'];
$servername="localhost";
$username="root";
$dbname="miniproject";

$conn=new mysqli($servername,$username,"",$dbname);

if($conn->connect_error) {

	die("No connection to data base "); 
}

$sql="INSERT INTO registration(fname,lname,date,address,email,number,alnumber) VALUES ('$fname','$lname','$date','$address','$email','$number','$alnumber') ";


$queryrun=mysqli_query($conn,$sql);

if($queryrun){ 
echo "Sucessfull ";

}
else{
	 echo "Failed ";
}

$conn->close();

?>
</body>
</html>