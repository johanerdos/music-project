<?php



require 'backend/dbMusic.php';

$postID = $_POST['like'];

if($_POST['like']) {

    $sqlLikes = "UPDATE recommendations SET `likes` = `likes`+1 WHERE reco_id = '$postID'";
    
    $resultLikes = $connection->query($sqlLikes);
    
    header("Location: index.php?like=registerd");
    exit();
    
}
?>
