<?php
include "connectDB.php";
if($_SESSION["Logged_In"] == false) {
    echo "<a style='Color:Red; font-size:200%;'>Please create an account or log in to make posts.</a>";
    include "LogIn.php";
    exit();
}
$catID = $_GET["catID"];
$sql = "SELECT * FROM Categories WHERE CatID = ?";
$arg = $conn->prepare($sql);
$arg->bind_param("i",$catID);
$arg->execute();
$cat = $arg->get_result();
if($cat->num_rows>0){
    $cat = $cat->fetch_assoc();}
    else{
        echo "<a style='Color:Red; font-size:200%;'>Category does not exist</a>";
        exit();
    }
if($cat["CatID"] == 1 && $_SESSION["Role"] != "Owner"){
    echo "<a style='Color:Red; font-size:200%;'>Invalid permissions.</a>";
    exit();}?>
<form id = "PostForm" action="index.php?file_path=scripts/createBlogHandle.php" method="post">
    <input type="hidden" name ="catID" value = <?php echo $catID;?>>
    <label for="blogTitle-inp"style = "align-content:center;"> Blog Title: </label>
    <input type="text" id = "blogTitle-inp" name="blogTitle"style = "align-content:center;">
    <label for="blogDesc-inp"style = "align-content:center;"> Blog Description: </label>
    <textarea id = "blogDesc-inp" name="blogDesc"style = "align-content:top;padding:1%;"rows=5></textarea>
    <input type="submit" value="Submit"style = "align-self:center; width:50%; justify-self:center;height:50%;">
</form>