<?php
    $filepath = realpath(dirname(__FILE__));
    include ($filepath.'/../lib/session.php'); 
    Session::checkLogin();

    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');

?>

<?php 
    
    class adminlogin {

        private $db;
        private $fm;
        public  function __construct(){
            $this->db = new Database();
            $this->fm = new Format();

        }
        
        public function login_admin($adminuser, $adminpass){
            $adminuser = $this->fm->validation($adminuser);           
            $adminpass = $this->fm->validation($adminpass);     
            
            $adminuser = mysqli_real_escape_string($this->db->link, $adminuser);
            $adminpass = mysqli_real_escape_string($this->db->link, $adminpass);

            if(empty($adminuser) || empty($adminpass)){
                 $a = "User and pass must be not empty";
                 return $a;
            }else {
                $query = "SELECT * FROM tbl_admin WHERE adminuser = '$adminuser' AND adminpass = '$adminpass' limit 1";

                $result = $this->db->select($query);
                if($result != false){
                    $value = $result->fetch_assoc();
                    Session::set('adminlogin',true);
                    Session::set('adminid', $value['adminid']);
                    Session::set('adminuser', $value['adminuser']);
                    Session::set('adminpass', $value['adminpass']);
                    Session::set('adminname', $value['adminname']);
                    header('Location:index.php');
                }else{
                    $alert = "User and Pass not match";
                    return $alert;
                }
            }
        }
     }

?>