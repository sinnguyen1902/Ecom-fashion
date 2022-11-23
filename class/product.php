<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');

?>

<?php 
    
    class product {

        private $db;
        private $fm;
        public  function __construct(){
            $this->db = new Database();
            $this->fm = new Format();

        }
        
        public function insert_product($data,$files){          
            
            $productname = mysqli_real_escape_string($this->db->link, $data['productname']);
            $brand       = mysqli_real_escape_string($this->db->link, $data['brand']);
            $cartegory   = mysqli_real_escape_string($this->db->link, $data['cartegory']);
            $type        = mysqli_real_escape_string($this->db->link, $data['type']);
            $price       = mysqli_real_escape_string($this->db->link, $data['price']);
            $productdesc = mysqli_real_escape_string($this->db->link, $data['productdesc']);
            // kiem tra hinh anh
            $permited = array('jpg','jpeg','png','gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.',$file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;

            if($productname == "" || $brand == "" || $cartegory == "" || $type == "" || 
                $price == "" || $productdesc == "" || $file_name == ""){
                 $a = "<span class='err'> Không thể rỗng </span>";
                 return $a;
            }else {
                move_uploaded_file($file_temp,$uploaded_image);
                $query = "INSERT INTO tbl_product(productname,brandid,catid,productdesc,type,price,image) 
                VALUES ('$productname','$brand','$cartegory','$productdesc','$type','$price','$unique_image')";

                $result = $this->db->insert($query);
                if($result){
                    $as ="<span class='success'> Thêm thành công </span>";
                    return $as;

                }else{
                    $as ="<span class='err'> Thêm không thành công </span>";
                    return $as;
                }
            }
        }

         public function show_product(){
            
            $query = "SELECT tbl_product.*,tbl_cartegory.catname,tbl_brand.brandname 
            FROM tbl_product INNER JOIN tbl_cartegory ON tbl_product.catid = tbl_cartegory.catid 
            INNER JOIN  tbl_brand ON tbl_product.brandid = tbl_brand.brandid 
            order by tbl_product.productid desc";
            /* $query = "SELECT *FROM tbl_product order by productid desc"; */

            $result = $this->db->select($query);
            return $result;
        }

        public function getproductbyid($id){
            $query = "SELECT * FROM tbl_product where productid = '$id'";

            $result = $this->db->select($query);
            return $result;
        }

        public function update_product($data,$files,$id){           
            
            $productname = mysqli_real_escape_string($this->db->link, $data['productname']);
            $brand       = mysqli_real_escape_string($this->db->link, $data['brand']);
            $cartegory   = mysqli_real_escape_string($this->db->link, $data['cartegory']);
            $type        = mysqli_real_escape_string($this->db->link, $data['type']);
            $price       = mysqli_real_escape_string($this->db->link, $data['price']);
            $productdesc = mysqli_real_escape_string($this->db->link, $data['productdesc']);
            // kiem tra hinh anh
            $permited = array('jpg','jpeg','png','gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.',$file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;

            if($productname == "" || $brand == "" || $cartegory == "" || $type == "" || 
                $price == "" || $productdesc == ""){
                 $a = "<span class='err'> Không thể rỗng </span>";
                 return $a;
           }else {
                if(!empty($file_name)){
                    if($file_name > 20000 ){
                        $a = "<span class='err'> Kích cỡ ảnh nhỏ hơn 1MB! </span>";
                        return $a;
                    }elseif(in_array($file_ext,$permited)=== false){
                        //echo "<span class="err"> Bạn có thê upload:-".implode(',',$permited). "</span>";
                        $a = "<span class='err'> Bạn có thê upload:-".implode(',',$permited)." </span>";
                        return $a;
                        
                    }
                    $query = "UPDATE tbl_product SET 
                    productname = '$productname',
                    brandid = '$brand', 
                    catid = '$cartegory', 
                    type = '$type' ,
                    productdesc = '$productdesc', 
                    price = '$price', 
                    image = '$unique_image'

                    WHERE productid = '$id'";


                }else{

                    $query = "UPDATE tbl_product SET 
                    productname = '$productname', 
                    brandid = '$brand', 
                    catid = '$cartegory' ,
                    type = '$type', 
                    productdesc = '$productdesc', 
                    price = '$price'

                    WHERE productid = '$id'";



                }



               $result = $this->db->update($query);
               if($result){
                   $as ="<span class='success'> Sửa thành công </span>";
                   return $as;

               }else{
                   $as ="<span class='err'> Sửa không thành công </span>";
                   return $as;
               }
           }

        }
        
        public function del_product($id){
            $query = "DELETE FROM tbl_product where productid = '$id'";

            $result = $this->db->delete($query);
            if($result){
                $as ="<span class='success'> Xóa thành công </span>";
                return $as;

            }else{
                $as ="<span class='err'> Xóa không thành công </span>";
                return $as;
            }
        } 

        //end backend
        
        public function getproduct_feathered(){
            $query = "SELECT * FROM tbl_product where  type = '1'";

            $result = $this->db->select($query);
            return $result;
        }
        public function getproduct_new(){
            $query = "SELECT * FROM tbl_product order by productid desc limit 4";

            $result = $this->db->select($query);
            return $result;
        }
        public function getproduct_new1(){
            $query = "SELECT * FROM tbl_product order by productid desc";

            $result = $this->db->select($query);
            return $result;
        }
        public function get_details($id){
            $query = "SELECT tbl_product.*,tbl_cartegory.catname,tbl_brand.brandname 
            FROM tbl_product INNER JOIN tbl_cartegory ON tbl_product.catid = tbl_cartegory.catid 
            INNER JOIN  tbl_brand ON tbl_product.brandid = tbl_brand.brandid 
            where tbl_product.productid = '$id'
            ";
            

            $result = $this->db->select($query);
            return $result;

     }

        //end backend function

        public function getlastestdell(){
            $query = "SELECT * FROM tbl_product where brandid = '7' order by productid desc limit 1 ";

            $result = $this->db->select($query);
            return $result;
        }
        public function getlastestapple(){
            $query = "SELECT * FROM tbl_product where brandid = '6' order by productid desc limit 1 ";

            $result = $this->db->select($query);
            return $result;
        }
        public function getlastesthuawie(){
            $query = "SELECT * FROM tbl_product where brandid = '8' order by productid desc limit 1 ";

            $result = $this->db->select($query);
            return $result;
        }
        public function getlastestsamsung(){
            $query = "SELECT * FROM tbl_product where brandid = '5' order by productid desc limit 1 ";

            $result = $this->db->select($query);
            return $result;
        }
    }

?>