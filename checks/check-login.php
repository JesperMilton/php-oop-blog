<?php
/**
 * Controls if the session variable 'user' is set.
 * This works as a control to se if the user is logged in or not.
 * Return the user to login.php if the variable is not set.
 */
session_start();
if (!isset($_SESSION['user'])) {
    header("location: login.php");
    exit();
}
?>