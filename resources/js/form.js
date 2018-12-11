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
                        var result = JSON.parse(res);
                        createModal(result.message, result.status);
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
    
    
    function checkMatchPasswords() {
        return ($('#password').val() === $('#repeatPassword').val());
    }


    function sendForm($form, callback) {

        if (!checkMatchPasswords()) {
            createModal('Пароли не совпадают', 'error');
            return;
       }

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

    function createModal(msg, status, callback) {

       var body = $('body');
       var modal = $('<div class="modal-overlay"><div class="modal slideInDown"><div class="modal-msg"><div class="modal-msg_text"></div><button class="modal-close butt butt-green">OK</button></div></div></div>');
       modal.find('.modal-msg_text').text(msg);

        if(status === 'error'){
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