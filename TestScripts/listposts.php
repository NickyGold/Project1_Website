<?php
include 'connectdb.php';

$SQL = "SELECT PostID, Title, Description FROM posts";

$result = $conn->query($SQL);

echo '<style>
section{
background-color:light-blue;
display:block;
}
</style>';

if($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<section class="postcard">';
        echo '<p><a href="retrieve_posts.php?id=' . $row['PostID'] . '">' . $row['Title'] . '</a>:<br>';
        echo $row['Description'] . "</>";
        echo "</section>";
    }
} else {
    echo "Sorry 0 Results Returned";
}