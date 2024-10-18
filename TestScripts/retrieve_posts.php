<?php
include 'connectdb.php';
$post_id = $_GET['id'];
$SQL = "SELECT Title,Text FROM posts WHERE PostID = '$post_id'";
$result = $conn->query($SQL);
echo '<style>
body{
width:400px;
}
img{
height:200px;
width:100%;
margin: 5px 0 5px 0 ;
object-fit:cover;
display:block;
}</style>';
if($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<section class="card">';
        echo "<h2>" . $row['Title'] . "</h2>";
        echo "<p>" . $row['Text'] . "</p>";
        echo "</section>";
    }
} else {
    echo "Sorry No Post was found. (How did this even show up?)";
}