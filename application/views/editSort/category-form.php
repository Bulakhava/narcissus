<div class="form-wrapper">
    <h4 class="title-bg">Категории</h4>

    <div class="flowers-list" style="margin-bottom: 40px">


            <?php foreach ($categories as $val): ?>
        <table class="categories-table" style="width: 100%">
                <tr>
                    <td style="width: 200px"><?php echo htmlspecialchars($val['title'], ENT_QUOTES); ?></td>
                    <td style="width: 40px">
                        <span class="edit toggle-form" data-id="form-editCategory-<?php echo $val['id']; ?>"><i class="fas fa-edit" style="font-size: 20px;"></i></span>
                    </td>
                    <td>
                        <span class="delete" id="<?php echo $val['id']; ?>" data-sort-id="<?php echo $sort['id']; ?>" data-name="<?php echo $val['title']; ?>" onclick="deleteCategory(event)"><i class="fas fa-trash-alt" style="font-size: 19px;"></i></span>
                    </td>
                </tr>

                <tr>
                    <td colspan="3">
                        <form class="editCategoryForm" id="form-editCategory-<?php echo $val['id']; ?>" action="/admin/edit-category/<?php echo $val['id']; ?>" method="post"
                              enctype="multipart/form-data" hidden>
                            <div class="form-group">
                                <label>Название</label>
                                <input type="text" name="title"
                                       value="<?php echo htmlspecialchars($val['title'], ENT_QUOTES); ?>">
                            </div>
                            <div class="form-group">
                                <label>Текст</label>
                                <textarea name="text">
                                  <?php echo htmlspecialchars($val['text'], ENT_QUOTES); ?>
                               </textarea>
                            </div>
                            <div class="form-buttons">
                                <button class="butt butt-blue" type="submit">Сохранить</button>
                            </div>
                        </form>
                    </td>
                </tr>

            <?php if ($val['images']): ?>
            <tr>
                <td colspan="3">
                    <div class="imageList" style="padding-top: 0">

                        <?php foreach ($val['images'] as $img): ?>
                            <div class="imageList_item">
                                <img src="/<?php echo $img; ?>" alt="" width="100%">
                                <div class="overcast">
                                    <div class="delete-file delete-file-from-galery" data-img-src="<?php echo $img; ?>">
                                        <svg version="1.1" id="Фигура_576_1_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                             x="0px" y="0px" viewBox="0 0 8 8" style="enable-background:new 0 0 8 8;" xml:space="preserve">
                                        <g id="Фигура_576"><g><polygon class="st0" points="8,1.1 6.9,0 4,2.9 1.1,0 0,1.1 2.9,4 0,6.9 1.1,8 4,5.1 6.9,8 8,6.9 5.1,4"/></g></g>
                                    </svg>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </td>
            </tr>
            <?php endif ?>

            <tr>
                <td colspan="3">
                    <form class="fx-buttons addCategoryImgForm" id="form-addCategoryImg<?php echo $val['id']; ?>" action="/admin/add-category-img/<?php echo $sort['id'];?>?cat_id=<?php echo $val['id'];?>" method="post" enctype="multipart/form-data">
                        <div class="file-group file-group_changeImg">
                            <label for="addCategoryImg<?php echo $val['id']; ?>" class="addFile-label butt butt-green">
                                <span>Добавить изображение</span>
                            </label>
                            <input type="file"
                                   name="image"
                                   id="addCategoryImg<?php echo $val['id']; ?>"
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


                </td>
            </tr>
        </table>
            <?php endforeach; ?>


    </div>

    <form id="form-addCategory" action="/admin/edit-sort-category/<?php echo $sort['id']; ?>" method="post"
          enctype="multipart/form-data">
        <div class="form-group">
            <label>Название</label>
            <input type="text" name="title">
        </div>
        <div class="form-group">
            <label>Текст</label>
            <textarea name="text"></textarea>
        </div>
        <div class="form-buttons">
            <button class="butt butt-blue" type="submit">Добавить категорию</button>
        </div>
    </form>

</div>

<script>

    $(function () {

        var fields = {

            title: {
                trigger: 'keyup blur',
                validators: {
                    notEmpty: {
                        message: 'Заполните это поле'
                    }
                }
            },
            text: {
                trigger: 'keyup blur',
                validators: {
                    notEmpty: {
                        message: 'Заполните это поле'
                    }
                }
            }

        };


        formValidation($('#form-addCategory'), fields);

        $.each($('.editCategoryForm'), function (i, el) {
            formValidation($(el), fields);
        });

        $.each($('.addCategoryImgForm'), function (i, el) {
            formValidation($(el), {});
        });

    });

</script>
