<div class="wrapper">
    <div class="card-form animated fadeInDown">
    <div class="user-form">
        <div class="user-form-header">
             <div class="title">Регистрация</div>
            <div class="link" style="padding: 10px 0"><a href="/login">Есть аккаунт</a></div>
        </div>
        <form id="form-registration" action="/registration" method="post" autocomplete="off">
            <div class="form-group">
                <label>Имя</label>
                <input type="text" name="firstName">
            </div>
            <div class="form-group">
                <label>Фамилия</label>
                <input type="text" name="lastName">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email">
            </div>
            <div class="form-group">
                <label>Пароль</label>
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
            firstName: {
                trigger: 'keyup blur',
                validators: {
                    notEmpty: {
                        message: 'Заполните это поле'
                    },
                    regexp: {
                        regexp: '^[a-zA-Zа-яёА-ЯЁ0-9]{3,30}$',
                        message: 'Разрешены только буквы и цифры от 3 до 30 символов'
                    }
                }
            },
            lastName: {
                trigger: 'keyup blur',
                validators: {
                    notEmpty: {
                        message: 'Заполните это поле'
                    },
                    regexp: {
                        regexp: '^[a-zA-Zа-яёА-ЯЁ0-9]{3,30}$',
                        message: 'Разрешены только буквы и цифры от 3 до 30 символов'
                    }
                }
            },
            email: {
                trigger: 'keyup blur',
                validators: {
                    notEmpty: {
                        message: 'Заполните это поле'
                    },
                    regexp: {
                        regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                        message: 'Введите корректный Email'
                    }
                }
            },
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

        formValidation($('#form-registration'), fields);

    });

</script>
