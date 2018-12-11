<?php
session_start();
if(isset($_POST['submit'])){
    
    require 'dbMusic.php';

    $artist = mysqli_escape_string($connection, $_POST['artist']);
    $song = mysqli_escape_string($connection, $_POST['song']);
    $genre = mysqli_escape_string($connection, $_POST['genre']);
    $embedCode = mysqli_escape_string($connection, $_POST['embed']);
    $author = $_SESSION['u_uid'];
    


    if(empty($artist) || empty($song)){
        header("Location: ../index.php?submit=empty");
        exit();
    }else{
        $sql = "INSERT INTO recommendations (artist, song, genre, author, embed) VALUES ('".$artist."','".$song."','".$genre."','".$author."','".$embedCode."')";
                    
        mysqli_query($connection, $sql) or die(mysqli_error($connection));
        header("Location: ../index.php?submit=success");
    }
} else {
    header("Location: ../index.php");
    exit();
}

