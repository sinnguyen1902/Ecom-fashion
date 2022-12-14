<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../class/brand.php';?>
<?php include '../class/cartegory.php';?>
<?php include '../class/product.php';?>


<?php
    if (!isset($_GET['productid']) || $_GET['productid'] == NULL) {
        echo "<script>window.location = 'productlist.php'</script>";
    } else {
        $id = $_GET['productid'];
    }
 
	$pd = new product();
	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

			$updateproduct = $pd->update_product($_POST,$_FILES,$id) ;

	}


?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa sản phẩm</h2>
        <div class="block">     
        <?php
                if(isset($updateproduct)){
                    echo $updateproduct;
                }
                ?> 
                <?php
                $get_product_by_id = $pd->getproductbyid($id);
                if($get_product_by_id){
                    while($result_product = $get_product_by_id->fetch_assoc()){

                
                ?>             
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="productname" value="<?php echo $result_product['productname']?>" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="cartegory">
                            <option>----Select Category---</option>
                            <?php
                             $cat = new cartegory();
                            $catlist = $cat->show_cartegory();
                            if($catlist){
                                while($result = $catlist->fetch_assoc()){ 
                            ?>
                            <option
                            <?php 
                                if($result['catid']==$result_product['catid']){ echo 'selected';}
                            
                            ?>
                            value="<?php  echo $result['catid']?>"> <?php  echo $result['catname']?></option>
                                <?php
                                       } 
                                    }
                                ?>

                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="brand">
                            <option>---Select Brand---</option>
                            <?php
                             $brand = new brand();
                            $brandlist = $brand->show_brand();
                            if($catlist){
                                while($result = $brandlist->fetch_assoc()){ 
                            ?>
                            <option
                            <?php 
                                if($result['brandid']==$result_product['brandid']){ echo 'selected';}
                            
                            ?>
                            value="<?php  echo $result['brandid']?>"><?php  echo $result['brandname']?>1</option>
                            <?php
                                       } 
                                    }
                                ?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea name="productdesc" class="tinymce"><?php echo $result_product['productdesc']?></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input name="price" type="text" value="<?php echo $result_product['price']?>" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <img src="uploads/<?php echo $result_product['image']?>" width="80"><br>
                        <input name="image" type="file" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Select Type</option>
                            <?php 
                            if($result_product['type']==0){ 
                            ?>
                            <option selected value="0">Nổi bật</option>
                            <option value="1">Không nổi bật</option>
                            <?php
                            }else{
                            ?>
                            <option value="0">Nổi bật</option>
                            <option selected value="1">Không nổi bật</option>
                            <?php
                            
                            }
                            ?>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Sửa" />
                    </td>
                </tr>
            </table>
            </form>
            <?php
            }
            }
            ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


