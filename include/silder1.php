<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
				<?php
					$getlastestdell = $product->getlastestdell();
					if($getlastestdell){
						while($resultdell = $getlastestdell->fetch_assoc()){

				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php"> <img src="admin/uploads/<?php echo $resultdell['image']?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Dell</h2>
						<p><?php echo $resultdell['productname']?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resultdell['productid']?>">Giỏ hàng</a></span></div>
				   </div>
			   </div>
			   <?php
			   }
			}
			   ?>
			   <?php
					$getlastestsamsung = $product->getlastestsamsung();
					if($getlastestsamsung){
						while($resultsamsung = $getlastestsamsung->fetch_assoc()){

				?>
			   
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="preview.php"><img src="admin/uploads/<?php echo $resultsamsung['image']?>" alt=""  ></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Samsung</h2>
						  <p><?php echo $resultsamsung['productname']?></p>
						  <div class="button"><span><a href="details.php?proid=<?php echo $resultsamsung['productid']?>">Giỏ hàng</a></span></div>
					</div>
				</div>
			</div>

			<?php
			   }
			}
			   ?>

				<?php
					$getlastestapple = $product->getlastestapple();
					if($getlastestapple){
						while($resultapple = $getlastestapple->fetch_assoc()){

				?>

			<div class="section group">
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php"> <img src="admin/uploads/<?php echo $resultapple['image']?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Apples</h2>
						<p><?php echo $resultapple['productname']?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resultapple['productid']?>">Giỏ hàng</a></span></div>
				   </div>
			   </div>	
			   <?php
			   }
			}
			   ?>	

					<?php
					$getlastesthuawie= $product->getlastesthuawie();
					if($getlastesthuawie){
						while($resulthuawie = $getlastesthuawie->fetch_assoc()){

				?>
			   
			   
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="preview.php"><img src="admin/uploads/<?php echo $resulthuawie['image']?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Huawie</h2>
						  <p><?php echo $resulthuawie['productname']?></p>
						  <div class="button"><span><a href="details.php?proid=<?php echo $resulthuawie['productid']?>">Giỏ hàng</a></span></div>
					</div>
				</div>
				<?php
			   }
			}
			   ?>
			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<li><img src="images/5.jpg" alt=""/></li>
						<li><img src="images/6.jpg" alt=""/></li>
						<li><img src="images/7.jpg" alt=""/></li>
						<li><img src="images/8.jpg" alt=""/></li>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
        <div class="clear"></div>
  </div>