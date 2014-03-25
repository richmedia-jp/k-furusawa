<div>

  <h1>
    <i class="fa fa-search"></i>
    キーワード: <?php echo $query?>
  </h1>

  <div class="search-results">

    <?php
    if(count($res) > 0 ){
      for ($i=0; $i < count($res); $i++) {
          echo <<< EOF
<div class="search-result">
  <div class="salon-img">
    <a href="$base_url/salon/{$res[$i]['salon_id']}"><img src="$base_url/img/{$res[$i]['img1']}.jpg"></a>
  </div>

  <div class="salon-caption">
    <h3><a href="/salon/{$res[$i]['salon_id']}">{$res[$i]['name']}</a></h3>
    <label><i class="fa fa-phone-square"></i> {$res[$i]['tel']}</label>
    <ul class="tags">
EOF;
    if(count($tags[$i]) > 0){
      for ($j=0; $j < count($tags[$i]); $j++) {
        echo '<li><a href="#">'.$tags[$i][$j][0]["name"].'</a></li>';
      }
    }
    echo <<< EOF
    </ul>
    <h3>{$res[$i]['intro_title']}</h3>
    <p></p>
  </div>
</div>
EOF;
      }
    }
    else {
      echo "<h2>「".$query."」に一致する情報は見つかりませんでした。</h2>";
    }
?>
    <!-- <div class="search-result">

      <div class="salon-img">
        <img src="http://placehold.it/200x200/A92B48/fff?text=salon_image">
      </div>

      <div class="salon-caption">
        <h3>美容室名</h3>
        <label><i class="fa fa-phone-square"></i> 0000-00-0000</label>
        <ul>
          <li><a href="#">タグ1</a></li>
          <li><a href="#">タグ2</a></li>
          <li><a href="#">タグ3</a></li>
        </ul>
        <h3>店舗紹介タイトル</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div> -->

  </div>
</div>
