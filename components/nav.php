<?php
/**
 * Starts a session if one is not already active
 */
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
?>

<nav>
    <a href="index.php">Igångsida</a>
    <a href="postpage.php">Inläggsida</a>
    <?php
    /**
     * Generates a navigation menu and displays 'Login' if the user 
     * is not logged in. Displays 'Logout' if the user is logged in.
     */
    if (!isset($_SESSION['user'])) {
        echo '<a href="login.php">Login</a>';
    } else {
        echo '<a href="include/logout.php">Logout</a>';
    }
    ?>
</nav>