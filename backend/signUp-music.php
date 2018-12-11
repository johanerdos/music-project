<?php

if(isset($_POST['submit'])){
    
    require 'dbMusic.php';
    
    
    $first = mysqli_escape_string($connection, $_POST['first_name']);
    $last = mysqli_escape_string($connection, $_POST['last_name']);
    $email = mysqli_escape_string($connection, $_POST['email']);
    $userName = mysqli_escape_string($connection, $_POST['uName']);
    $pwd = mysqli_escape_string($connection, $_POST['pass']);
    
    if (empty($first) || empty($last) || empty($email) || empty($userName) || empty($pwd)){
        header("Location: ../index.php?signup=empty");
        exit();
    } else{
        //Check if input are valid
        if (!preg_match("/^[a-zA-Z]*$/", $last) || !preg_match("/^[a-zA-Z]*$/", $first)){
            header("Location: ../index.php?signup=invalid");
            exit();
            
        }else{
            //Check if email is valid
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                header("Location: ../index.php?signup=wrongEmail");
                exit();
            }else{
                $sql = "SELECT * FROM users WHERE userName= '$userName'";
                $result = mysqli_query($connection, $sql);
                $resultCheck = mysqli_num_rows($result);
                
                if($resultCheck > 0){
                    header("Location: ../index.php?signup=usertaken");
                    exit();
                }else{
                    //Hashing password
                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                    //Insert the user into the database
                    
                    $sql = "INSERT INTO users (user_first, user_last, email, userName, password) VALUES ('".$first."','".$last."','".$email."','".$userName."','".$hashedPwd."')";
                    
                    mysqli_query($connection, $sql) or die(mysqli_error($connection));
                    header("Location: ../index.php?signup=success");
                }
            }
        }
    }
    
} else {
    header("Location: ../signup.php");
    exit();
}

?>



