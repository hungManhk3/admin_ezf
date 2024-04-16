<?php
    include_once "../config/Connect.php";
    $db = new Database();
    if(isset($_POST['upload']))
    {
       
        $dname = $_POST['dname'];
        $ddes = $_POST['ddes'];
        $cat = $_POST['cat'];
        $res = $_POST['res'];

        $name = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
    
        $location="./uploads/";
        $image=$location.$name;

        $target_dir="../uploads/";
        $finalImage=$target_dir.$name;
            if(move_uploaded_file($temp,$finalImage)){
                $sql = "INSERT INTO `dish` (`dish_name`,`dish_desc`, `dish_image`, `cid`, `res_id`) VALUES ('$dname','$ddes','$image','$cat','$res')";
                $insert = $db -> Query($sql);
                echo $insert;
            } else {
                echo "Sorry, there was an error uploading your file.";
     
                }
    } else {
    echo "Error uploading file.";
    }
    
        
?>