<!DOCTYPE html>
<html lang="en">

<?php 
$pageName = 'Login';
include 'components/header.php'; 
?>

<body>
    <?php include 'components/nav.php'; ?>
    <section class="form">
        <div>
            <h1>Log In</h1>
            <div>
                <form action="include/login.inc.php" method="POST">
                    <label class="label">Name</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="Name" name="userN">
                    </div>
                    <label class="label">Password</label>
                    <div class="control">
                        <input class="input" type="password" placeholder="Password" name="passW">
                    </div>
                    <p class="control">
                        <input type="submit" class="button is-success" value="Login">
                    </p>
                </form>
                <?php 
                if (isset($_GET['Error'])){
                    echo '<p class="label">Wrong password or username</p>';
                }
                ?>
            </div>
        </div>
    </section>
</body>

</html>