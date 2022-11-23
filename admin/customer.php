<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../class/customer.php');
include_once ($filepath.'/../helpers/format.php');
?>


<?php 
    $cs = new customer();
    if (!isset($_GET['customerid']) || $_GET['customerid'] == NULL) {
        echo "<script>window.location = 'inbox.php'</script>";
    } else {
        $id = $_GET['customerid'];
    }


	/* if ($_SERVER['REQUEST_METHOD'] === 'POST'){
		$catname = $_POST['catname'];
		$updatecat = $cat->update_cartegory($catname,$id) ;

	} */

    

?> 

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa danh mục</h2>
                <?php
                     $get_cat_name = $cs->show_customer($id);
                    if($get_cat_name){
                        while($result = $get_cat_name->fetch_assoc()){

                      
                ?>
               <div class="block copyblock"> 
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>Tên: </td>
                            <td>
                                <input type="text" style="width: 350px;" readonly="readonly" value="<?php  echo $result['name']  ?>" name="catname" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>SĐT: </td>
                            <td>
                                <input type="text" style="width: 350px;" readonly="readonly" value="<?php  echo $result['phone']  ?>" name="catname" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Thành phố/Tỉnh: </td>
                            <td>
                                <input type="text" style="width: 350px;" readonly="readonly" value="<?php  echo $result['city']  ?>" name="catname" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Quốc gia: </td>
                            <td>
                                <input type="text" style="width: 350px;" readonly="readonly" value="<?php  echo $result['country']  ?>" name="catname" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Địa chỉ: </td>
                            <td>
                                <input type="text" style="width: 350px;" readonly="readonly" value="<?php  echo $result['address']  ?>" name="catname" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Zip-code: </td>
                            <td>
                                <input type="text" style="width: 350px;" readonly="readonly" value="<?php  echo $result['zipcode']  ?>" name="catname" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Email: </td>
                            <td>
                                <input type="text" style="width: 350px;" readonly="readonly" value="<?php  echo $result['email']  ?>" name="catname" class="medium" />
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
<?php include 'inc/footer.php';?>