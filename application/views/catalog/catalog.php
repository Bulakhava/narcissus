<section class="catalog">
    <div class="wrapper">
        <div class="catalog_fx-container">

            <div class="catalog_content">

                <div class="card card-gorisintal" style="margin-bottom: 40px">
                    <div class="card-body">
                        <div class="card-image">
                            <img src="<?php echo $imgPath; ?>" alt="flower" width="100%">
                           <div class="card-actions">
                               <?php if(sizeof($galleryImg)): ?>
                                   <button class="butt butt-gradient open-slider" data-id="<?php echo $sort['id']; ?>">фото <span class="number"><?php echo  sizeof($galleryImg) ?></span></button>
                               <?php endif; ?>
                           </div>
                        </div>
                        <div class="card-block">
                            <div class="card-block-wrapper">
                                <h4 class="card-title"><?php echo htmlspecialchars($sort['title'], ENT_QUOTES); ?></h4>
                                <div class="card-text"><?php echo $sort['text']; ?></div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                $post_url = '/add-sort-comment/' . $sort['id'];
                include 'comments.php'?>

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
