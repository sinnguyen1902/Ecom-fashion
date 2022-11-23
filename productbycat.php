<?php
include 'include/header.php';
//include 'include/slider.php';
?>
<?php 

    if (!isset($_GET['catid']) || $_GET['catid'] == NULL) {
        echo "<script>window.location = '404.php'</script>";
    } else {
        $id = $_GET['catid'];
    }


	/* if ($_SERVER['REQUEST_METHOD'] === 'POST'){
		$catname = $_POST['catname'];
		$updatecat = $cat->update_cartegory($catname,$id) ;

	} */

    

?> 	

 <div class="main">
    <div class="content">
    	<div class="content_top">
		<?php
			 	$name_cat = $cat->get_name_by_cat($id);
				 if($name_cat){
					 $result_name = $name_cat->fetch_assoc();

					 
			  ?>
    		<div class="heading">
    		<h3>Sản phẩm:<?php echo $result_name['catname']?></h3>
    		</div>
			<?php
				 }else{
					 echo '<div class="heading">
					 <h3>Không có sản phẩm nào!!</h3>
					 </div>';
				 }  
				?>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
			  <?php
			 	$productbycat = $cat->get_product_by_cat($id);
				 if($productbycat){
					 while($result = $productbycat->fetch_assoc()){

					 
			  ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview-3.php"><img src="admin/uploads/<?php echo $result['image']?>" alt="" /></a>
					 <h2><?php echo $result['productname']?> </h2>
					 <p><?php echo $fm->textShorten($result['productname'],50)?></p>
					 <p><span class="price"><?php echo $result['price'].' '.'VNĐ'?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productid']?>" class="details">Details</a></span></div>
				</div>
				<?php
					}
				} 
				?>
			</div>

	
	
    </div>
 </div>
 <?php
include 'include/footer.php';
?>