<?php
include "connectdb.php";
$postTitle = htmlentities($_POST["postTitle"]);
$postContent = htmlentities($_POST["postContent"]);
$postID = $_POST["postID"];
$userID= $_SESSION["UserID"];
if($postTitle == NULL || $postContent == NULL){
    header("Location: index.php?file_path=scripts\createPost.php&blogID=" . $blogID);
    die();
}
$SQL = "UPDATE posts SET title = ?, postHTML = ? WHERE PostID = ?";
$arg = $conn->prepare($SQL);
$arg->bind_param("ssi",$postTitle,$postContent,$postID);
$arg->execute();
header("Location: index.php?file_path=scripts\blogpost_view.php&postID=" . $postID);
die();