<?php include ("sql_connect.php") ?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="do_regist_css.css"/>
<?php
    $arr= array("MAT"=>"Khoa học máy tính","DTS"=>"Khoa học dữ liệu");
    function checkphankhoa($pk,$arr){
        foreach($arr as $value=>$value1){
            if($value==$pk){
                echo $value1;
            }
        }
    }
    function tinhtuoi($tuoi){
        echo 2021-$tuoi;
    }
?>

<body>
    <form class="output" action="complete_regist.php" method="POST">

    <div>
    <p class="description"><?php echo "Họ và tên"?>    </p>
    <input name="Name" value="<?php echo $dataInput->name;   ?>"></input>
    </div>

    <div>
    <p class="description"><?php echo "Giới tính"?>    </p>
    <input value="<?php echo $dataInput->gioitinh;   ?>"  name="Gender"></input>
    </div>

    <div>
    <p class="description"><?php echo "Phân Khoa"?>    </p>
    <input value="<?php echo checkphankhoa($dataInput->phankhoa,$arr);   ?>" name="Faculty"></input>
    </div>

    <div>
    <p class="description"><?php echo "Tuổi"?>    </p>
    <input value="<?php echo tinhtuoi($dataInput->age);   ?> " name="Age"></input>
    </div>
    
    <button class="btn-signup description" name="signup">Đăng kí</button>
    </form>

</body>


</html>