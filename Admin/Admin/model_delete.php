<?php 
include "db_conn.php";



if(isset($_POST)) {
    error_reporting(E_ALL);
   
    $name=strip_tags($_POST['id']);
    echo $add_user_query="UPDATE models set delete_status=1 where name = '{$name}'";
    $result=$con->query($add_user_query);
   
    

    
}





















?>