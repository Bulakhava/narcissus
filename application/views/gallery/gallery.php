<section class="gallery">
    <div class="wrapper gallery-wrapper">

        <?php foreach ($list as $val): ?>

        <div class="gallery-item">
            <div class="img">
                <img src="<?php echo $val['imgSrc']; ?>" alt="" width="100%">
            </div>
            <div class="title">
                <?php echo htmlspecialchars($val['title'], ENT_QUOTES); ?>
            </div>
            <div class="gallery-links">
                <button class="butt butt-green open-slider" data-id="<?php echo $val['id']; ?>">Фото<sup><?php echo $val['galleryImgLength']; ?></sup></button>
                <a class="butt butt-blue" href="/catalog/<?php echo $val['id']; ?>">
                    Описание
                </a>
            </div>
        </div>

        <?php endforeach; ?>

    </div>
</section>