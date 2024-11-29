<?php
include "connectdb.php";
$postID = $_POST["postID"];
$blogID = $_POST["blogID"];
$SQL = "DELETE FROM posts WHERE PostID = ?";
$arg = $conn->prepare($SQL);
$arg->bind_param("i",$postID);
$arg->execute();
$location = "index.php?file_path=scripts\blogpost_retrieve_test.php&blogID=" . urlencode($blogID);
header("Location:".$location);