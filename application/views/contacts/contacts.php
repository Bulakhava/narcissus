<div class="contacts-page">
    <div class="wrapper fx-container">
        <div class="contacts_content">
            <div class="card contacts-card animated fadeInDown">
                <div class="about-me">
                <div class="image">
                    <img src="../img/i.jpg" alt="my-photo" width="150">
                </div>
                <div class="content">
                    <div class="name">Галина Борисевич</div>
                    <div class="email">coronacia@mail.ru</div>
                    <div class="text">
                        Привет, друзья! Рада приветствовать вас на своем сайте. Хочу, чтобы общение было обоюдным. Высказывайте свое мнение, пожелания, советы, задавайте вопросы, если что-то заинтересовало. Постараюсь ответить в кратчайший срок.
                    </div>
                </div>
                </div>

                <div class="user-form">
                    <form id="form-contacts" action="/contacts" method="post" autocomplete="off">
                        <div class="form-group">
                            <label>Имя</label>
                            <input type="text" name="name">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email">
                        </div>
                        <div class="form-group">
                            <label>Сообщение</label>
                            <textarea name="message"></textarea>
                        </div>
                        <div class="form-buttons">
                            <button class="butt butt-white" type="submit">Отправить</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div class="contacts_aside"></div>
    </div>
</div>


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
            },
            email: {
                trigger: 'keyup blur',
                validators: {
                    notEmpty: {
                        message: 'Заполните это поле'
                    }
                }
            },
            message: {
                trigger: 'keyup blur',
                validators: {
                    notEmpty: {
                        message: 'Заполните это поле'
                    }
                }
            }
        };
        formValidation($('#form-contacts'), fields);
    });
</script>
