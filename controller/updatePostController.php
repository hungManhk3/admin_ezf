<?php
    include_once "../config/Connect.php";
    $db= new Database();

    if(isset($_POST['upload']))
    {
        $pid=$_POST['pid'];
        $title= $_POST['title'];
        $content=$_POST['content'];
        $dish= $_POST['dish'];
        $currentDateTime = date("Y-m-d H:i:s");
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
        $updateItem =$db->Query("UPDATE posts SET 
            dish_id ='$dish', 
            title='$title',
            content='$content',
            thumbnail_image='$image',
            date ='$currentDateTime' 
            WHERE post_id=$pid");
        echo $updateItem;    
    } else {
        echo "Error.";
    }
?> 