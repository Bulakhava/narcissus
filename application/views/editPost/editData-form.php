<div class="form-wrapper">
    <form id="form-editPost" action="/admin/edit-post/<?php echo $post['id']; ?>" method="post"
          enctype="multipart/form-data">
        <div class="form-group">
            <label>Название</label>
            <input type="text" name="title" value="<?php echo htmlspecialchars($post['title'], ENT_QUOTES); ?>">
        </div>
        <div class="form-group">
            <label>Текст</label>
            <textarea name="text">
                    <?php echo htmlspecialchars($post['text'], ENT_QUOTES); ?>
        </textarea>
        </div>
        <div class="form-buttons">
            <button class="butt butt-blue" type="submit">Сохранить</button>
        </div>
    </form>
</div>

<script>

    $(function () {

        var fields = {

            title: {
                trigger: 'keyup blur',
                validators: {
                    notEmpty: {
                        message: 'Заполните это поле'
                    }
                }
            },
            text: {
                trigger: 'keyup blur',
                validators: {
                    notEmpty: {
                        message: 'Заполните это поле'
                    }
                }
            }

        };

        formValidation($('#form-editPost'), fields);
    });

</script>
