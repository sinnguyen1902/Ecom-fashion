<?php
include 'include/header.php';
// include 'include/slider.php';
?>
<?php

		if (!isset($_GET['cartId']) || $_GET['cartId'] == NULL) {
			/* echo "<script>window.lobrandion = 'brandlist.php'</script>"; */
		} else {
			$cartId = $_GET['cartId'];
			$delcart = $ct->del_product_cart($cartId) ;
		}

	  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
		$cartid = $_POST['cartid'];
		$quantity = $_POST['quantity'];
		$update_quantity_cart = $ct->update_quantity_cart($quantity,$cartid);
	  }
?>
<?php
	//cho cart gio hang cap nhat dung
	/* if(isset($_GET['id'])){
		echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
	} */
?>

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
				
			    	<h2 style="width: 100%;">Giỏ hàng của bạn</h2>
					<?php
					 if(isset($update_quantity_cart)){
						echo '<span style="color: green;">Cập nhật thành công</span>';
					}
				?>
					<?php
					 if(isset($delcart)){
						echo $delcart;
					}
				?>
						<table class="tblone">
							<tr>
								<th width="20%">Tên sản phẩm</th>
								<th width="10%">Hình ảnh</th>
								<th width="15%">Giá</th>
								<th width="25%">Số lượng</th>
								<th width="20%">Tổng cộng</th>
								<th width="10%">Tùy chọn</th>
							</tr>

							<?php

								$get_product_cart = $ct->get_product_cart();
								if($get_product_cart){
									$subtotal = 0;
									while($result = $get_product_cart->fetch_assoc()){
										

									
							?>
							<tr>
								<td><?php echo $result['productname']?></td>
								<td><img src="admin/uploads/<?php echo $result['image']?>" alt=""/></td>
								<td><?php echo $result['price'].' '.'VNĐ'?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="cartid" value="<?php echo $result['cartid']?>"/>
										<input type="number" name="quantity" min="0" value="<?php echo $result['quantity']?>"/>
										<input type="submit" name="submit" value="Cập nhật"/>
									</form>
								</td>
								<td><?php
								$total = $result['price'] * $result['quantity'];
								echo $total;
								?></td>
								<td><a href="?cartId=<?php echo $result['cartid']?>">Xóa</a></td>
							</tr>
							<?php
								$subtotal += $total;
									}
								}
								?>

							
						</table>
						<?php
						$check_cart = $ct->check_cart();
								  if($check_cart){
									
								
							?>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Thành tiền : </th>
								<td> <?php
									echo $subtotal;
									session::set('sum',$subtotal);
								?></td>
							</tr>
					   </table>
					   <?php
						}else{
							echo 'Giỏ hàng rỗng';
						}
					   ?>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

<?php
include 'include/footer.php';
?>