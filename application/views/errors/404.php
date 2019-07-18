<?php include($_SERVER['DOCUMENT_ROOT'].'/application/views/layouts/head.php'); ?>

<div class="container">

    <?php include($_SERVER['DOCUMENT_ROOT'].'/application/views/layouts/header.php'); ?>

    <main>
        <div class="err-404">
            <div class="err-404_img">
                <span class="font-18">Error</span><span class="font-135">404</span>
            </div>
            <div class="err-404_title">Страница не найдена.</div>
            <div class="err-404_text">Возможно, вы воспользовались недействительной ссылкой или страница была удалена.</div>
            <div class="err-404_btn">
                <a href="/" class="butt butt-white">На главную</a>
            </div>
        </div>
    </main>

    <?php include($_SERVER['DOCUMENT_ROOT'].'/application/views/layouts/footer.php'); ?>

</div>
