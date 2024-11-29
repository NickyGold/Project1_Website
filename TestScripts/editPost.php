<?php
include "TestScripts\connectDB.php";
$postID = $_GET["postID"];
if($postID == NULL){
    echo "<a style='Color:Red; font-size:200%;'>Post ID not Found</a>";
    exit();
}
$SQL = "SELECT * FROM posts WHERE PostID = ?";
$arg = $conn->prepare($SQL);
$arg->bind_param("i",$postID);
$arg->execute();
$post = $arg->get_result();
if ($post->num_rows>0){
    $post = $post->fetch_assoc();
}else{echo "<a style='Color:Red; font-size:200%;'>Post not found</a>";
    exit();}
$blogID = $post["BlogID"];
$SQL = "SELECT * FROM blogs WHERE BlogID = ?";
$arg = $conn->prepare($SQL);
$arg->bind_param("i",$blogID);
$arg->execute();
$blog = $arg->get_result();
if ($blog->num_rows>0){
    $blog = $blog->fetch_assoc();}
if (($blog["CatID"] == 1 && $_SESSION["Role"] == "Owner") || ($post["UserID"] == $_SESSION["UserID"])){
}else{
    echo "<a style='Color:Red; font-size:200%;'>Invalid Permissions</a>";
    exit();
}
 ?>
<form id = "pageLayout" action = "index.php?file_path=TestScripts\editPostHandle.php" method="post">
    <input type="hidden" name ="postID" value = <?php echo $postID;?>>
    <textarea id = "postTitle" name="postTitle" style = "text-align:center">
<?php echo $post["title"];?></textarea>
    <div id = "greyBackground">
    <section id = "postGrid">
        <textarea id = "postContent" name="postContent" style = "text-align:center;"><?php echo $post["postHTML"]; ?></textarea>
        <input type="Submit" id = "confirmEditButton" value = "Confirm" style = "background-color:#B3BFC0">
    </section>
    </div>
</form>