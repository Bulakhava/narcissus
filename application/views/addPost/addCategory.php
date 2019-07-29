<div class="title" style="margin-top: 20px">Добавить категорию</div>
<form id="form-addCategory" action="/admin/add-post-category" method="post">
    <div class="form-group">
        <label>Название</label>
        <input type="text" name="name">
    </div>
    <div class="form-buttons" style="margin-top: 20px">
        <button class="butt butt-blue" type="submit">Сохранить</button>
    </div>
</form>
<script>

    $(function () {

        var fields = {
            name: {
                trigger: 'keyup blur',
                validators: {
                    notEmpty: {
                        message: 'Заполните это поле'
                    }
                }
            }
        };

        formValidation($('#form-addCategory'), fields);
    });

</script>

