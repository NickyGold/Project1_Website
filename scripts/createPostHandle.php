<?php
include "connectdb.php";
$postTitle = htmlentities($_POST["postTitle"]);
$postContent = htmlentities($_POST["postContent"]);
$blogID = $_POST["blogID"];
$userID= $_SESSION["UserID"];
if($postTitle == NULL || $postContent == NULL){
    header("Location: index.php?file_path=scripts\createPost.php&blogID=" . $blogID);
    die();
}
$SQL = "INSERT INTO posts (BlogID,title,UserID,postHTML) VALUES (?,?,?,?)";
$arg = $conn->prepare($SQL);
$arg->bind_param("isis",$blogID,$postTitle,$userID,$postContent);
$arg->execute();
header("Location: index.php?file_path=scripts\blogpost_retrieve_test.php&blogID=" . $blogID);
die();