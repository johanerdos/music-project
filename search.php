<?php

//include_once 'logged-in-header.php';

$hostSearch = 'localhost';
$userSearch = 'root';
$pwdSearch = '';
$dbSearch = 'music';

$connSearch = mysqli_connect($hostSearch, $userSearch, $pwdSearch, $dbSearch);

$search = mysqli_real_escape_string($connSearch, ($_GET['search']));

$sqlSearch = "SELECT * FROM recommendations WHERE artist LIKE '%$search%'";


$resultSearch = $connSearch->query($sqlSearch);

$resultCheckSearch = mysqli_num_rows($resultSearch);

if($resultCheckSearch < 1){
    
    include_once 'noResults.php';
    
    
}else{
    while ($rowSearch = mysqli_fetch_assoc($resultSearch)){
        $artistSearch = $rowSearch['artist'];
        $songSearch = $rowSearch['song'];
        $authorSearch = $rowSearch['author'];
        $timeStampSearch = $rowSearch['time'];
        $postIDSearch = $rowSearch['reco_id'];
        $likesSearch = $rowSearch['likes'];
        
        $sqlEmbed = "SELECT embed FROM recommendations WHERE reco_id = '$postIDSearch'";
        
        $resultEmbed = $connSearch->query($sqlEmbed);
        
        while ($rowEmbed = mysqli_fetch_assoc($resultEmbed)){
            $source = $rowEmbed['embed'];
        }
        $postSearchResults = "
            
            
                <div class='feedPostContent' style='background: white none repeat scroll 0% 0%; width: 500px;'>
                    <div class='feedPostContentInner'>
                    <hr />
                        <a class='title userName disableLink' title='' href=''>$authorSearch</a>
                        <div class='postText' style='padding-right: 20px; padding-left: 15px;'>
                            <p>Artist: </p>
                            <p class='message' style='font-size: 25px;'>$artistSearch</p>
                            <p>Song: </p>
                            <p class='message' style='font-size: 25px;'>$songSearch</p>
                            <p>Posted by: </p>
                            <p class='message' style='font-size: 25px;'>$authorSearch</p>
                            <p>Number of Likes: </p>
                            <p class='message' style='font-size: 25px;'>$likesSearch</p>
                        </div>
                        <div class='timeStamp' style='padding-left: 15px;'>message created on: $timeStampSearch</div>
                        
                            <form action='likes.php' method='POST'>
                                    <input type='submit' value='$postIDSearch' name='like'/>
                                    
                            </form>
                            
                        </div>
                        
                            <iframe width='200' height='50' src='$source' 
                                frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen>
                            </iframe>
                            
                        <div class='commentInput'>
                            <div style='font-size: 16px; line-height: 15px; width: 100%; height: 40px; display: inline-block; position: relative; background-color: transparent; font-family: Roboto, sans-serif; transition: height 200ms cubic-bezier(0.23, 1, 0.32, 1) 0ms; cursor: auto; padding: 0px 60px 0px 12px;'>
                                <div style='position: absolute; opacity: 1; color: rgba(0, 0, 0, 0.3); transition: all 450ms cubic-bezier(0.23, 1, 0.32, 1) 0ms; bottom: 12px;'></div>
                                <input id='undefined-Typeacomment-undefined-25977' style='padding: 0px; position: relative; width: 100%; border: medium none; outline: medium none currentcolor; background-color: rgba(0, 0, 0, 0); color: rgba(0, 0, 0, 0.87); cursor: inherit; font: inherit; height: 100%;' placeholder='Type a comment...' value='' type='text'>
                        <div class='outer' style='padding: 20px;'>       
                        </div>
                        </div
                        
                        "
                        ;
        echo $postSearchResults;
    }
    
    
    
}
