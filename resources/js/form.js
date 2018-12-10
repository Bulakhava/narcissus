$(function () {

    var $window = $(window);

    formValidation();


    function formValidation() {
        var $form = $('form');
        if ($form.length) {
            startValidator($form, function () {
                if ($form.find('.has-error').length) {
                } else {
                    sendForm($form, function (res) {
                        createModal(JSON.parse(res));
                        resetForm($form);
                    });
                }
            });
        }
    }


    function startValidator($form, onSubmit) {
        $form.bootstrapValidator({
            framework: 'bootstrap',
            submitButtons: 'button[type="submit"]',
            fields: {
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
                        }
                    }
                },
                pepeatPassword: {
                    trigger: 'blur',
                    validators: {
                        notEmpty: {
                            message: 'Заполните это поле'
                        },
                        identical: {
                            field: 'password',
                            message: 'Пароли не совпадают'
                        }
                    }
                },

            },
            showErrors: function () {
                return;
            }
        })
            .on('success.form.bv', function (e) {
                e.preventDefault();
                onSubmit();
            });
    };


    function sendForm($form, callback) {

        $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: new FormData(document.querySelector('form')),
            contentType: false,
            cache: false,
            processData: false,
            success: function (result) {
                callback(result);
            },
            error: function (err) {
                console.log(err);
            }
        });
    }

    function resetForm($form) {
        $form.bootstrapValidator("resetForm", true);
    }


    function createModal(res, callback) {

       var body = $('body');

        var modal = $('<div class="modal-overlay"><div class="modal slideInDown"><div class="modal-msg"><div class="modal-msg_text"></div><button class="modal-close butt butt-green">OK</button></div></div></div>');

        modal.find('.modal-msg_text').text(res.message);

        if(res.status === 'error'){
            modal.find('.modal-msg_text').addClass('error');
        }

        body.append(modal);
        body.addClass('overflow');

        modal.find('.modal-close').on('click', function () {
            modal.remove();
            body.removeClass('overflow');
            if(callback){
                callback();
            }

        });


        }

});