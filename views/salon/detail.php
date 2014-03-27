
<div class="salon-detail">
	<h1><img src="<?php echo $base_url; ?>/img/shop.png"><?php echo $res["name"]?></h1>
	  <div class="salon-content">

	      <div class="salon-img">
	        <img src="<?php echo $base_url; ?>/img/<?php echo $res["img1"]?>.jpg">
	        <div class="salon-imgs">
		<img src="<?php echo $base_url; ?>/img/<?php echo $res["img1"]?>.jpg">
		<img src="http://placehold.it/100x100/A92B48/fff?text=salon_image2">
		<img src="http://placehold.it/100x100/A92B48/fff?text=salon_image3">
	        </div>
	      </div>


	      <div class="salon-caption">
		<ul class="tags">
	      	<?php
	      	for ($i=0; $i < count($tags); $i++) {
	      		echo '<li><a href="#">'.$tags[$i][0]["name"].'</a></li>';
	      	}
	      	?>
	      	</ul>

		<section>
		<h3><?php echo $res["intro_title"]?></h3>
		<p><?php echo $res["intro_body"]?></p>
		</section>

		<section>
		<h3>美容師の皆さん</h3>
			<ul class="salon__beauticians">
				<li class="salon__beautician">
					<img src="http://placehold.it/100x100/A92B48/fff?text=beautician_img">
					<label>美容師名</label>
				</li>
				<li class="salon__beautician">
					<img src="http://placehold.it/100x100/A92B48/fff?text=beautician_img">
					<label>美容師名</label>
				</li>
				<li class="salon__beautician">
					<img src="http://placehold.it/100x100/A92B48/fff?text=beautician_img">
					<label>美容師名</label>
				</li>
	      	  	</ul>
	      	  </section>

	      	  <section>
	      	  		<label><i class="fa fa-home"></i> 住所</label>
	      	  		<p><?php echo $res["address1"];echo $res["address2"]?></p>
	      	  		<label><i class="fa fa-clock-o"></i>営業時間</label>
	      	  		<p><?php echo $res["open_time"]?></p>
	      	  		<label><i class="fa fa-frown-o"></i>定休日</label>
	      	  		<p><?php echo $res["holiday"]?></p>
	      	  		<label><i class="fa fa-phone-square"></i> 電話番号</label>
	      	  		<p><?php echo $res["tel"]?></p>
	      	  </section>

	      </div>

	  </div>
</div>
