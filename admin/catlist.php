<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../class/cartegory.php';?>
<?php 
	$cat = new cartegory();
    /* if (!isset($_GET['delid'])) {
        $id = $_GET['delid'];

		$delcat = $cat->del_cartegory($id) ;
    } */
	if (!isset($_GET['delid']) || $_GET['delid'] == NULL) {
        /* echo "<script>window.location = 'catlist.php'</script>"; */
    } else {
        $id = $_GET['delid'];
		$delcat = $cat->del_cartegory($id) ;
    }
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Loại sản phẩm</h2>
                <div class="block"> 
				<?php
                if(isset($delcat)){
                    echo $delcat;
                }
                ?>       
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>STT</th>
							<th>Tên loại sản phẩm</th>
							<th>Tùy chọn</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$show_cart = $cat->show_cartegory();
								if($show_cart){
								$i = 0 ;
								while ($result = $show_cart->fetch_assoc()){
									$i++;

							
						?>
						<tr class="odd gradeX">
							<td><?php echo $i?></td>
							<td><?php echo $result['catname']?></td>
							<td><a href="catedit.php?catid=<?php echo $result['catid']?>">Sửa</a> || 
							<a onclick="return confirm('Are you sure you want to delete')" href="?delid=<?php echo $result['catid']?>">Xóa</a></td>
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

