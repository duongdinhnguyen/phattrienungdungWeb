<?php include "sql_connect.php";?>
<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="regist_css.css">
    
    
    <?php
    // Khoi tao doi tuong chua data
        class DataInput{
            public $name;
            public $gioitinh;
            public $phankhoa;
            public $age;
            function set_name($name) {
                $this->name = $name;
              }
              function get_name() {
                return $this->name;
              }
              function set_gioitinh($gioitinh) {
                $this->gioitinh = $gioitinh;
              }
              function get_gioitinh() {
                return $this->gioitinh;
              }
              function set_phankhoa($phankhoa) {
                $this->phankhoa = $phankhoa;
              }
              function get_phankhoa() {
                return $this->phankhoa;
              }
              function set_age($age) {
                $this->age = $age;
              }
              function get_age() {
                return $this->age;
              }
        }
        $ERROR="";
        $dataInput= new DataInput();
        // Kiểm tra dữ liệu
        if(isset($_REQUEST["sign_in"])){
           
             if(empty($_POST["name"])) {
                $ERROR="Hãy nhập tên.";
            }
            else if(empty($_POST["gioitinh"])){
                $ERROR="Hãy nhập giới tính.";
            }
            else if(empty($_POST["phankhoa"])){
                $ERROR="Hãy nhập phân khoa.";
            }
            else if(empty($_POST["age"])){
                $ERROR="Hãy nhập năm sinh.";
            }
            else if($_POST["name"] &&  $_POST["gioitinh"]  &&  $_POST["phankhoa"]  &&  $_POST["age"]){
                $dataInput->set_name($_POST["name"]);
                $dataInput ->set_gioitinh($_POST["gioitinh"]);
                $dataInput ->set_phankhoa($_POST["phankhoa"]);
                $dataInput->set_age($_POST["age"]);
                include("do_regist.php"); // thuc hien cac lenh o do_regist
                exit(); // qua trang moi
           }
           
        }
    ?>  
<head></head>
<body>

   <form class="form-login" action="<?php $_PHP_SELF ?>" method = "POST"> <!-- action : ham do_regist là hàm xử lý-->
        
        <p class="error" id="error"><?php  echo $ERROR; ?></p>
    <p>
        <b class="account-password"><?php echo "Họ và tên"?></b>
        <input type="text" class="input" name ="name"> </input>
        
    </p>
        <br/>
    <p>
        <b class="account-password"><?php echo "Giới tính"?></b>
        <?php 
            $sql= "SELECT * FROM gender";
            $data= $conn->prepare($sql);
            $data->execute();
            foreach($data as $row){  ?>
                    <input class="gioitinh" type="radio" name="gioitinh"  value="<?php  print($row['name']);?>"> <?php  print($row['name']);?></input>
           <?php 
          }
        ?>
        
    </p>
        <br/>
    <p>
        <b class="account-password"><?php   echo "Phân Khoa"  ?></b>
            <div class="select">
                <select name="phankhoa"> <!-- để name ở đây mới lấy được phankhoa, tại sao thế ạ? -->
                    
                <?php 
                $sql= "SELECT * FROM faculty";
                $data= $conn->prepare($sql);
                $data->execute();
                foreach($data as $row){  ?>
                  
                    <option class="option" name="phankhoa" ><?php  print($row['value']);?></option>
                <?php } ?>

                    
                   
                </select>
            </div>
    </p>
        <br/>
    <p>
        <b class="account-password"><?php echo "Năm sinh"?></b>
        <input type="text" class="input" name="age"> </input>
    </p>
        <br/>
    <p >
        <input type="submit" value="<?php echo "Đăng ký" ?>" class="sign_in" name="sign_in"></input>
        
    </p>        
    </form>
    
    
<body> 
</html>
