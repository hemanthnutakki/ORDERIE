<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- style sheets -->
    <link rel="stylesheet" href="home1.css">
    <link rel="stylesheet" href="Normalise.css">
    <link rel="stylesheet" href="signup2.css">
    <title>Sign Up</title>
</head>
<body>

<?php

error_reporting(0);

$nameerror=$passworderror=$emailerror=$mobileerror="";
if($_SERVER['REQUEST_METHOD']=="POST"){

if(empty($_POST["name"])){
    $nameerror ="Name Must be required ";
}
else{
    $name=$_POST['name'];
}
if(empty($_POST['email'])){
    $emailerror="Emial must be enter ";
}
else{
    $email=$_POST['email'];
}
if(empty($_POST['rollno'])){
    $mobileerror="Mobile Number Must be INserted ";
}
else{
$mobileno=$_POST['rollno'];
}
if (empty($_POST['password'])) {
$passworderror="password mUST BE eNTERED ";
}
else {
    $password=$_POST['password'];
}
}
if(!empty($_POST['password']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['rollno'])){

$connection =new mysqli("localhost","root","","miniproject");


if($connection->connect_error){
    die("Error Occured In connection ");
}

else{

$sql="INSERT INTO signup(name,rollno,email,password) VALUES ('$name','$mobileno','$email','$password')";

$verify=$connection->query("SELECT * FROM signup WHERE   rollno='$mobileno' or email='$email' " );


if($verify->num_rows>=1){
    echo '<script> window.alert(" ❗❗ Already Exist please login ")</script>';
}

else{


if($res=$connection->query($sql)){


echo ' <script> window.alert("Signup sucessful . You can login 😃 ")</script>';
header('location:http://localhost/Canteen-Management-System-master/index1.html');


}
else{
    echo '<script> window.alert(" ❌  Some thing went wrong ")</script>';
    }
}
}

$connection->close();
}



?> 

    
    <section id ="login_total" >
        <div id="login" >
            <div>
                <img src="https://images.pexels.com/photos/541216/pexels-photo-541216.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="login_interface" id="login_bg">
    
            </div>
            <div id="login_main" >
 
                        <!-- <h1 id="log_h1"style="font-size: 2em;">Log In</h1>
                        <label class="headings_form">Email</label>
                        <input type="email" name="email" class="inputs" placeholder="">
                        <br>
                        <label class="headings_form">Password</label>
                        <input type="password"vclass="inputs" name="password" placeholder=""> -->

                        
                        <h1 >Sign Up</h1>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id ="login_form" method="POST">

                                    <span class="error"><?php echo $nameerror ?> </span><br>
                                    <strong><label for="name"> Name <sup><span class="warning">*</span> </sup> : <input type="text" name='name'  id='name' placeholder="name" ></label> </strong>
                                    <br>
                                    <span class="error"><?php echo $emailerror ?> </span><br>
                                    <strong><label for="email"> Email <sup><span class="warning">*</span></sup> : <input type="email" name='email' id="email" placeholder="email"></label></strong>
                                    <br>
                                    <span class="error"><?php echo $rollnoerror ?> </span><br>
                                    <strong><label for="mobileno">ROLL NO <sup><span class="warning">* </span></sup>: <input type="number" name="rollno" id='rollno'  placeholder="160120737061" > </label></strong>
                                    <br>
                                    <span class="error"><?php echo $passworderror ?> </span><br>
                                    <strong><label for="password"> Password <span class="warning">* </span> : <input type="password" name="password" id='password'></label> </strong>
                                   
                                    <br>
                                    <button id="signin"> 
                                    <a href="http://localhost/Canteen-Management-System-master/login.php"> 
                                        signin 
                                    </a>
                                    </button>
                        

                                    <br>
       
                            <input style="text-align: center;"  type="submit" name="submit" value="SignUp">
                      
                        </form>
                        
            </div>
        </div>
       
    </section>



</body>
</html>  