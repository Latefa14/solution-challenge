<?php
$host='localhost';
$db='helpdb';
$user='root';
$password='';
if (isset($_POST['submit'])) {
    $conn = new mysqli($host,$user,$password,$db);
    $username = $_POST['fristname'];  
    $password = $_POST['password'];  
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($conn, $username);  
        $password = mysqli_real_escape_string($conn, $password);  
        $sql = "select *from user where user_email = '$username' and user_password = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result); 
        echo $count; 
        if($count >= 1){  
            header("location: index.html");
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        }    
    }
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min1.css">
    <link rel="stylesheet" href="css/style-login.css">
    <title>Document</title>
</head>

<body>
    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <h3>Welcome To Sustain Market</h3>
                <p>You are 30 seconds away from winning another life!</p>
            </div>
            <div class="col-md-9 register-right">

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Login now</h3>
                        <form action="" method="post">
                            <div class="row register-form">
                                <div class="col-md-6" action="" method="post">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email *" value=""
                                            name="fristname" />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password *" value=""
                                            name="password" />
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="submit" class="btnRegister" value="Login" />
                                    </div>



                                </div>

                                <!-- <div class="col-md-6">
                                <input type="submit" class="btnRegister"  value="Login"/>
                            </div> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>