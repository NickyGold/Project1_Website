<?php
include "connectDB.php";
if($_SESSION["Logged_In"] == false) {
    echo "<a style='Color:Red; font-size:200%;'>Please create an account or log in to make posts.</a>";
    include "LogIn.php";
    exit();
}
$BlogID = $_GET["blogID"];
$sql = "SELECT * FROM blogs WHERE BlogID = ?";
$arg = $conn->prepare($sql);
$arg->bind_param("i",$BlogID);
$arg->execute();
$blog = $arg->get_result();
if($blog->num_rows>0){
    $blog = $blog->fetch_assoc();}
    else{
        echo "<a style='Color:Red; font-size:200%;'>Blog does not exist</a>";
        exit();
    }
if($blog["CatID"] == 1 && $_SESSION["Role"] != "Owner"){
    echo "<a style='Color:Red; font-size:200%;'>Invalid permissions.</a>";
    exit();}?>
<form id = "PostForm" action="index.php?file_path=scripts/createPostHandle.php" method="post">
    <input type="hidden" name ="blogID" value = <?php echo $BlogID;?>>
    <label for="postTitle-inp"style = "align-content:center;"> Post Title: </label>
    <input type="text" id = "postTitle-inp" name="postTitle"style = "align-content:center;">
    <label for="postContent-inp"style = "align-content:center;"> Content: </label>
    <textarea id = "postContent-inp" name="postContent"style = "align-content:top;padding:1%;"rows=15></textarea>
    <input type="submit" value="Submit"style = "align-self:center; width:50%; justify-self:center;height:50%;">
</form>