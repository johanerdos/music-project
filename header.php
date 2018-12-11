<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
        <div class="header">
        <a href="#" class="logo">Erdosius</a>
        <a href="#" class="alt1">Latest</a>
        <a href="#" class="alt2">Popular</a>
        
        <?php
        include_once 'menu.php';
        ?>
            
        
                <div class ="login-bar">
                    
                    <div class="login-nav">
                        <form action="backend/loginMusic.php" method="POST">
                            
                            <input type="text" name="uName" placeholder="Username...">
                            <input type="password" name="pass" placeholder="Password...">
                          
                            <input class="buttonBlock" value="Log in" type="submit" name="submit">  
                            
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

