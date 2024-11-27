<?php if($_SESSION["Logged_In"] == false) {
    echo "<a style='Color:Red; font-size:200%;'>Please create an account or log in to make posts.</a>";
    include "LogIn.php";
    exit();
}?>
<h1> Which Category are we making this post in? </h1>
<?php
include "connectdb.php";
$catgrab = "SELECT * FROM Categories";
$cats = $conn->query($catgrab);
echo "<section id='HomeCat_Block'>";
if ($cats->num_rows >0){
    while ($row = $cats->fetch_assoc()){
        if ($row["CatID"] == 1 && $_SESSION["Role"] != "Owner"){
            }else{
        echo'<section class="card">';
        $CatID = $row['CatID'];
        echo "<h2 id='title'><strong><a href = 'index.php?file_path=TestScripts\createPostSelectBlog.php&catID=" . urlencode($CatID) . "'>" . $row['CatName'] . "</h2></strong></a>";
        echo "<p id='desc'>" . $row['CatDesc'] . "</p>";
        echo"</section>";}
    }
}
echo "</section>";