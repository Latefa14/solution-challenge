<?php
$host='localhost';
$db='helpdb';
$user='root';
$password='';
$conn = new mysqli($host,$user,$password,$db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['submit'])) {
          // Escape user inputs for security
        $first_name = mysqli_real_escape_string($conn, $_POST['fristname']);
        $last_name = mysqli_real_escape_string($conn, $_POST['lastname']);
        $pass = mysqli_real_escape_string($conn, $_POST['password']);
        $re_pass = mysqli_real_escape_string($conn, $_POST['repassword']);
        $type = mysqli_real_escape_string($conn, $_POST['type']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['txtEmpPhone']);
        $state = mysqli_real_escape_string($conn, $_POST['state']);
          // Insert the data into the database
        $sql="INSERT INTO `user` (`user_password`, `user_phone`, `user_age`, `user_email`, `user_state_type`, `user_id`, `user_first_name`, `user_last_name`, `user_state`) VALUES ('$pass', '$phone', '18', '$email', '1', 'NULL', '$first_name', '$last_name', 0)";
        mysqli_query($conn, $sql);
        header("location: index.html");
        exit();
}
?>
