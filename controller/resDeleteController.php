<?php

    include_once "../config/Connect.php";
    $db = new Database();
    $res_id=$_POST['record'];
    $query="DELETE FROM restaurant where res_id='$res_id'";

    $data=$db -> Query($query);

    if($data){
        echo"Restaurant Item Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>