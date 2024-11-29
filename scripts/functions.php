<?php
include "connectDB.php";
//This function works by taking your SQL argument and then the names of the column where the title and the description of the row is held, then it'll ask for a optional href and call if they want the title to be hyperlinked then optional variables to add a created by output
// function ListRows($argument, $title, $desc,$href = NULL, $hrefcall = NULL, $createdByArg = NULL, $createdByCall = NULL, $CreatedByRow = NULL){
//     global $conn;
//     $grab = $conn->query($argument);
//     if($grab->num_rows > 0){
//         while ($row = $grab->fetch_assoc()){
//             if($href == NULL){
//             echo "<h2>" . $row[$title] . "</h2>";}
//             else{
//                 echo "<h2> <a href ='" . $href . urlencode($row[$hrefcall]) .  "'>" . $row[$title] . "</a></h2>";
//             }
//             echo "<p>" . $row[$desc] . "</p>";
//             if ($createdByArg != NULL){
//                 $result = $conn->query($createdByArg . $row[$createdByCall]);
//                 $result = $result->fetch_assoc();
//                 echo "<b> This was created by " . $result[$CreatedByRow] . "</b>";
//             }
//         }
//     }
// }
function donothing(){}
function ListPosts($table = NULL,$columns = NULL,$args = NULL){
    global $conn;
    $argument = "SELECT * FROM " . $table;
    $grab = $conn->query($argument);
    while  ($row = $grab->fetch_assoc()){
        if (isset($args[$href]) != true){
            echo "<p>No href set</p>";
            }else{}
        }
    }
ListPosts("posts");