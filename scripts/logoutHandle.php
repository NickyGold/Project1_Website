<?php
$_SESSION["Logged_In"] = false;
$_SESSION["Name"] = NULL;
$_SESSION["UserID"] = NULL;
$_SESSION["Role"] = NULL;
header("Location: index.php?file_path=scripts/home.php");
die();