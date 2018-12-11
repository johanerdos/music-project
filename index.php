<?php

session_start();

if(isset($_SESSION['u_uid'])){
    include_once 'user_homepage.php';

}else{
    include_once 'header.php';
    include_once 'printReco.php';
    include_once 'signup.php';
}
?>
