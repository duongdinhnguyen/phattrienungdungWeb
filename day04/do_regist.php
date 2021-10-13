<html>
<link rel="stylesheet" href="do_regist_css.css"/>
<?php
    $arr= array("MAT"=>"Khoa học máy tính","KDL"=>"Khoa học dữ liệu");
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
    <form class="output">
    <div>
    <b class="account-password"><?php echo "Họ và tên"?>    </b>

    <p><?php echo $data->name;   ?></p>
    </div>
    <div>
    <b class="account-password"><?php echo "Giới tính"?>    </b>

    <p><?php echo $data->gioitinh;   ?></p>
   
    </div>
    <div>
    <b class="account-password"><?php echo "Phân Khoa"?>    </b>

    <p><?php echo checkphankhoa($data->phankhoa,$arr);   ?></p>
    
    </div>
    <div>
    <b class="account-password"><?php echo "Tuổi"?>    </b>

    <p><?php echo tinhtuoi($data->age);   ?></p>
  
    </div>
    </form>

</body>
</html>