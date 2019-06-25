<section class="gallery">
    <div class="wrapper gallery-wrapper">

        <?php foreach ($list as $val): ?>

            <div class="card">
                <div class="card-body">
                    <div class="card-image">
                     <img class="card-img-top img-fluid" src="<?php echo $val['imgSrc']; ?>" alt="flower">
                    </div>
                    <div class="card-block">
                        <div class="card-block-wrapper">
                        <h4 class="card-title"><?php echo htmlspecialchars($val['title'], ENT_QUOTES); ?></h4>
                        <div class="card-actions">
                            <a class="butt butt-white" href="/catalog/<?php echo $val['id']; ?>">Описание</a>
                            <?php if($val['galleryImgLength']): ?>
                            <button class="butt butt-gradient open-slider" data-id="<?php echo $val['id']; ?>">фото <span class="number"><?php echo $val['galleryImgLength']; ?></span></button>
                            <?php endif; ?>

                        </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>

    </div>
</section>
