<?php
include "connectDB.php";
$CatID = $_GET["catID"];
$blogGrab = "SELECT * FROM blogs WHERE CatID = " . $CatID;
echo $blogGrab;
$blogs = $conn->query($blogGrab);
echo "<section id='blogsBlock'>";
if ($blogs->num_rows>0){
    while ($row = $blogs->fetch_assoc()){
        echo"<section class ='card'>";
        $blogID = $row['blogID'];
        $href = "index.php?file_path=TestScripts\blogpost_retrieve_test.php&blogID=" . urlencode($blogID);
        echo "<h2 id ='title'><strong><a href = " . $href . ">" . $row['title'] . "</h2></strong></a>";
        echo "<p id = 'desc'>" . $row['description'] . "</p>";
        echo"</section>";
    }
}echo"</section>";