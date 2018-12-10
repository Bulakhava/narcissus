<div class="wrapper">

<div class="user-form">

    <div class="title">Регистрация</div>

    <form class="registration" action="/registration" method="post">

        <div class="form-group">
            <label>Имя</label>
            <input type="text" name="firstName">
            <div class="error"></div>
        </div>

        <div class="form-group">
            <label>Фамилия</label>
            <input type="text" name="lastName">
            <div class="error"></div>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email">
            <div class="error"></div>
        </div>

        <div class="form-group">
            <label>Пароль</label>
            <input type="password" name="password">
            <div class="error"></div>
        </div>

        <div class="form-group">
            <label>Повторите пароль</label>
            <input type="password" name="repeatPassword">
            <div class="error"></div>
        </div>

<!--        <div class="not-match exist">Пользователь с таким email-ом уже существует</div>-->

        <div class="form-buttons">
            <button class="butt butt-blue" type="submit">Отправить</button>
        </div>

    </form>

</div>
</div>

<?php if(isset($td)) {include 'application/views/layouts/modal-info.php'; } ?>