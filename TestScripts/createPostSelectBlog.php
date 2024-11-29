<?php if($_SESSION["Logged_In"] == false) {
    echo "<a style='Color:Red; font-size:200%;'>Please create an account or log in to make posts.</a>";
    include "LogIn.php";
    exit();
}?>
<h1> Which Blog are we making this post in? </h1>
<?php
include "connectDB.php";
$CatID = $_GET["catID"];
if ($CatID == 1 && $_SESSION["Role"]!= "Owner"){
    echo "<a style='Color:Red; font-size:200%;'>Invalid permissions.</a>";
    exit();
}
$blogGrab = "SELECT * FROM blogs WHERE CatID = " . $CatID;
$blogs = $conn->query($blogGrab);
echo "<section id='blogsBlock'>";
if ($blogs->num_rows>0){
    while ($row = $blogs->fetch_assoc()){
        echo"<section class ='card'>";
        $blogID = $row['blogID'];
        $href = "index.php?file_path=TestScripts\createPost.php&blogID=" . urlencode($blogID);
        echo "<h2 id ='title'><strong><a href = " . $href . ">" . $row['title'] . "</h2></strong></a>";
        echo "<p id = 'desc'>" . $row['description'] . "</p>";
        echo"</section>";
    }
}echo"</section>";