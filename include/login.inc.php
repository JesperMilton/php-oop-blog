<?php

/**  
 * Processes the Login form data. It retrives the users input 
 * (username, password) and initializes the Login-class to 
 * authenticate the user.
 */
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = @$_POST['userN'];
    $password = @$_POST['passW'];

    require_once '../Classes/Dbh.php';
    require_once '../Classes/Login.php';

    $login = new Login($username, $password);
    $user = $login->loginUser();

    if ($user){
        $_SESSION['user'] = $user;
        header('location: ../postpage.php');
    }else{
        $error_message = 1;
        header('location: ../login.php?Error=$error_message');
    }
}
