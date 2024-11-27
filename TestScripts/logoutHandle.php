<?php
$_SESSION["Logged_In"] = false;
$_SESSION["Name"] = NULL;
$_SESSION["UserID"] = NULL;
header("Location: index.php?file_path=TestScripts/home.php");
die();