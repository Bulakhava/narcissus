var $window = $(window);

function formValidation($form, $fields) {
    if ($form.length) {
        startValidator($form, $fields, function () {
            if ($form.find('.has-error').length) {
            } else {
                sendForm($form, function (res) {
                    console.log(res);
                    var result = JSON.parse(res);
                    if (result.url) {
                        if (result.url === 'reload') {
                            setTimeout(function () {
                                location.reload();
                            }, 0);
                        } else {
                            window.location.href = result.url;
                        }

                    } else {

                        createModal(result.message, result.status, enableBtn);

                    }
                    if (result.status === 'success') {
                        resetForm($form);
                    }

                });
            }
        });
    }
}


function enableBtn() {
    $("button[type=submit]").removeAttr("disabled");
}


function startValidator($form, $fields, onSubmit) {
    $form.bootstrapValidator({
        framework: 'bootstrap',
        submitButtons: 'button[type="submit"]',
        fields: $fields,
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

    var id = '#' + $form.attr('id');

    $.ajax({
        type: $form.attr('method'),
        url: $form.attr('action'),
        data: new FormData(document.querySelector(id)),
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
    deleteFile();
    $form.bootstrapValidator("resetForm", true);

}

function deleteFile() {
    var parent = $(this).parent().parent();
    parent.find('.fileToUpload').val("");
    parent.find('.file-name').hide().find('.text').text('').end().find('.file-size').text('');
};

$(function () {

    $('.fileToUpload').change(function (event) {
        var file = event.target.files[0];
        if (file && file.name) {
            if ((file.size / 1048576) < 10) {
                var fileName = $(this).parent().find('.file-name');
                fileName.show()
                    .find('.text').text(file.name).end()
                    .find('.file-size').text(`(${(Math.round(file.size / 1024 * 10)) / 10}) Kb`);
            } else {
                // $('.file-requirements').removeClass('hidden');
            }
        }

    });
    $('.delete-file').on('click', deleteFile);

    function removeFile(path) {

        var data = {path: path};
        var pathData = new FormData();
        pathData.append('data', JSON.stringify(data));

        $.ajax({
            type: 'POST',
            url: '/admin/remove-galleryImg',
            data: pathData,
            contentType: false,
            cache: false,
            processData: false,
            success: function () {
                setTimeout(function () {
                    location.reload();
                }, 0);
            },
            error: function (err) {
                console.log(err);
            }
        });
    }

    $('.delete-file-from-galery').on('click', function () {
        var path = $(this).data('img-src');
        createYesNoModal('Вы действительно хотите удалить это изображение?', function () {
            removeFile(path);
        });
    });

    function toggleForm() {
        const id = $(this).data('id');
        const forms = $('.editCategoryForm');
        $.each(forms, function (i, el) {
            if ($(el).attr('id') != id) {
                $(el).slideUp();
            }
        });
        $(`#${id}`).slideToggle();
    }

    $('.toggle-form').on('click', toggleForm);

});

