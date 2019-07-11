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
    confirmModal(`Вы действительно хотите удалить сорт ${target.data('name')}`, function () {
        $.ajax({
            url: '/admin/delete-sort',
            type: 'post',
            data: {id : target.attr('id')},
            success: function() {
              location.reload();
            }
        });
    });
}

function deletePost(e) {
    var target = $(e.currentTarget);
    confirmModal(`Вы действительно хотите удалить статью ${target.data('name')}`, function () {
        $.ajax({
            url: '/admin/delete-post',
            type: 'post',
            data: {id : target.attr('id')},
            success: function() {
                 location.reload();
            }
        });
    });
}

function deleteCategory(e) {
    var target = $(e.currentTarget);
    confirmModal(`Вы действительно хотите удалить категорию ${target.data('name')}`, function () {
        $.ajax({
            url: '/admin/delete-category',
            type: 'post',
            data: {id : target.attr('id'), sort_id: target.data('sort-id')},
            success: function() {
                location.reload();
            }
        });
    });
}


function confirmModal(msg, callback) {
    var body = $('body');
    var modal = $('<div class="modal-overlay"><div class="modal slideInDown"><div class="modal-msg"><div class="modal-msg_text"></div><button class="confirm butt butt-white">ДА</button><button class="modal-close butt butt-red">НЕТ</button></div></div></div>');
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

function deleteComment() {
    const id = $(this).data('id');
    confirmModal('Вы действительно хотите удалить комментарий ?', function () {
        $.ajax({
            url: '/delete-sort-comment',
            type: 'post',
            data: {id: id},
            success: function() {
              location.reload();
            }
        });
    });
}

$(function () {
    $('.comment-delete').on('click', deleteComment);
});


