<?php
include 'include/header.php';
// include 'include/slider.php';
?>	
<?php
	 if (!isset($_GET['proid']) || $_GET['proid'] == NULL) {
        echo "<script>window.location = '404.php'</script>";
    } else {
        $id = $_GET['proid'];
    }

	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
		$quantity = $_POST['quantity'];
		$addtocart = $ct->add_to_cart($id,$quantity) ;

}


?>
 <div class="main">
    <div class="content">
    	<div class="section group">
			<?php
			$get_product_details = $product->get_details($id);
			if($get_product_details){
				while($result_details = $get_product_details->fetch_assoc()){

				

			?>
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="admin/uploads/<?php echo $result_details['image'] ?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
				<h2><?php echo $result_details['productname'] ?> </h2>
					<p><?php echo $fm->textShorten($result_details['productdesc'], 100 )?> </p>					
					<div class="price">
						<p>Giá: <span><?php echo $result_details['price'].' '.'VNĐ' ?> </span></p>
						<p>Loại sản phẩm: <span><?php echo $result_details['catname'] ?> </span></p>
						<p>Thương hiệu:<span><?php echo $result_details['brandname'] ?> </span></p>
					</div>
				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1" min="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Mua"/>
						
					</form>
					<?php
							/* if(isset($addtocart)){
								echo '<span style="color:red; font-size:18px;">Sản phẩm đã có trong giỏ hàng </span>';
							} */
						?>				
				</div>
			</div>
			<div class="product-desc">
			<h2>Thông tin chi tiết sản phẩm</h2>
			<p><?php echo $fm->textShorten($result_details['productdesc'], 200 )?></p>
	    </div>
				
	</div>
			<?php
				}
			}
			?>
				<div class="rightsidebar span_3_of_1">
					<h2>Loại sản phẩm</h2>
					<ul>
					<?php
						$getall_cartegory = $cat->show_cartegory_fontend();
						if($getall_cartegory){
							while($result_allcat = $getall_cartegory->fetch_assoc()){
					?>

				      <li><a href="productbycat.php?catid=<?php echo $result_allcat['catid']?>"><?php echo $result_allcat['catname']?></a></li>
    				<?php
						}
					}
					?>
					</ul>
				</div>
 				</div>
 		</div>
 	</div>
<?php
include 'include/footer.php';
?>	

