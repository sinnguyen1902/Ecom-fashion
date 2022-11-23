<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');

?>

<?php 
    
    class cartegory {

        private $db;
        private $fm;
        public  function __construct(){
            $this->db = new Database();
            $this->fm = new Format();

        }
        
        public function insert_cartegory($catname){
            $catname = $this->fm->validation($catname);           
            
            $catname = mysqli_real_escape_string($this->db->link, $catname);

            if(empty($catname)){
                 $a = "<span class='err'> Không thể rỗng </span>";
                 return $a;
            }else {

                $query = "INSERT INTO tbl_cartegory(catname) VALUES ('$catname')";

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

        public function show_cartegory(){
            
            $query = "SELECT *FROM tbl_cartegory order by catid desc";

            $result = $this->db->select($query);
            return $result;
        }

        public function getcatbyid($id){
            $query = "SELECT * FROM tbl_cartegory where catid = '$id'";

            $result = $this->db->select($query);
            return $result;
        }

        public function update_cartegory($catname,$id){
            $catname = $this->fm->validation($catname);           
            
            $catname = mysqli_real_escape_string($this->db->link, $catname);
            $id = mysqli_real_escape_string($this->db->link, $id);

            if(empty($catname)){
                $a = "<span class='err'> Không thể rỗng </span>";
                return $a;
           }else {

               $query = "UPDATE tbl_cartegory SET catname = '$catname' WHERE catid = '$id'";

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
        public function del_cartegory($id){
            $query = "DELETE FROM tbl_cartegory where catid = '$id'";

            $result = $this->db->delete($query);
            if($result){
                $as ="<span class='success'> Xóa thành công </span>";
                return $as;

            }else{
                $as ="<span class='err'> Xóa không thành công </span>";
                return $as;
            }
        }

        
        public function show_cartegory_fontend(){
            
            $query = "SELECT *FROM tbl_cartegory order by catid desc";

            $result = $this->db->select($query);
            return $result;
        }

        public function get_product_by_cat($id){
            
            $query = "SELECT *FROM tbl_product where catid = '$id' order by catid desc limit 8";

            $result = $this->db->select($query);
            return $result;
        }


        public function get_name_by_cat($id){
            
            $query = "SELECT tbl_product.*,tbl_cartegory.catname,tbl_cartegory.catname 
            FROM tbl_cartegory,tbl_product where tbl_product.catid=tbl_cartegory.catid
                                            and tbl_product.catid = '$id'";
                                            

            $result = $this->db->select($query);
            return $result;
        }

     }

?>