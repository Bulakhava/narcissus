<div class="wrapper">
    <div class="card-form animated fadeInDown">
        <div class="user-form">
            <form id="change-password" action="/change-password" method="post">
                <div class="form-group">
                    <label>Новый пароль</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="form-group">
                    <label>Повторите пароль</label>
                    <input type="password" name="repeatPassword" id="repeatPassword">
                </div>
                <div class="form-buttons">
                    <button class="butt butt-white" type="submit">Отправить</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>

    $(function () {

        var fields = {

            password: {
                trigger: 'keyup blur',
                validators: {
                    notEmpty: {
                        message: 'Заполните это поле'
                    },
                    regexp: {
                        regexp: '^[a-z0-9]{6,30}$',
                        message: 'Разрешены только латинские буквы и цифры от 6 до 30 символов'
                    },
                }
            },
            repeatPassword: {
                trigger: 'keyup blur',
                validators: {
                    notEmpty: {
                        message: 'Заполните это поле'
                    }
                }
            },
        };

        formValidation($('#change-password'), fields);

    });

</script>

