<?php
    include_once "../config/Connect.php";
    $db= new Database();

    if(isset($_POST['upload']))
    {
        $res_id=$_POST['r_id'];
        $r_name= $_POST['r_name'];
        $r_address = $_POST['r_address'];
        $r_phone = $_POST['r_phone'];
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
        $updateItem =$db->Query("UPDATE restaurant SET 
            res_name='$r_name', 
            res_address='$r_address', 
            res_phone=$r_phone,
            res_image='$image' 
            WHERE res_id=$res_id");
        // if($updateItem){
        //     echo "Update restaurant  successfully!";
        // }else{
        //     echo "Error: Unable to update data.";
        // }
    } else {
        echo "Error.";
    }
?> 