
<div class="wrapper">

<div class="user-form" style="margin-top: 100px">

    <div class="title">Вход</div>

    <form id="form-login" action="/login" method="post">

        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email">
        </div>

        <div class="form-group">
            <label>Пароль</label>
            <input type="password" name="password">
        </div>

         <div class="form-buttons">
            <button class="butt butt-blue" type="submit">Войти</button>
        </div>

    </form>

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
                },
                password: {
                    trigger: 'keyup blur',
                    validators: {
                        notEmpty: {
                            message: 'Заполните это поле'
                        }
                    }
                }

            };

     formValidation($('#form-login'), fields);
});


</script>

