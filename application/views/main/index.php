<section class="index-main">

    <div class="index-main_img"></div>

      <div class="wrapper">

       <div class="links-wrapper">


        <div class="title">
            <h1 class="center">Добро пожаловать в мой сад</h1>
        </div>
 
        <div class="text-16 center">
            Приглашаю всех полюбоваться цветами из моего сада. Самыми любимыми являются нарциссы. Их много, более 100 сортов, и каждый по своему интересен. Но и их компаньоны, которые цветут вместе с ними, а потом и вовсе приходят им на смену, тоже достойны того, чтобы покрасоваться перед вами. Некоторые цветы по разным причинам уже ушли из сада, оставив на память свои фотографии, а некоторые пришли недавно и еще не успели ими обзавестись, так что в галерею постоянно будет добавляться что-то новенькое.
        </div>

        <div class="links-container">


            <?php foreach(    [
                                  [
                                       'title' => 'Каталог',
                                       'text' => 'Каталог с названиями, фотографиями, описанием, рекомендациями по уходу',
                                       'link' => '/catalog/888',
                                       'pictLink' => '/img/catalog.jpg',
                                       'delay' => '0s'
                                   ],
                                  [
                                      'title' => 'Фото',
                                      'text' => 'Фотографии с названиями наиболее популярных видов садовых цветов ',
                                      'link' => '/gallery',
                                      'pictLink' => '/img/foto.jpg',
                                      'delay' => '0.2s'
                                  ]
                                ] as $link ) : ?>
                <article class="article--index wow slideInUp"  data-wow-delay="<?php echo $link['delay'] ?>">
                    <a class="article--index__image" href="<?php echo $link['link'] ?>">
                        <div class="image">
                            <img src="<?php echo $link['pictLink'] ?>" alt="">
                        </div>
                       <h2><?php echo $link['title'] ?></h2>
                        <div class="text"><?php echo $link['text'] ?></div>
                    </a>
               </article>
            <?php endforeach; ?>


            <!--           <a href="/catalog/888" class="flex-item flex-item-blue">-->
<!--                <div class="link-item link-item-blue">-->
<!--                    <div class="img">-->
<!--                        <img src="/img/tickets.png" alt="tickets">-->
<!--                    </div>-->
<!--                    <div class="title">Каталог</div>-->
<!--                </div>-->
<!--            </a>-->
<!---->
<!--            <a href="/gallery" class="flex-item flex-item-green">-->
<!--                <div class="link-item link-item-green">-->
<!--                    <div class="img">-->
<!--                        <img src="/img/camera.png" alt="camera">-->
<!--                    </div>-->
<!--                    <div class="title">Фото</div>-->
<!--                </div>-->
<!--            </a>-->

<!--            <a href="#" class="flex-item flex-item-red">-->
<!--                <div class="link-item link-item-red">-->
<!--                    <div class="img">-->
<!--                        <img src="/img/beer.png" width="70" alt="beer">-->
<!--                    </div>-->
<!--                    <div class="title">Обо мне</div>-->
<!--                </div>-->
<!--            </a>-->
<!---->
<!--            <a href="#" class="flex-item flex-item-orange">-->
<!--                <div class="link-item link-item-orange">-->
<!--                    <div class="img">-->
<!--                        <img src="/img/iPad.png" width="70" alt="iPad">-->
<!--                    </div>-->
<!--                    <div class="title">Контакты</div>-->
<!--                </div>-->
<!--            </a>-->

        </div>
    </div>
    </div>

</section>




