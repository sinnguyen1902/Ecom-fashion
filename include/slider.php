<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
	
				<div class="listview_1_of_2 images_1_of_2" style="width: 121%;padding: 39.5%;background:#3e3d42;">
					<div style="margin-top: -170px;margin-left: -160px;"class="rightsidebar span_3_of_1">
					<!-- <h2>Loại sản phẩm</h2> -->
					<ul>
					<?php
						$getall_cartegory = $cat->show_cartegory_fontend();
						if($getall_cartegory){
							while($result_allcat = $getall_cartegory->fetch_assoc()){
					?>

				      <li><a style="color: white;font-size:18px" href="productbycat.php?catid=<?php echo $result_allcat['catid']?>"><?php echo $result_allcat['catname']?></a></li>
    				<?php
						}
					}
					?>
					</ul>
				</div>
				    
			   </div>			
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