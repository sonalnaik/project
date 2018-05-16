<?php 
include "db_conn.php";


if(isset($_POST)) {
    error_reporting(E_ALL);
   
    $name=strip_tags($_POST['manu_name']);
    $add_user_query="INSERT INTO manufacturers (name)
                     VALUES ('{$name}')";
    $con->query($add_user_query);
    echo "success";
    

    
}





















?>