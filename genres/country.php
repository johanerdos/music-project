<?php

$hostCo = 'localhost';
$userCo = 'root';
$pwdCo = '';
$dbCo = 'music';

$connectionCo = mysqli_connect($hostCo, $userCo, $pwdCo, $dbCo);


$country = 'Country';
$sqlRecoCo = "SELECT * FROM recommendations WHERE genre = '$country'";

    $resultRecoCo = $connectionCo->query($sqlRecoCo);
    
    
    while ($rowRecoCo = mysqli_fetch_assoc($resultRecoCo)){
        $artistRecoCo = $rowRecoCo['artist'];
        $songRecoCo = $rowRecoCo['song'];
        $authorRecoCo = $rowRecoCo['author'];
        $genreRecoCo = $rowRecoCo['genre'];
        $timeStampCo = $rowRecoCo['time'];
        
        $postRecosCo = "
            
            
                <div class='feedPostContent' style='background: white none repeat scroll 0% 0%; width: 500px;'>
                    <div class='feedPostContentInner'>
                    <hr />
                        <a class='title userName disableLink' title='' href=''>$authorRecoCo</a>
                        <div class='postText' style='padding-right: 20px; padding-left: 15px;'>
                            <p>Artist: </p>
                            <p class='message' style='font-size: 25px;'>$artistRecoCo</p>
                            <p>Song: </p>
                            <p class='message' style='font-size: 25px;'>$songRecoCo</p>
                            <p>Posted by: </p>
                            <p class='message' style='font-size: 25px;'>$authorRecoCo</p>
                        </div>
                        <div class='timeStamp' style='padding-left: 15px;'>message created on: $timeStampCo</div>
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
        echo $postRecosCo;
    }



