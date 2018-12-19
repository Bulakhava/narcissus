<section class="sort-form">

<div class="user-form">

    <div class="title"><?php echo $title ?></div>

    <form id="form-login" action="/login" method="post">

        <div class="form-group">
            <label>Название</label>
            <input type="text" name="name">
        </div>

        <div class="form-group">
            <label>Текст</label>
            <textarea name="name"></textarea>    
        </div>



      <div class="file-group" style="">


               <label for="fileToUpload" class="addFile-label butt butt-green">
                        <span>Загрузить изображение</span>
                    </label>
                <input type="file"
                       name="file"
                       id="fileToUpload">

        
              <div id="file-name" class="nowrap">
        
                    <span class="text"></span>
                    <span class="file-size gray"></span>
                    <span class="delete" id="delete-file">
                        <svg version="1.1" id="Фигура_576_1_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                             x="0px" y="0px" viewBox="0 0 8 8" style="enable-background:new 0 0 8 8;" xml:space="preserve">
                            <g id="Фигура_576"><g><polygon class="st0" points="8,1.1 6.9,0 4,2.9 1.1,0 0,1.1 2.9,4 0,6.9 1.1,8 4,5.1 6.9,8 8,6.9 5.1,4"/></g></g>
                        </svg>
                    </span>
                </div>
    </div>


         <div class="form-buttons">
            <button class="butt butt-blue" type="submit">Сохранить</button>
        </div>

    </form>

</div>

</section>

<script>


</script>

