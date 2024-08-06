<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- style sheets -->
<!--     <link rel="stylesheet" href="home1.css">
     -->
     <link rel="stylesheet" href="login_interface.css">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="Normalise.css">


    <title>Log In</title>
</head>
<body>


<?php
error_reporting(0);

    if($_SERVER['REQUEST_METHOD']=="POST"){


$connection=new mysqli("localhost","root","","miniproject"); 

if($connection->connect_error){
    die("Some thing went Wrong  ");
}
else{
        $email=$_POST['email'];
        $password=$_POST['password'];
        $sql=$connection->query("SELECT * FROM  signup WHERE email='$email' and password='$password' ");

        if($sql->num_rows <1){
              echo '<script> window.alert(" 📄 No details Found Please Signup ")</script>';
    echo '<script> window.location.href="http://localhost/Canteen-Management-System-master/signup1.php" </script>' ; 


        }
        else{
     
 echo '<script> window.alert(" You sucessfully logined ")</script>';
header('Location:http://localhost/Canteen-Management-System-master/index2.html ');

        } 



}


$connection->close();

    }


?>
    <section id ="login_total" >
        <div id="login" >
            <div>
                <img src="https://images.pexels.com/photos/704569/pexels-photo-704569.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="login_interface" id="login_bg">
    
            </div>
            <div id="login_main" >
 

                        
                        <h1 >Log In</h1>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id ="login_form" method="POST">
                            <p>Email Id</p>
                            <input type="email" name='email' placeholder="Enter your mail" required>
                            <p>Password</p>
                            <input type="password" name ='password' placeholder="Enter password" required>
                            <input style="text-align: center;"  type="submit" name="submit" value="Login">
                            <br>
                            <a href="#">Forgot password?</a>
                            <br>
                        </form>
                        
            </div>
        </div>
       
    </section>



</body>
</html>
