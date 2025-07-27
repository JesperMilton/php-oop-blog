<?php
require_once 'Classes/Dbh.php';
require_once 'Classes/Posts.php';
$show = new Posts;
$posts = $show->showAllPosts();
?>

<!DOCTYPE html>
<html>

<?php
$pageName = 'Homescreen';
include 'components/header.php';
?>

<body>
    <?php include 'components/nav.php'; ?>
    <section>
        <div>
            <h1>Posts</h1>
            <div>
                <?php if (isset($posts) && is_array($posts)): ?>
                <?php foreach ($posts as $item): ?>
                    <a href="post.php?id=<?= htmlspecialchars($item['posts_id']) ?>">
                        <div class="div-post">
                            <h4><b>Title: <?= htmlspecialchars($item['title']) ?></b></h4>
                            <p><?= htmlspecialchars($item['post']) ?></p>
                            <p><b>Writer: <?= htmlspecialchars($item['username']) ?></b></p>
                            <p><?= htmlspecialchars($item['post_date']) ?></p>
                        </div>
                    </a>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
</body>

</html>