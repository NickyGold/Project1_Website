<?php

include 'connectdb.php';
$BlogID = $_GET["blogID"];
$postsgrab = "SELECT * FROM posts WHERE BlogID = " . $BlogID;
echo $postsgrab;
$posts = $conn->query($postsgrab);
echo "<section id='PostsBlock'>";
if($posts->num_rows>0){
    while($row = $posts->fetch_assoc()){
        echo "<section class='card'>";
        $postID = $row['PostID'];
        $href = "index.php?file_path=blogpost_view.php&blogID=" . urlencode($BlogID) . "&postID=" . urlencode($postID);
        echo "<h2 id='title'><strong><a href = " . $href . ">" . $row['title'] . "</h2></strong></a>";
        $userGrab = "SELECT * FROM users WHERE UserID = " . $row['UserID'];
        $userGrab = $conn->query($userGrab);
        $user = $userGrab->fetch_assoc();
        echo "<p id = 'desc'>" . $user['Name'] . "</p>";
        echo "</section>";
    }
}
echo "</section>";