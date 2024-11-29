<?php
include "connectdb.php";
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
<form action = "index.php?file_path=scripts/deleteHandle.php" id = "confirmation"  method="post">
    <input type="hidden" name ="postID" value = <?php echo $postID;?>>
    <input type="hidden" name ="blogID" value = <?php echo $blogID;?>>
    <div id = "question">Are you sure you want to delete this post?</div>
    <input id = "yes" type="submit" value = "Yes">
    <div id = "no"><div style="position:absolute;"> No </div> <a href="index.php?file_path=scripts/blogpost_view.php&postID=<?php echo$postID?>"></a></div>
</form>