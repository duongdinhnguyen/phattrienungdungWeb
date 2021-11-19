<?php include ("config/sql_connect.php");
   
?>
<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="css/do_regist_css.css"/>
<?php
    
    // quay trở lại login.php khi chưa nhập đủ thông tin login
        if(!isset($_SESSION["notification"])){
            header("location:login.php");
        }
    
    
    function tinhtuoi($tuoi){
        echo 2021-$tuoi;
    }

    $name= trim($_POST["regist_name"]," ");
    $gioitinh= trim($_POST["regist_gioitinh"]," ");
    $phankhoa= trim($_POST["regist_phankhoa"]," ");
    $age= trim($_POST["regist_age"]," ");

?>

<body>
    <div class="content">
        <form class="do-regist_form" action="complete_regist.php" method="POST">
            <div class="do_regist_all_item">
                <div class="do_regist_item">
                    <p class="description_item"><?php echo "Họ và tên"?>    </p>
                    <input class="input_item" readonly name="do-regist_name" value="<?php echo $name;   ?>"></input>
                </div>

                <div class="do_regist_item">
                    <p class="description_item"><?php echo "Giới tính"?>    </p>
                    <input class="input_item" readonly value="<?php echo $gioitinh;   ?>"  name="do-regist_gender"></input>
                </div>

                <div class="do_regist_item">
                    <p class="description_item"><?php echo "Phân Khoa"?>    </p>
                    <input class="input_item" readonly value="<?php echo $phankhoa;   ?>" name="do-regist_faculty"></input>
                </div>

                <div class="do_regist_item">
                    <p class="description_item"><?php echo "Tuổi"?>    </p>
                    <input class="input_item" readonly value="<?php echo tinhtuoi($age);   ?> " name="do-regist_age"></input>
                </div>
                <div class="do_regist_item">
                    <button class="submit_form" name="do-regist_submit">Đăng kí</button>

                </div>
            </div>
        
        </form>
    </div>

</body>


</html>