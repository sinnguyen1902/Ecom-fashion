<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../class/brand.php';?>
<?php include '../class/cartegory.php';?>
<?php include '../class/product.php';?>
<?php include_once '../helpers/format.php';?>

<?php 
	$pd = new product();
	$fm = new Format();
	if (!isset($_GET['productid']) || $_GET['productid'] == NULL) {
        /* echo "<script>window.lobrandion = 'brandlist.php'</script>"; */
    } else {
        $id = $_GET['productid'];
		$delbpro = $pd->del_product($id) ;
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách sản phẩm</h2>
        <div class="block">  
		<?php
                if(isset($delbpro)){
                    echo $delbpro;
                }
                ?> 
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>STT</th>
					<th>Tên sản phẩm</th>
					<th>Giá</th>
					<th>Hình ảnh</th>
					<th>Tên danh mục</th>
					<th>Tên Thương hiệu</th>
					<th>Mô tả</th>

					<th>Loại</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$pdlist = $pd->show_product();
				if($pdlist){
					$i = 0;
					while($result = $pdlist->fetch_assoc()) {
						$i++;
				?>
				<tr class="odd gradeX">
					<td><?php echo $i?></td>
					<td><?php echo $result['productname']?></td>
					<td><?php echo $result['price']?></td>
					<td><img src="uploads/<?php echo $result['image']?>" width="80"></td>
					<td><?php echo $result['catname']?> </td>
					<td><?php echo $result['brandname']?></td>
					<td><?php
					echo $fm->textShorten($result['productdesc'],50)?></td>
					<td><?php
					if( $result['type'] == 0){
						echo 'Nổi bật';
					}else{
						echo 'Không nổi bật';
					}
					?></td>

					
					<td><a href="productedit.php?productid=<?php echo $result['productid']?>">Sửa</a> ||
					 <a href="?productid=<?php echo $result['productid']?>">Xóa</a></td>
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
