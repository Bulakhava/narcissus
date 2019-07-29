<div class="post-page">
    <div class="wrapper fx-container">
       <div class="post_content">
           <div class="card post-card">
               <h1 class="title"><?php echo htmlspecialchars($post['title'], ENT_QUOTES); ?></h1>
               <div class="date"><?php echo $post_date; ?></div>
               <a href="/posts-list-category/<?php echo $post['category']; ?>" class="category"><?php echo $post_category_name; ?></a>
               <div class="img">
                   <img src="<?php echo $imgPath; ?>" alt="">
               </div>
               <div class="card-text"><?php echo $post['text']; ?></div>
               <div class="card-action">

                   <?php
                   include($_SERVER['DOCUMENT_ROOT'] . '/application/views/shared/shareSocial.php');
                   $post_id = $post['id'];
                   include($_SERVER['DOCUMENT_ROOT'] . '/application/views/shared/likes.php');
                   ?>

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


