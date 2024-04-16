<?php

    include_once "../config/Connect.php";
    $db = new Database();
    $post_id=$_POST['record'];
    $query="DELETE FROM posts where post_id='$post_id'";

    $data=$db -> Query($query);

    if($data){
        echo"Post Item Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>