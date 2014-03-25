
<h1>美容室名から探す</h1>

<form class="salon-form" method='get' action="{$base_url}/salon/search/">
   <div class="row collapse">
      <div class="small-10 columns">
        <input type="text" name='query' placeholder="美容室名を入力してください">
      </div>
      <div class="small-2 columns">
        <button type="submit" class="button postfix"><i class="fa fa-search"></i></a>
      </div>
  </div>
</form>
<p><i class="fa fa-user"></i> おすすめの美容室</p>

<ul class="ranking" data-orbit>
    <li data-orbit-slide="headline-1">
      <div>
        <h2>美容室ランキング</h2>
        <ul class="ranking__items">
<?php
                  for ($i=0; $i < 5; $i++) {
                    echo <<< EOF
  <li class="ranking__item">
    <img src='$base_url/img/{$res[$i]["img1"]}.jpg' width='200'>
    <a href='/salon/{$res[$i]["salon_id"]} 'class="button">{$res[$i]["name"]}</a>
  </li>
EOF;
                  }
                ?>
      </ul>
      </div>
    </li>
    <li data-orbit-slide="headline-2">
      <div>
        <h2>Headline 2</h2>
        <h3>Subheadline</h3>
      </div>
    </li>
</ul>

<p><i class="fa fa-tag"></i> タグから探す</p>
<ul class="" data-orbit>
    <li data-orbit-slide="headline-1">
      <div class="tags">
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
