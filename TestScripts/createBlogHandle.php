<?php
include "connectdb.php";
$blogTitle = htmlentities($_POST["blogTitle"]);
$blogDesc = htmlentities($_POST["blogDesc"]);
$catID = $_POST["catID"];
$userID= $_SESSION["UserID"];
if($blogTitle == NULL || $blogDesc == NULL){
    header("Location: index.php?file_path=TestScripts\createBlog.php&catID=" . $catID);
    die();
}
$SQL = "INSERT INTO blogs (CatID,title,userID,description) VALUES (?,?,?,?)";
$arg = $conn->prepare($SQL);
$arg->bind_param("isis",$catID,$blogTitle,$userID,$blogDesc);
$arg->execute();
header("Location: index.php?file_path=TestScripts\blogs_retrieve_test.php&catID=" . $catID);
die();