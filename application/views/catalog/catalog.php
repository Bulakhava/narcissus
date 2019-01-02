<section class="catalog">
    <div class="wrapper">
        <div class="catalog_fx-container">

            <div class="catalog_content">

                <div class="title"><h2 class="nowrap"><?php echo htmlspecialchars($sort['title'], ENT_QUOTES); ?></h2></div>
                <div class="image">
                    <img src="<?php echo $imgPath; ?>" alt="flower" width="100%">
                </div>
                <div class="text"><?php echo $sort['text']; ?></div>

            </div>

            <div class="catalog_navigation">
                <h2>Все сорта</h2>
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