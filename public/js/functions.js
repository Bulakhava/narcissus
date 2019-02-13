"use strict";

function createModal(msg, status, callback) {
  var body = $('body');
  var modal = $('<div class="modal-overlay"><div class="modal slideInDown"><div class="modal-msg"><div class="modal-msg_text"></div><button class="modal-close butt butt-green">OK</button></div></div></div>');
  modal.find('.modal-msg_text').text(msg);

  if (status === 'error') {
    modal.find('.modal-msg_text').addClass('error');
  }

  body.append(modal);
  body.addClass('overflow');
  modal.find('.modal-close').on('click', function () {
    modal.remove();
    body.removeClass('overflow');

    if (callback) {
      callback();
    }
  });
}

function createYesNoModal(text, callback) {
  var body = $('body');
  var modal = $('<div class="modal-overlay"><div class="modal slideInDown"><div class="modal-msg"><div class="modal-msg_text"></div><button class="modal-no butt butt-red">НЕТ</button><button class="modal-yes butt butt-green">ДА</button></div></div></div>');
  modal.find('.modal-msg_text').text(text);
  body.append(modal);
  body.addClass('overflow');
  modal.find('.modal-no').on('click', function () {
    modal.remove();
    body.removeClass('overflow');
  });
  modal.find('.modal-yes').on('click', function () {
    modal.remove();
    body.removeClass('overflow');
    callback();
  });
}

function deleteSort(e) {
  var target = $(e.currentTarget);
  confirmModal("\u0412\u044B \u0434\u0435\u0439\u0441\u0442\u0432\u0438\u0442\u0435\u043B\u044C\u043D\u043E \u0445\u043E\u0442\u0438\u0442\u0435 \u0443\u0434\u0430\u043B\u0438\u0442\u044C \u0441\u043E\u0440\u0442 ".concat(target.data('name')), function () {
    $.ajax({
      url: '/admin/delete-sort',
      type: 'post',
      data: {
        id: target.attr('id')
      },
      success: function success() {
        location.reload();
      }
    });
  });
}

function confirmModal(msg, callback) {
  var body = $('body');
  var modal = $('<div class="modal-overlay"><div class="modal slideInDown"><div class="modal-msg"><div class="modal-msg_text"></div><button class="confirm butt butt-green">ДА</button><button class="modal-close butt butt-red">НЕТ</button></div></div></div>');
  modal.find('.modal-msg_text').text(msg);
  body.append(modal);
  body.addClass('overflow');

  function closeModal() {
    modal.remove();
    body.removeClass('overflow');
  }

  modal.find('.modal-close').on('click', function () {
    closeModal();
  });
  modal.find('.confirm').on('click', function () {
    callback();
    closeModal();
  });
}