<?php


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title></title>
    
   	<link rel="stylesheet" type="text/css" href="styles.css">
  </head>
  <body>

      
                
      
    <div class="header">
        <a href="index.php" class="logo">Erdosius</a>
        <a href="#" class="alt1">Latest</a>
        <a href="#" class="alt2">Popular</a>
        <?php
        require 'menu.php';
        ?>
        
                <div class ="login-bar">
                    
                    <div class="login-nav">
                        <form action="log-out.php" method="POST">
                            
                            <p class="welcome">Welcome: </p>
                            <?php
                            $userLoggedIn = $_SESSION['u_uid'];
                            echo "<p style='float:right;color:black;margin-right:20px;'>".$userLoggedIn."</p>";
                            ?>
                            
                            
                            <input class="buttonBlock" value="Logout" type="submit" name="submit">  
                            
                        </form>
                        
                        
                        <form action="search.php" method="GET">
                            <input id="search" name="search" type="text" placeholder="Artist...">
                            <input id="submit" type="submit" value="Search">
                            
                        </form>
                    </div>
                    
                </div>
    </div>
  </body>
</html>
