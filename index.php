<?php 
session_start();
if(isset($_SESSION["Logged_In"]) == false){
    $_SESSION["Logged_In"] = false;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nicky's Study</title>
    <link href="styles/main.css" rel="stylesheet">
</head>
<body>
    <div class = grid>
    <div class=topbar>
    <div id = "Home">
    <a href = "index.php?file_path=TestScripts/home.php">
        <img src="images/home_icon.png" height="100%" padding ="20px"></a>
    </div>
    <div id="Name">
    <p><?php if (@$_SESSION["Name"] == NULL){
                echo "Guest";
            } else {
                echo $_SESSION["Name"];
        }?></p>
    </div>
    <div id ="Account">
        <img src="images/profile-icon-9.png" height="100%">
    </div></div>
    <div class=sidebar>
        <div class = sidebar-button style = "height:50px;">
            <div class = sidebar-button-text >
                Create Blog
            </div>
            <a href = "index.php?file_path=placeholder.html"></a>
        </div>
        <div class = sidebar-button style = "height: 50px">
            <div class = sidebar-button-text>
                Create Post
            </div><a href= "index.php?file_path=TestScripts\createPostselectCat.php"></a>
        </div>
        <div class = sidebar-button style = "height: 50px">
            <div class = sidebar-button-text>
                Search
            </div><a href= "index.php?file_path=placeholder.html"></a>
        </div> <?php if ($_SESSION["Logged_In"] == true){
        echo '<div class = sidebar-button style = "height: 50px;position:absolute;bottom:0;margin-bottom:5px;background-color:#cd3f3f">
            <div class = sidebar-button-text>
                Log Out
            </div><a href= "index.php?file_path=TestScripts/logoutconfirm.php"></a>
        </div>';}
        else {echo '<div class = sidebar-button style = "height: 50px;position:absolute;bottom:0;margin-bottom:5px;background-color:#afa">
            <div class = sidebar-button-text>
                Log In / Register
            </div><a href= "index.php?file_path=TestScripts/LogIn.php"></a>
        </div>';}?></div>
        <div class ="content">
</body>
</html>
<?php
$file_path = NULL;
if (@$_GET["file_path"] == NULL){
    $file_path = "TestScripts/home.php";
} else {
    $file_path = $_GET ["file_path"];
}
include $file_path; ?>