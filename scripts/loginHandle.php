<?php
include "connectDB.php";
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "SELECT * FROM users WHERE Username = ?";
if ($username == NULL){echo "<a style='Color:Red; font-size:200%;'>Please Enter a Username</a>";
include "scripts/LogIn.php";
exit();}
$arg = $conn->prepare($sql);
$arg->bind_param("s",$username);
$arg->execute();
$arg = $arg->get_result();
if ($arg->num_rows >0){
    if ($password == NULL){echo "<a style='Color:Red; font-size:200%;'>Please Enter a Password</a>";
        include "scripts/LogIn.php";
        exit();}
    $user = $arg->fetch_assoc();
    if (password_verify($password,$user["Password"]) == true){
        echo "Access granted";
        $_SESSION["Logged_In"] = true;
        $_SESSION["Name"] = $user["Name"];
        $_SESSION["UserID"] = $user["UserID"];
        $_SESSION["Role"] = $user["role"];
        header("Location: index.php?file_path=scripts/home.php");
        die();
    }
    else {echo "Invalid Username or Password";
    include "scripts/LogIn.php";
    exit();}
}else{echo "<a style='Color:Red; font-size:200%;'>Invalid Username or Password</a> <br>";
include "scripts/LogIn.php";}