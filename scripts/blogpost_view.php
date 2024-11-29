<?php
include "connectDB.php";
$SQL = "SELECT * FROM posts WHERE PostID = ?";
$arg = $conn->prepare($SQL);
$postID = $_GET["postID"];
$arg->bind_param("i", $postID);
$arg->execute();
$post = $arg->get_result();
if ($post->num_rows > 0){
    $post = $post->fetch_assoc();
} else{
    echo "<a style='Color:Red; font-size:200%;'>Post not found</a>";
}
$userGrab = "SELECT * FROM users WHERE UserID = " . $post['UserID'];
$userGrab = $conn->query($userGrab);
$user = $userGrab->fetch_assoc();
?>
<section id = "pageLayout">
    <section id = "postTitle">
        <?php echo $post["title"];?>
    </section>
    <div id = "greyBackground">
    <section id = "postGrid">
        <div id = "postContent">
            <?php echo $post["postHTML"]; ?>
        </div>
        <?php if ($_SESSION["UserID"] == $post["UserID"] || $_SESSION["Role"] == "Owner" || $_SESSION["Role"] == "Admin"){echo'
        <a href="index.php?file_path=scripts/deletePost.php&postID=' . urlencode($postID) . '"id="deleteButton">
            Delete
        </a>
        <a href="index.php?file_path=scripts/editPost.php&postID=' . urlencode($postID) . '"id="editButton">
            Edit
        </a>';}?>
        <div id = "madeBy">
            Made by: <?php echo $user["Name"];?>
        </div>
    </section>
    </div>
</section>