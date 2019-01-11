<div class="form-wrapper">


<form id="form-editSort" action="/admin/edit-sort/<?php echo $sort['id']; ?>" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label>Название</label>
        <input type="text" name="title" value="<?php echo htmlspecialchars($sort['title'], ENT_QUOTES); ?>">
    </div>

    <div class="form-group">
        <label>Текст</label>
        <textarea name="text">
                    <?php echo htmlspecialchars($sort['text'], ENT_QUOTES); ?>
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

        formValidation($('#form-editSort'), fields);
    });


</script>
