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