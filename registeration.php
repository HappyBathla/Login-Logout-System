<?php
require "config.php";
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $duplicate = mysqli_query($conn, "SELECT * FROM `tbdata` WHERE username='$username' OR email = '$email'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script> alert('Username or Email already exist');</script>";
    } else {
        if ($password == $confirmpassword) {
            $query = "INSERT INTO `tbdata`(`name`, `username`, `email`, `password`) VALUES ('$name','$username','$email','$password')";
            mysqli_query($conn,$query);
            echo "<script> alert('Registration Successfull.');</script>";
        }else{
            echo "<script> alert('Password Does not match.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>

<body>
    <h2>Registration Form</h2>
    <form action="" method="POST" autocomplete="off">
        <label for="name">Name : </label>
        <input type="text" name="name" id="name" required><br>
        <label for="username">Username : </label>
        <input type="text" name="username" id="username" required><br>
        <label for="email">Email : </label>
        <input type="email" name="email" id="email" required><br>
        <label for="password">Password : </label>
        <input type="password" name="password" id="password" required><br>
        <label for="confirmpassword">Confirn Password : </label>
        <input type="password" name="confirmpassword" id="confirmpassword" required><br>
        <button type="submit" name="submit">Register</button>
    </form>
    <br><br>
    <a href="login.php">Login</a>
</body>

</html>