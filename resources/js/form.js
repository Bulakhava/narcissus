var $window = $(window);

function formValidation($form, $fields) {
    console.log($fields);
    if ($form.length) {
        startValidator($form, $fields, function () {
            if ($form.find('.has-error').length) {
            } else {

                sendForm($form, function (res) {

                    var result = JSON.parse(res);

                    if (result.url) {
                        window.location.href = result.url;
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
    deleteFile();
    $form.bootstrapValidator("resetForm", true);

}



function deleteFile() {
    $('#fileToUpload').val("");
    // file = null;
    $('#file-name').hide().find('.text').text('').end().find('.file-size').text('');
};


$(function () {

    //   var file =null;

    $('#fileToUpload').change(function (event) {
        var file = event.target.files[0];
        if (file && file.name) {
            if ((file.size / 1048576) < 10) {
                addFileName(file);
            } else {
                // $('.file-requirements').removeClass('hidden');
            }
        }

    });

    function addFileName(file) {
        $('#file-name').show()
            .find('.text').text(file.name).end()
            .find('.file-size').text(`(${(Math.round(file.size / 1024 * 10)) / 10}) Kb`);
    }

    $('#delete-file').on('click', deleteFile);


});