<!doctype html>
<html lang="en">
<?php include 'head.php' ?>
<body>
<div class="container">
    <?php include 'header.php' ?>
    <main>
        <div class="admin-layout wrapper">
            <div class="admin-layout_side-panel">
                <ul>
                    <li>
                        <a href="/admin/flowers-list" class="<?php if ($page === 'flowersList') {
                            echo 'active';
                        } ?>">
                            <span><i class="fab fa-phoenix-squadron" style="font-size: 22px;"></i></span>
                            Список сортов</a>
                    </li>
                    <li>
                        <a href="/admin/posts-list" class="<?php if ($page === 'postsList') {
                            echo 'active';
                        } ?>">
                            <span><i class="fab fa-phoenix-squadron" style="font-size: 22px;"></i></span>
                            Список статей</a>
                    </li>
                    <li>
                        <a href="/admin/add-sort" class="<?php if ($page === 'addSort') {
                            echo 'active';
                        } ?>">
                            <span><i class="fab fa-pagelines" style="font-size: 22px;"></i></span>
                            Добавить сорт</a>
                    </li>
                    <li><a href="/admin/add-post" class="<?php if ($page === 'addPost') {
                            echo 'active';
                        } ?>">
                            <span><i class="fas fa-copy" style="font-size: 22px;"></i></span>
                            Добавить статью</a></li>
                </ul>
            </div>
            <div class="admin-layout_content"><?php echo $content ?></div>
        </div>

    </main>
    <?php include 'footer.php' ?>
</div>

</body>
</html>
