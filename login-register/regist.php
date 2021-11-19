<?php include "config/sql_connect.php";
     session_start();
?>
<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="css/regist_css.css">
    
    <?php
        //quay trở lại login.php khi chưa nhập đủ thông tin
        if(!isset($_SESSION["notification"])){
            header("location:login.php");
        }

       
        // Kiểm tra dữ liệu
        if(isset($_REQUEST["regist_submit"])){
           
             if(empty($_POST["regist_name"])) {
                $_SESSION["notification"]="Hãy nhập tên.";
            }
            else if(empty($_POST["regist_gioitinh"])){
                $_SESSION["notification"]="Hãy nhập giới tính.";
            }
            else if(empty($_POST["regist_phankhoa"])){
                $_SESSION["notification"]="Hãy nhập phân khoa.";
            }
            else if(empty($_POST["regist_age"])){
                $_SESSION["notification"]="Hãy nhập năm sinh.";
            }
            else if($_POST["regist_name"] &&  $_POST["regist_gioitinh"]  &&  $_POST["regist_phankhoa"]  &&  $_POST["regist_age"]){
                $_SESSION["notification"]="Đăng kí thành công";
                include("do_regist.php"); // thuc hien cac lenh o do_regist
                exit(); // qua trang moi
           }
           
        }
    ?>  
<head></head>
<body>
    <div class="content">
        <form class="regist_form" action="<?php $_PHP_SELF ?>" method = "POST"> <!-- action : ham do_regist là hàm xử lý-->
            <div class="regist_all_item">
                <div class="regist_item">
                    <p class="regist_notification" id="error">
                        <?php 
                        echo  $_SESSION["notification"];
                        
                        ?>
                    </p>
                </div>
                <div class="regist_item">
                    <p class="description_item"><?php echo "Họ và tên"?></p>
                    <input type="text" class="input_item" name ="regist_name" > </input>
                </div>
                <div class="regist_item">
                    <p class="description_item"><?php echo "Giới tính"?></p>
                    <div class="select_genders">
                        <?php 
                                $sql= "SELECT * FROM gender";
                                $data= $conn->prepare($sql);
                                $data->execute();
                                foreach($data as $row){  ?>
                                        <div class="select_gender_item">
                                            <input class="gioitinh" type="radio" name="regist_gioitinh"  value="<?php  print($row['name']);?>"> 
                                            <p><?php  print($row['name']);?></p>
                                        </div>
                            <?php 
                            }
                            ?>
                    </div>
                </div>
                <div class="regist_item">
                    <p class="description_item"><?php   echo "Phân Khoa"  ?></p>
                            <div class="select">
                                <select name="regist_phankhoa" class="input_item"> <!-- để name ở đây mới lấy được phankhoa, tại sao thế ạ? -->
                                    
                                <?php 
                                $sql= "SELECT * FROM faculty";
                                $data= $conn->prepare($sql);
                                $data->execute();
                                foreach($data as $row){  ?>
                                
                                    <option class="input_item" name="regist_phankhoa" ><?php  print($row['name']);?></option>
                                <?php } ?>

                                    
                                
                                </select>
                            </div>
                </div>
                <div class="regist_item">
                    <p class="description_item"><?php echo "Năm sinh"?></p>
                    <input type="text" class="input_item" name="regist_age" > </input>
                </div>
                <div class="regist_item">
                    <input type="submit" value="<?php echo "Đăng ký" ?>" class="submit_form" name="regist_submit"></input>    
                </div>
            </div>
        </form>
    </div>
    
    
<body> 
</html>
