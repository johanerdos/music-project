<?php
//require 'logged-in-header.php';


$hostHip = 'localhost';
$userHip= 'root';
$pwdHip = '';
$dbHip = 'music';

$connectionHip = mysqli_connect($hostHip, $userHip, $pwdHip, $dbHip);


$HipHop = 'Hip-Hop';
$sqlRecoHip = "SELECT * FROM recommendations WHERE genre = '$HipHop'";

    $resultRecoHip = $connectionHip->query($sqlRecoHip);
    
    
    while ($rowRecoHip = mysqli_fetch_assoc($resultRecoHip)){
        $artistRecoHip = $rowRecoHip['artist'];
        $songRecoHip = $rowRecoHip['song'];
        $authorRecoHip = $rowRecoHip['author'];
        $genreRecoHip = $rowRecoHip['genre'];
        $timeStampHip = $rowRecoHip['time'];
        
        $postRecoHip = "
            
            
                <div class='feedPostContent' style='background: white none repeat scroll 0% 0%; width: 500px;'>
                    <div class='feedPostContentInner'>
                    <hr />
                        <a class='title userName disableLink' title='' href=''>$authorRecoHip</a>
                        <div class='postText' style='padding-right: 20px; padding-left: 15px;'>
                            <p>Artist: </p>
                            <p class='message' style='font-size: 25px;'>$artistRecoHip</p>
                            <p>Song: </p>
                            <p class='message' style='font-size: 25px;'>$songRecoHip</p>
                            <p>Posted by: </p>
                            <p class='message' style='font-size: 25px;'>$authorRecoHip</p>
                        </div>
                        <div class='timeStamp' style='padding-left: 15px;'>message created on: $timeStampHip</div>
                        <div class='likeButton'>
                            <div class='likeButton noSelection'>
                                <i class='icon icon-like'>
                                    <img src='images/wärja.jpeg' style='padding-left: 15px; 'height='40' width='40'>
                                    
                                </i>
                            </div>
                            <span class='text' style='padding-left: 15px;'>Like</span>
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
        echo $postRecoHip;
    }





