<div class="form-wrapper">
    <form id="form-changeImg" action="/admin/change-post-img/<?php echo $post['id']; ?>" method="post" enctype="multipart/form-data">
        <div class="changeImg-content">
                  <div class="image">
                       <div class="image-wrapper">
                    <img src="<?php echo $imgPath; ?>" alt="flower" width="100%">
                       </div>
                   </div>
                    <div class="fields">
                        <div class="file-group file-group_changeImg" style="margin-bottom: 25px">
                            <label for="fileToUpload" class="addFile-label butt butt-gradient">
                            <span>Сменить изображение</span>
                        </label>
                        <input type="file"
                               name="file"
                               id="fileToUpload"
                               class="fileToUpload">
                        <div id="file-name" class="nowrap file-name">
                            <span class="text"></span>
                            <span class="file-size gray"></span>
                            <span class="delete delete-file" id="delete-file">
                        <svg version="1.1" id="Фигура_576_1_" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink"
                             x="0px" y="0px" viewBox="0 0 8 8" style="enable-background:new 0 0 8 8;"
                             xml:space="preserve">
                            <g><g><polygon class="st0" points="8,1.1 6.9,0 4,2.9 1.1,0 0,1.1 2.9,4 0,6.9 1.1,8 4,5.1 6.9,8 8,6.9 5.1,4"/></g></g>
                        </svg>
                        </span>
                            </div>
                        </div>
                       <div class="form-buttons" style="margin-top: 30px">
                        <button class="butt butt-blue" type="submit">Сохранить</button>
                       </div>
                   </div>
               </div>
        </form>
</div>

<script>

    $(function () {
        formValidation($('#form-changeImg'), {});
    });

</script>
