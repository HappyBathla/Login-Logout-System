<?php 
require "config.php";
if(isset($_POST['submit'])){
    $usernameemail = $_POST['usernameemail'];
    $password = $_POST['password'];
    $result = mysqli_query($conn,"SELECT * FROM `tbdata` WHERE username='$usernameemail' OR email ='$usernameemail'");
    if($result){
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            if($password == $row['password']){
                session_start(); // Start the session
                $_SESSION['login'] = true;
                $_SESSION['id'] = $row['id'];
                header("Location: index.php");
                exit; // Ensure script stops after redirection
            }else{
                echo "<script>alert('Wrong Password');</script>";
            }
        }else{
            echo "<script>alert('User not found');</script>";
        }
    }else{
        echo "<script>alert('Query Error');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h2>Login Form</h2>
    <form action="" method="POST" autocomplete="off">
        <label for="usernameemail">Username or Email : </label>
        <input type="text" name="usernameemail" id="usernameemail" required><br>
        <label for="password">Password : </label>
        <input type="password" name="password" id="password" required><br>
        <button type="submit" name="submit">Login</button>
    </form>
    <br><br>
    <a href="registeration.php">Register</a>
</body>

</html>
