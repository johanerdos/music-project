<?php

include_once 'logged-in-header.php';
include_once 'printReco.php';
?>

<h3></h3>
<div class="reco-form">
    <form action="backend/reco-posts.php" method="POST">
        <input type="text" name="artist" placeholder="Artist...">
        <input type="text" name="song" placeholder="Song...">
        <input type="text" name="genre" placeholder="Genre">
        <input type="text" name="embed" placeholder="Embedded Link... (Optional)">
        
        <button type="submit" name="submit">Submit</button>
    </form>
</div>


