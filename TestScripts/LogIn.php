<?php
if($_SESSION["Logged_In"] == true) {
    header("Location: index.php?file_path=TestScripts/home.php");
    die();
}?>
<form id = "LoginForm" action="index.php?file_path=TestScripts/loginHandle.php" method="post">
    <label for="username-inp"> Username: </label>
    <input type="text" id = "username-inp" name="username"><br>
    <label for="password-inp"> Password: </label>
    <input type="text" id = "password-inp" name="password"><br>
    <input type="submit" value="Submit">
    <p id = "RegisterCTA">Don't have an account? <br><a href = "index.php?file_path=TestScripts/Registrationform.php"> Register Here! </a></p>
</form>