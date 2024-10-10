<?php

include 'connectdb.php';

$postsgrab = "SELECT * FROM posts";
$posts = $conn->query($postsgrab);
echo '<style>
img{
    height:200px;
    width:400px;
    object-fit:cover;
    display:block;
}
</style>';

if ($posts->num_rows > 0) {
    while ($row = $posts->fetch_assoc()){
        echo '<section class="card">';
        echo "<h2>" . $row['title'] . "</h2>";
        echo "<p>" . $row['postHTML'] . "</p>";
        $usergrab = "SELECT * FROM users WHERE UserID = " ."$row[UserID]";
        $userresult = $conn->query($usergrab);
        $userresult = $userresult->fetch_assoc();
        echo "<b>" . "This post was made by " . $userresult['Name'] . "</b>";
        echo "</section>";
    }
} else {
    echo "Sorry 0 Results Returned";
}