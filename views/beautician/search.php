<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title></title>
    <?php include "../settings/common_css.php" ?>
</head>
<body>
    <form>
        <p>美容師名から探す</p>
        <input type="text" placeholder="ここに入れてください">
         <a href="#" class="button postfix">Go</a>
    </form>

    <p><i class="fa fa-star"></i>おすすめの美容師</p>

    <ul class="" data-orbit>
        <li data-orbit-slide="headline-1">
          <div>
            <h2>美容師１です</h2>
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


<?php include "../settings/common_js.php" ?>
</body>
</html>
