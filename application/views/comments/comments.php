<div class="comments">
    <?php if ($_SESSION and $_SESSION['id']): ?>
    <div class="add-comment">
        <form action="<?php echo $post_url; ?>" method="post" id="comment-form">
            <div class="form-group" style="position: relative">
              <input type="text" placeholder="Оставить комментарий" name="comment">
            </div>
            <button class="butt butt-white" type="submit">Отправить</button>
        </form>
    </div>
    <?php endif; ?>

    <?php if (sizeof($comments)): ?>
    <div class="comments-list">
        <?php foreach ($comments as $val): ?>
            <div class="comments-list-item">
              <div class="name-date">
                  <span class="name"><?php echo $val['user_full_name']; ?></span> <span class="date"><?php echo $val['date_comment'] ; ?></span>
              </div>
              <div class="comment-text"><?php echo $val['text']; ?></div>
                <?php if ($_SESSION and $_SESSION['id'] === 'admin'): ?>
                <div class="comment-delete <?php echo $delete_class; ?>" data-id="<?php echo $val['id']; ?>">+</div>
                <?php endif; ?>
          </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

</div>

<script>

    $(function () {

        var fields = {
            comment: {
                trigger: 'input',
                validators: {
                    notEmpty: {
                        message: 'Заполните это поле'
                    }
                }
            }
        };

        formValidation($('#comment-form'), fields);
    });

</script>
