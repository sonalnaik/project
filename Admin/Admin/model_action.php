<?php 
include "db_conn.php";


if(isset($_POST)) {
    error_reporting(E_ALL);
   
    $name=strip_tags($_POST['model_name']);
    $add_user_query="INSERT INTO models (name,manu_id,color,regi_no,note)
                     VALUES ('{$name}',{$_POST['manu']},'{$_POST['color']}', '{$_POST['registration_number']}', '{$_POST['note']}')";
    $con->query($add_user_query);
    echo "success";
    

    
}





















?>