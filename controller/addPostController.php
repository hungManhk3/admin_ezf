<?php
    include_once "../config/Connect.php";
    $db = new Database();
    if(isset($_POST['upload']))
    {
       
        $title = $_POST['title'];
        $content = $_POST['content'];
        $dish = $_POST['dish'];
        $currentDateTime = date("Y-m-d H:i:s");

        $name = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
    
        $location="./uploads/";
        $image=$location.$name;

        $target_dir="../uploads/";
        $finalImage=$target_dir.$name;
            if(move_uploaded_file($temp,$finalImage)){
                $sql = "INSERT INTO `posts` (`title`,`content`, `thumbnail_image`, `dish_id`, `date`) VALUES ('$title','$content','$image','$dish','$currentDateTime')";
                $insert = $db -> Query($sql);
                echo $insert;
            } else {
                echo "Sorry, there was an error uploading your file.";
     
                }
    } else {
    echo "Error uploading file.";
    }
    
        
?>