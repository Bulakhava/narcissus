<div class="wrapper">
    <div class="card-form animated fadeInDown"">
    <div class="user-form">
        <div class="text" style="font-size: 14px; font-weight: 600;color: #5c6ac4;">Для восстановления пароля введите ваш email</div>
        <form id="forgot-password" action="/forgot-password" method="post" autocomplete="off">
            <div class="form-group">
                <input type="text" name="email">
            </div>
            <div class="form-buttons login-form-buttons">
                <button class="butt butt-white" type="submit">Отправить</button>
            </div>
        </form>
    </div>
</div>
</div>

<script>
    $(function () {
        var fields = {
            email: {
                trigger: 'keyup blur',
                validators: {
                    notEmpty: {
                        message: 'Заполните это поле'
                    }
                }
            }
        };
        formValidation($('#forgot-password'), fields);
    });
</script>
