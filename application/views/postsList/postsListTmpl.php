<div class="posts-list-tmpl">
    <div class="wrapper">
        <div class="cards">

            <?php foreach ($posts as $post): ?>

            <div class="card">
                <div class="card-body">
                    <a href="/post/<?php echo $post['id']; ?>" class="card-image">
                        <img src="<?php echo $post['imgSrc']; ?>"
                             alt="flower">
                    </a>
                    <div class="card-block">
                        <div class="content">
                            <a href="/post/<?php echo $post['id']; ?>" class="card-block_title"><?php echo htmlspecialchars($post['title'], ENT_QUOTES); ?></a>
                            <div class="card-block_date"><?php echo $post['date_comment']; ?></div>
                           <a href="/posts-list-category/<?php echo $post['category']; ?>" class="card-block_category"><?php echo $post['post_category_name']; ?></a>
                        </div>
                        <div class="card-action">
                            <div class="likes">
                                <?php
                                $post_id = $post['id'];
                                include($_SERVER['DOCUMENT_ROOT'] . '/application/views/shared/likes.php');
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php endforeach; ?>

        </div>

        <div class="catalog_navigation">
            <div class="open_catalog_navigation">Все категории</div>
            <div class="catalog_navigation_list">
                <ul>
                    <?php foreach ($categories as $val): ?>
                        <li>
                            <a class="<?php echo ($val['id'] === $cat_id) ? 'active' : ''; ?>"
                               href="/posts-list-category/<?php echo $val['id']; ?>">
                                <?php echo htmlspecialchars($val['name'], ENT_QUOTES); ?>
                                <span>(<?php echo $val['count_post']; ?>)</span>
                            </a>
                        </li>
                    <?php endforeach; ?>

                </ul>
            </div>
        </div>

    </div>
</div>
