<?php
    include_once "../config/Connect.php";
    $db= new Database();

    if(isset($_POST['upload']))
    {
        $did=$_POST['did'];
        $dname= $_POST['dname'];
        $ddesc=$_POST['ddesc'];
        $cat= $_POST['cat'];
        $res= $_POST['res'];
        if (isset($_FILES['newImage']) && $_FILES['newImage']['size'] > 0 ) {
            $name = $_FILES['newImage']['name'];
            $temp = $_FILES['newImage']['tmp_name'];

            $location="./uploads/";
            $image=$location.$name;

            $target_dir="../uploads/";
            $finalImage=$target_dir.$name;
            move_uploaded_file($temp,$finalImage);
        }else{
            $image=$_POST['existingImage'];
        }
        $updateItem =$db->Query("UPDATE dish SET 
            dish_name='$dname', 
            dish_desc='$ddesc',
            cid='$cat',
            res_id='$res',
            dish_image='$image' 
            WHERE dish_id=$did");
        echo $updateItem;    
    } else {
        echo "Error.";
    }
?> 