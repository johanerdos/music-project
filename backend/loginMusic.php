<?php


session_start();

if (isset($_POST['submit'])){
    
    require("dbMusic.php");
   
    $user_uid = mysqli_real_escape_string($connection, $_POST['uName']);
    $password = mysqli_real_escape_string($connection, $_POST['pass']);
    
    //Check if inputs are empty
    
    if (empty($user_uid) || empty($password)){
        header("Location: ..index.php?login_empty");
        exit();
        
    }else{
        
        $sql = "SELECT * FROM users WHERE userName='$user_uid'";
        $result = mysqli_query($connection, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck < 1){
            header("Location: ..index.php?No-users"); 
            exit();
        }else{
            if($row = mysqli_fetch_assoc($result)){
                //De-hashing the password
                $hashedPwdCheck = password_verify($password, $row['password']);
                if ($hashedPwdCheck == false){
                    header("Location: ../index.php?wrongPassword");
                    exit();
                }else if ($hashedPwdCheck == true){
                    //Log in the user
                    $_SESSION['u_first'] = $row['user_first'];
                    $_SESSION['u_last'] = $row['user_last'];
                    $_SESSION['u_email'] = $row['email'];
                    $_SESSION['u_uid'] = $row['userName'];

                    header("Location: ../index.php?login=success");
                }
            }
        }
    }
        
}else{
    header("Location: ../index.php?login_error");
    exit();
}
    
















