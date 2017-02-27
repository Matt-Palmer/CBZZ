<?php


//$db = ['db_host' => 'localhost', 'db_user' => 'root', 'db_pass' => '', 'db_name' => 'cakes'];


//000Webhost
$db = ['db_host' => 'localhost', 'db_user' => 'id428867_mattyp_88', 'db_pass' => 'Newcastle1?', 'db_name' => 'id428867_cakes'];


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