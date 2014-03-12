<!doctype html>
<html lang="ja">
<head>
    <!-- meta -->
    <meta charset="UTF-8">

    <!-- favicon -->
    <link  rel="icon" type="image/vnd.microsoft.icon" href="/img/favicon.ico">

    <!-- CSS -->
    <link rel="stylesheet" href="/css/font-awesome.css">
    <!-- <link rel="stylesheet" href="/bower_components/foundation/css/foundation.min.css">
    <link rel="stylesheet" href="/bower_components/foundation/css/normalize.css"> -->
    <link rel="stylesheet" href="/css/style.css">

    <title><?php echo "タイトルです！"?></title>
</head>
<body>
    <header>
        <nav>
          <a href="<?php echo $base_url; ?>/" class="header__nav">トップ</a>
          <a href="<?php echo $base_url; ?>/salon" class="header__nav">美容室から探す</a>
          <a href="<?php echo $base_url; ?>/beautician" class="header__nav">美容師から探す</a>
        </nav>
    </header>
    <div class="main">
        <?php echo $_content; ?>
    </div>
    <footer>フッターです</footer>

    <!-- JS -->
    <script src="/bower_components/foundation/js/vendor/modernizr.js"></script>
    <script src="/bower_components/foundation/js/vendor/jquery.js"></script>
    <script src="/bower_components/foundation/js/vendor/fastclick.js"></script>
    <script src="/bower_components/foundation/js/foundation.min.js"></script>

    <!-- <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.9/angular.min.js"></script>
    <script src="/bower_components/angular-strap/dist/angular-strap.min.js"></script>
    <script src="/bower_components/angular-strap/dist/angular-strap.tpl.min.js"></script> -->

    <script src="/js/script.js"></script>

</body>
</html>
