<?php
require_once 'Classes/Dbh.php';
require_once 'Classes/Posts.php';
$post = new Posts;
$unicpost = $post->showOnePost($_GET['id']);
?>

<!DOCTYPE html>
<html>
    
<?php
$pageName = 'Post';
include 'components/header.php';
?>

<body>
    <?php include 'components/nav.php'; ?>
    <section>
        <div>
            <h1>Post</h1>
            <div><?php foreach ($unicpost as $item): ?>
                    <div class="div-post">
                        <h4><b><?= htmlspecialchars($item['title']) ?></b></h4>
                        <p><?= htmlspecialchars($item['post']) ?></p>
                        <h4><b><?= htmlspecialchars($item['username']) ?></b></h4>
                        <p><?= htmlspecialchars($item['post_date']) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</body>

</html>