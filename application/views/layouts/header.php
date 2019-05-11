<header class="top-navigation_fixed">
    <div class="wrapper header_wrapper flex-container">
        <a class="logo nowrap" href="/">
            <span class="gray">Нарцисс</span> <span class="pink">и К</span>
        </a>

        <div class="navigation">
            <ul>
                <li><a href="/catalog/888">каталог</a></li>
                <li><a href="/gallery">галерея</a></li>
                <li><a href="">статьи</a></li>
                <li><a href="">контакты</a></li>
            </ul>
        </div>

<?php if (!$_SESSION or !$_SESSION['id']): ?>

        <div class="actions">
            <div class="input-panel">
                <ul>
                    <li class="login">
                        <a class="login-trigger" href="/login">Вход</a>
                    </li>
                    <li class="signup">
                        <a class="link-registr" href="/registration">Регистрация</a>
                    </li>
                </ul>
            </div>
        </div>

 <?php endif; ?> 

<?php if ($_SESSION and $_SESSION['id']): ?>

    <div class="user nowrap">
        <div class="name">
          <?php if ($_SESSION and $_SESSION['id'] != 'admin'): ?>
            <span><i class="fas fa-user" style="font-size: 20px;"></i></span>
          <?php endif; ?>
          <?php if ($_SESSION and $_SESSION['id'] === 'admin'): ?>
            <a href="/admin/flowers-list"><i class="fas fa-tools" style="font-size: 20px;"></i></a>
          <?php endif; ?>
            Привет, <?php echo $_SESSION['first_name']?></div>
        <a href="/logout" class="btn exit">Выйти</a>
      </div>

<?php endif; ?>


        <div class="burger">
            <a id="nav-toggle" href="#"><span></span></a>
        </div>
    </div>
</header>


<div class="mobile-menu center hidden">
   <div class="mobile-menu_wrapper">

         <?php if (!$_SESSION or !$_SESSION['id']): ?>

            <div class="input-panel">
                <ul>
                    <li class="login"> 
                        <a class="login-trigger" href="/login">Вход</a>
                    </li>
                    <li class="signup">
                        <a class="link-registr" href="registration">Регистрация</a>
                    </li>
                </ul>
            </div>

        <?php endif; ?> 


        <?php if ($_SESSION and $_SESSION['id']): ?>

     <div class="user nowrap">
        <div class="name"><span><i class="fas fa-user" style="font-size: 20px;"></i></span>
            Привет, <?php echo $_SESSION['first_name']?></div>
        <a href="/logout" class="btn exit">Выйти</a>
      </div>

     <?php endif; ?>

        <div class="mobile-menu_main">
           <div class="mobile-menu_item"><a href="">каталог</a></div>     
            <div class="mobile-menu_item"><a href="">галерея</a></div>   
            <div class="mobile-menu_item"><a href="">статьи</a></div>   
            <div class="mobile-menu_item"><a href="">контакты</a></div>   
        </div>
    </div>
</div>