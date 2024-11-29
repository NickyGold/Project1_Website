<?php
include "connectdb.php";
$catgrab = "SELECT * FROM Categories";
$cats = $conn->query($catgrab);
echo "<section id='HomeCat_Block'>";
if ($cats->num_rows >0){
    while ($row = $cats->fetch_assoc()){
        echo'<section class="card">';
        $CatID = $row['CatID'];
        echo "<h2 id='title'><strong><a href = 'index.php?file_path=scripts\blogs_retrieve_test.php&catID=" . urlencode($CatID) . "'>" . $row['CatName'] . "</h2></strong></a>";
        echo "<p id='desc'>" . $row['CatDesc'] . "</p>";
        echo"</section>";
    }
}
echo "</section>";
