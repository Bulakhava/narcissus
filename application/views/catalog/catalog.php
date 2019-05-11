<section class="catalog">
    <div class="wrapper">
        <div class="catalog_fx-container">
            <div class="catalog_content">
                <div class="title"><h2 class="nowrap"><?php echo htmlspecialchars($sort['title'], ENT_QUOTES); ?></h2></div>

             <div class="fx-container">
                <div class="image">
                    <img src="<?php echo $imgPath; ?>" alt="flower" width="100%">
                    <?php if ($galleryImg): ?>
                        <div class="button" style="margin: 25px 0 25px">
                            <button class="butt butt-green open-slider" data-id="<?php echo $sort['id']; ?>">Фото<sup><?php echo  sizeof($galleryImg) ?></sup></button>
                        </div>
                    <?php endif ?>
                </div>
                 <div class="text"><?php echo $sort['text']; ?></div>
             </div>
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