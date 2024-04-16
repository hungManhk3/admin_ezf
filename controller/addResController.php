<?php
    include_once "../config/Connect.php";
    $db = new Database();
    if(isset($_POST['upload']))
    {
       
        $resname = $_POST['rname'];
        $resaddress = $_POST['raddress'];
        $resphone = $_POST['rphone'];

        $name = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
    
        $location="./uploads/";
        $image=$location.$name;

        $target_dir="../uploads/";
        $finalImage=$target_dir.$name;
            if(move_uploaded_file($temp,$finalImage)){
                $sql = "INSERT INTO `restaurant` (`res_name`, `res_address`, `res_image`, `res_phone`) VALUES ('$resname','$resaddress','$image','$resphone')";
                $insert = $db -> Query($sql);
                if(!$insert)
                {
                    echo mysqli_error($conn);
                }
                else
                {
                    echo "Records added successfully.";
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
     
                }
    } else {
    echo "Error uploading file.";
    }
    
        
?>