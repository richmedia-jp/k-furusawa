<!doctype html>
<html lang="ja">
<head>
    <title><?php echo $my_name."画面です"?></title>
    <meta charset="UTF-8">
    <?php include "../settings/common_css.php" ?>
</head>
<body>
    <header>
        <nav>
          <a href="#" class="button">トップ</a>
          <a href="#" class="button">美容室から探す</a>
          <a href="#" class="button">美容師から探す</a>
        </nav>
    </header>
    <h1>Cutpia</h1>
    <p><img src="../img/shop.png">人気美容室ランキング</p>

    <p><i class="fa fa-user"></i> 人気美容師ランキング</p>

    <ul class="" data-orbit>
        <li data-orbit-slide="headline-1">
          <div>
            <h2>美容師１です</h2>
            <img src="../img/shop.png">
            <a href="#" class="button">トップ</a>
          </div>
        </li>
        <li data-orbit-slide="headline-2">
          <div>
            <h2>Headline 2</h2>
            <h3>Subheadline</h3>
          </div>
        </li>
        <li data-orbit-slide="headline-3">
          <div>
            <h2>Headline 3</h2>
            <h3>Subheadline</h3>
          </div>
        </li>
    </ul>

    <p><i class="fa fa-tag"></i> タグから探す</p>
    <ul class="" data-orbit>
        <li data-orbit-slide="headline-1">
          <div>
            <h2>タグから探します</h2>
            <label>テストタグ</label>
            <label>テストタグ</label>
          </div>
        </li>
        <li data-orbit-slide="headline-2">
          <div>
          </div>
        </li>
        <li data-orbit-slide="headline-3">
          <div>
            <h2>Headline 3</h2>
            <h3>Subheadline</h3>
          </div>
        </li>
    </ul>
    <footer>フッターです</footer>
    <?php include "../settings/common_js.php" ?>
</body>
</html>
