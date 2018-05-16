<?php 
include "db_conn.php";


if(isset($_POST)) {
    error_reporting(E_ALL);
   
    $name=strip_tags($_POST['id']);
     $add_user_query="SELECT * from models where name = '{$name}' LIMIT 0,1";
    $result=$con->query($add_user_query);
    $data=mysqli_fetch_array($result);
    echo json_encode($data);
    

    
}





















?>