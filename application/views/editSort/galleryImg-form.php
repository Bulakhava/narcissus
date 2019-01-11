<div class="form-wrapper">

    <div class="imageList">
        <?php foreach ($list as $val): ?>

            <li>
                <a class="<?php echo ($val['id'] === $id) ? 'active' : ''; ?>" href="/catalog/<?php echo $val['id']; ?>"><?php echo htmlspecialchars($val['title'], ENT_QUOTES); ?></a>
            </li>

        <?php endforeach; ?>
    </div>

    <form id="form-addGalleryImg" action="/admin/add-galleryImg/<?php echo $sort['id']; ?>" method="post" enctype="multipart/form-data">

        <div class="file-group file-group_changeImg">

            <label for="addGalleryImg" class="addFile-label butt butt-green">
                <span>Добавить изображение</span>
            </label>

            <input type="file"
                   name="image"
                   id="addGalleryImg"
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