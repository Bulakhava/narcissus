<?php if (sizeof($list)): ?>

    <section class="posts-list">
        <div class="wrapper">

            <div class="posts">
                <?php foreach ($list as $key => $val): ?>
                    <a class="post wow slideInUp" href="/post/<?php echo $val['id']; ?>" data-wow-delay="<?php echo $key * 0.08 . 's'; ?>">
                        <div class="post-wrapper">
                            <div class="post-img" style="background-image: url(<?php echo $val['imgSrc']; ?>)"></div>
                            <div class="post-title"><?php echo htmlspecialchars($val['title'], ENT_QUOTES); ?></div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>

        </div>
    </section>

<?php endif; ?>

