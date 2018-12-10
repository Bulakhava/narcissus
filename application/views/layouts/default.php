<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300,400,700,800" rel="stylesheet">
    <link rel="stylesheet" href="public/css/style.min.css">
    <script src="/public/libraries/jquery-3.3.1.min.js"></script>
    <script src="/resources/js/form.js"></script>
</head>
<body>


<div class="container">
    <?php include 'header.php'?>
    <main>
        <?php echo $content ?>
    </main>
    <?php include 'footer.php'?>
</div>


</body>
</html>