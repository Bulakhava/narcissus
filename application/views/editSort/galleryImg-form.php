<div class="form-wrapper galleryImg_form-wrapper">

    <h4 class="title-bg">Изображения галлереи</h4>

    <div class="imageList">
        <?php foreach ($galleryImg as $val): ?>

            <div class="imageList_item">
            <img src="/<?php echo $val; ?>" alt="" width="100%">
                      <div class="overcast">
                              <div class="delete-file delete-file-from-galery" data-img-src="<?php echo $val; ?>">
                                    <svg version="1.1" id="Фигура_576_1_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         x="0px" y="0px" viewBox="0 0 8 8" style="enable-background:new 0 0 8 8;" xml:space="preserve">
                                        <g id="Фигура_576"><g><polygon class="st0" points="8,1.1 6.9,0 4,2.9 1.1,0 0,1.1 2.9,4 0,6.9 1.1,8 4,5.1 6.9,8 8,6.9 5.1,4"/></g></g>
                                    </svg>
                              </div>
                      </div>
                  </div>
        <?php endforeach; ?>
    </div>

    <form class="fx-buttons" id="form-addGalleryImg" action="/admin/add-galleryImg/<?php echo $sort['id']; ?>" method="post" enctype="multipart/form-data" style="margin: 30px 0 15px">

        <div class="file-group file-group_changeImg">

            <label for="addGalleryImg<?php echo $sort['id']; ?>" class="addFile-label butt butt-green">
                <span>Добавить изображение</span>
            </label>

            <input type="file"
                   name="image"
                   id="addGalleryImg<?php echo $sort['id']; ?>"
                   class="fileToUpload">

            <div class="file-name nowrap">

                <span class="text"></span>
                <span class="file-size gray"></span>
                <span class="delete delete-file">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink"
                             x="0px" y="0px" viewBox="0 0 8 8" style="enable-background:new 0 0 8 8;"
                             xml:space="preserve">
                            <g><g><polygon class="st0" points="8,1.1 6.9,0 4,2.9 1.1,0 0,1.1 2.9,4 0,6.9 1.1,8 4,5.1 6.9,8 8,6.9 5.1,4"/></g></g>
                        </svg>
                </span>
            </div>
        </div>

        <div class="form-buttons">
            <button class="butt butt-blue" type="submit">Сохранить</button>
        </div>

    </form>

</div>

<script>

    $(function () {
        formValidation($('#form-addGalleryImg'), {});
    });

</script>