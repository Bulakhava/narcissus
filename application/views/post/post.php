<div class="post-page">
    <div class="wrapper fx-container">
       <div class="post_content">
           <div class="card post-card">
               <h1 class="title"><?php echo htmlspecialchars($post['title'], ENT_QUOTES); ?></h1>
               <div class="date"><?php echo $post_date; ?></div>
               <div class="img">
                   <img src="<?php echo $imgPath; ?>" alt="">
               </div>
               <div class="card-text"><?php echo $post['text']; ?></div>
               <div class="card-action">

                   <?php
                   include($_SERVER['DOCUMENT_ROOT'] . '/application/views/shared/shareSocial.php');
                   ?>


                   <div class="post-likes"
                         data-id_post="<?php echo $post['id']; ?>"
                         data-user_status="<?php echo ($_SESSION and $_SESSION['id']) ? 'authorized' : 'guest'; ?>"
                         title="<?php echo $like_status ? 'Отменить' : 'Нравится' ; ?>"
                        >
                       <i class="fas fa-heart" style="font-size:36px; color: <?php echo $like_status ? '#FF586B' : '#999' ; ?>"></i>
                       <div class="post-likes-count"><?php echo $post['count_like']; ?></div>
                   </div>

                   <div class="modal-go-to-login hidden animated slideInUp">
                       <div class="top">
                           <div class="modal-title">Понравилось?</div>
                           <div class="modal-content">Войдите в аккаунт, чтобы поставить отметку.</div>
                       </div>
                       <div class="bottom">
                           <a href="/login">Войти</a>
                       </div>
                   </div>

               </div>
           </div>

           <?php
           $post_url = '/add-post-comment/' . $post['id'];
           $delete_class = 'post-comment-delete';
           include($_SERVER['DOCUMENT_ROOT'] . '/application/views/shared/comments.php');
           ?>

       </div>
        <div class="post_aside">
            <div class="posts-cards">
                <?php foreach ($last_posts as $key => $val): ?>
                    <a class="post" href="/post/<?php echo $val['id']; ?>">
                       <div class="post-wrapper">
                           <div class="post-img" style="background-image: url(<?php echo $val['imgSrc']; ?>)"></div>
                           <div class="post-title"><?php echo htmlspecialchars($val['title'], ENT_QUOTES); ?></div>
                       </div>
                   </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>


