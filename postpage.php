<?php include 'checks/check-login.php'?>

<!DOCTYPE html>
<html lang="en">

<?php 
$pageName = 'PostPage';
include 'components/header.php'; 
?>

<body>
    <?php include 'components/nav.php'; ?>
    <section>
        <div>
            <h1>Post a blog</h1>
            <form action="include/post.inc.php" method="POST">
                <input class="input-title" type="text" placeholder="Text input" name="title" />
                <textarea name="post" class="textarea" rows="10"></textarea>
                <p class="control">
                    <input type="submit" class="button" value="Post">
                </p>
            </form>
        </div>
    </section>
</body>

</html>