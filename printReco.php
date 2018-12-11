<?php

$localhost = 'localhost';
$userReco = 'root';
$passReco = '';
$dbReco = 'music';

$connectionReco = mysqli_connect($localhost, $userReco, $passReco, $dbReco);



$sqlReco = "SELECT * FROM recommendations ORDER BY likes DESC";


    $resultReco = $connectionReco->query($sqlReco);
    
    
    while ($rowReco = mysqli_fetch_assoc($resultReco)){
        $artistReco = $rowReco['artist'];
        $songReco = $rowReco['song'];
        $authorReco = $rowReco['author'];
        $genreReco = $rowReco['genre'];
        $timeStamp = $rowReco['time'];
        $postID = $rowReco['reco_id'];
        $likes = $rowReco['likes'];
        
        
        $sqlEmbed = "SELECT embed FROM recommendations WHERE reco_id = '$postID'";
        
        $resultEmbed = $connectionReco->query($sqlEmbed);
        
        while ($rowEmbed = mysqli_fetch_assoc($resultEmbed)){
            $source = $rowEmbed['embed'];
        }
        $postRecos = "
            
            
                <div class='feedPostContent' style='background: white none repeat scroll 0% 0%; width: 500px;'>
                    <div class='feedPostContentInner'>
                    <hr />
                        <a class='title userName disableLink' title='' href=''>$authorReco</a>
                        <div class='postText' style='padding-right: 20px; padding-left: 15px;'>
                            <p>Artist: </p>
                            <p class='message' style='font-size: 25px;'>$artistReco</p>
                            <p>Song: </p>
                            <p class='message' style='font-size: 25px;'>$songReco</p>
                            <p>Posted by: </p>
                            <p class='message' style='font-size: 25px;'>$authorReco</p>
                            <p>Number of likes: </p>
                            <p class='message' style='font-size: 25px;'>$likes</p>
                        </div>
                        
                        
                        <div class='timeStamp' style='padding-left: 15px;'>post created: $timeStamp</div>
                        
                                
                                <form action='likes.php' method='POST'>
                                    <input type='submit' value='$postID' name='like'/>
                                </form>
                                
                            </div>
                            
                            <iframe width='200' height='50' value='$postID' src='$source' 
                                frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen>
                            </iframe>
                            
                        </div>
                        <div class='commentInput'>
                            <div style='font-size: 16px; line-height: 15px; width: 100%; height: 40px; display: inline-block; position: relative; background-color: transparent; font-family: Roboto, sans-serif; transition: height 200ms cubic-bezier(0.23, 1, 0.32, 1) 0ms; cursor: auto; padding: 0px 60px 0px 12px;'>
                                <div style='position: absolute; opacity: 1; color: rgba(0, 0, 0, 0.3); transition: all 450ms cubic-bezier(0.23, 1, 0.32, 1) 0ms; bottom: 12px;'></div>
                                <input id='undefined-Typeacomment-undefined-25977' style='padding: 0px; position: relative; width: 100%; border: medium none; outline: medium none currentcolor; background-color: rgba(0, 0, 0, 0); color: rgba(0, 0, 0, 0.87); cursor: inherit; font: inherit; height: 100%;' placeholder='Type a comment...' value='' type='text'>
                        <div class='outer' style='padding: 20px;'>       
                        </div>
                        </div
                        
                        "
                        ;
        
        echo $postRecos;
    }






