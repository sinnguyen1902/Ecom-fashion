<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../class/brand.php';?>
<?php include '../class/cartegory.php';?>
<?php include '../class/product.php';?>


<?php
 
	$pd = new product();
	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
			$insertproduct = $pd->insert_product($_POST,$_FILES) ;

	}


?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm sản phẩm</h2>
        <div class="block">     
        <?php
                if(isset($insertproduct)){
                    echo $insertproduct;
                }
                ?>              
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tên</label>
                    </td>
                    <td>
                        <input type="text" name="productname" placeholder="Hãy nhập tên..." class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Loại sản phẩm</label>
                    </td>
                    <td>
                        <select id="select" name="cartegory">
                            <option>----Loại sản phẩm---</option>
                            <?php
                             $cat = new cartegory();
                            $catlist = $cat->show_cartegory();
                            if($catlist){
                                while($result = $catlist->fetch_assoc()){ 
                            ?>
                            <option value="<?php  echo $result['catid']?>"> <?php  echo $result['catname']?></option>
                                <?php
                                       } 
                                    }
                                ?>

                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Thương hiệu</label>
                    </td>
                    <td>
                        <select id="select" name="brand">
                            <option>---Thương hiệu---</option>
                            <?php
                             $brand = new brand();
                            $brandlist = $brand->show_brand();
                            if($catlist){
                                while($result = $brandlist->fetch_assoc()){ 
                            ?>
                            <option value="<?php  echo $result['brandid']?>"><?php  echo $result['brandname']?></option>
                            <?php
                                       } 
                                    }
                                ?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Mô tả</label>
                    </td>
                    <td>
                        <textarea name="productdesc" class="tinymce"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Giá</label>
                    </td>
                    <td>
                        <input name="price" type="text" placeholder="Hãy nhập giá..." class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Hình ảnh</label>
                    </td>
                    <td>
                        <input name="image" type="file" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Nổi bật/Không nổi bật</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>---Loại---</option>
                            <option value="1">Nổi bật</option>
                            <option value="0">Không nổi bật</option>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Lưu" />
                    </td>
                </tr>
            </table>
            </form>
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


