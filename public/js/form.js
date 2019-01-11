"use strict";

var $window = $(window);

function formValidation($form, $fields) {
  console.log($fields);

  if ($form.length) {
    startValidator($form, $fields, function () {
      if ($form.find('.has-error').length) {} else {
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
    showErrors: function showErrors() {
      return;
    }
  }).on('success.form.bv', function (e) {
    e.preventDefault();
    onSubmit();
  });
}

;

function checkMatchPasswords() {
  return $('#password').val() === $('#repeatPassword').val();
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
    success: function success(result) {
      callback(result);
    },
    error: function error(err) {
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
}

;
$(function () {
  //   var file =null;
  $('.fileToUpload').change(function (event) {
    var file = event.target.files[0];

    if (file && file.name) {
      if (file.size / 1048576 < 10) {
        var fileName = $(this).parent().find('.file-name');
        fileName.show().find('.text').text(file.name).end().find('.file-size').text("(".concat(Math.round(file.size / 1024 * 10) / 10, ") Kb"));
      } else {// $('.file-requirements').removeClass('hidden');
      }
    }
  });
  $('.delete-file').on('click', deleteFile);
});