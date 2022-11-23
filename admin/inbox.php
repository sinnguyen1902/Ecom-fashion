<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../class/cart.php');
?>
<?php
	$ct = new cart();
	if (isset($_GET['shifid'])) {
        $id = $_GET['shifid'];
        $time = $_GET['time'];
        $price = $_GET['price'];
		$shifted = $ct->shifted($id,$time,$price);
    } 
	if (isset($_GET['delshifid'])) {
        $id = $_GET['delshifid'];
        $time = $_GET['time'];
        $price = $_GET['price'];
		$del_shifted = $ct->del_shifted($id,$time,$price);
    } 

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
				<?php
				if(isset($shifted)){	
					echo $shifted;
				}
				?>
				<?php
				if(isset($del_shifted)){	
					echo $del_shifted;
				}
				?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>STT</th>
							<th>Ngày đặt hàng</th>
							<th>Sản phẩm</th>
							<th>Số lượng</th>
							<th>Giá</th>
							<th>ID khách hàng</th>
							<th>Địa chỉ</th>
							<th>Tùy Chọn</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$ct = new cart();
						$get_inbox_cart = $ct->get_inbox_cart();
						if($get_inbox_cart){
							$i = 0;
							while($result = $get_inbox_cart->fetch_assoc()){
								$i++;
							
						?>
						<tr class="odd gradeX">
							<td><?php echo $i?></td>
							<td><?php echo $result['date']?></td>
							<td><?php echo $result['productname']?></td>
							<td><?php echo $result['quantity']?></td>
							<td><?php echo $result['price']?></td>
							<td><?php echo $result['customer_id']?></td>
							<td><a href="customer.php?customerid=<?php echo $result['customer_id']?>">Xem địa chỉ</a></td>
							<td>
						<?php
							if($result['status']==0){

							
						?>
							<a href="?shifid=<?php echo $result['id']?>&price=<?php echo $result['price']?>&time=<?php echo $result['date']?>">Đang xử lý...</a>
							<?php
							}elseif($result['status']==1){
							?>
							<?php
								echo 'Đang vận chuyển...';
							?>
							<?php
							}elseif($result['status']==2){
							?>
								<a href="?delshifid=<?php echo $result['id']?>&price=<?php echo $result['price']?>&time=<?php echo $result['date']?>"> Xóa</a>
							<?php
							}
							
							?>
							
							

							

							</td>

						</tr>



						<?php
						}
					}
						?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
