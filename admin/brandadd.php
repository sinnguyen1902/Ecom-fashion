<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../class/brand.php';?>


<?php 
	$brand = new brand();
	if ($_SERVER['REQUEST_METHOD'] === 'POST'){
		$brandname = $_POST['brandname'];
		$brandcat = $brand->insert_brand($brandname) ;

	}

?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm Thương hiệu</h2>
                <?php
                if(isset($insertbrand)){
                    echo $insertbrand;
                }
                ?>
               <div class="block copyblock"> 
                 <form action="brandadd.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="brandname" placeholder="Thêm thương hiệu ..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Lưu" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>