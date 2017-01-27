<?php


$db = ['db_host' => 'localhost', 'db_user' => 'root', 'db_pass' => '', 'db_name' => 'cakes'];


foreach($db as $key => $value){

    define(strtoupper($key), $value);

}


$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);


/*if($connection){
    echo 'we are connected';
}else{
    echo "we are not connected";
}*/


?>