<section class="catalog">
    <div class="wrapper">
        <div class="catalog_fx-container">

            <div class="catalog_content">

                <div class="title"><h2 class="nowrap"><?php echo htmlspecialchars($sort['title'], ENT_QUOTES); ?></h2></div>
                <div class="image">
                    <img src="<?php echo $imgPath; ?>" alt="flower" width="100%">
                </div>

                <?php if ($galleryImg): ?>
                <div class="button" style="margin: -15px 0 30px">
                    <button class="butt butt-green">Фото<sup><?php echo  sizeof($galleryImg) ?></sup></button>
                </div>
                <?php endif ?>

                <div class="text"><?php echo $sort['text']; ?></div>

                <?php if ($galleryImg): ?>

                <?php endif ?>

            </div>

            <div class="catalog_navigation">

                <ul>

                    <?php foreach ($list as $val): ?>

                       <li>
                           <a class="<?php echo ($val['id'] === $id) ? 'active' : ''; ?>" href="/catalog/<?php echo $val['id']; ?>"><?php echo htmlspecialchars($val['title'], ENT_QUOTES); ?></a>
                       </li>

                    <?php endforeach; ?>

                </ul>
            </div>
        </div>
    </div>
</section>