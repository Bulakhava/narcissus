<div class="post-likes"
     data-id_post="<?php echo $post_id; ?>"
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
