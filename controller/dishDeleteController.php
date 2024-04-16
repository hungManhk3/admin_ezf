<?php

    include_once "../config/Connect.php";
    $db = new Database();
    $did=$_POST['record'];
    $query="DELETE FROM dish where dish_id='$did'";

    $data=$db -> Query($query);

    if($data){
        echo"Dish Item Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>