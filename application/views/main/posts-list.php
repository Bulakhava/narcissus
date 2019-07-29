<?php if (sizeof($list)): ?>

    <section class="posts-list">
        <div class="wrapper">
            <div class="posts-list-content wow slideInUp">
            <div class="posts">
                <?php foreach ($list as $key => $val): ?>
                    <a class="post" href="/post/<?php echo $val['id']; ?>">
                        <div class="post-wrapper">
                            <div class="post-img" style="background-image: url(<?php echo $val['imgSrc']; ?>)"></div>
                            <div class="post-title"><?php echo htmlspecialchars($val['title'], ENT_QUOTES); ?></div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
                <div class="all-posts-link">
                    <a href="/posts-list">Все статьи &#8594;</a>
                </div>
            </div>
        </div>
    </section>

<?php endif; ?>

