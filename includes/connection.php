<?php
/**
 * Created by PhpStorm.
 * User: Raju Methwani
 * Date: 26-12-2018
 * Time: 11:36
 */
include_once ("config.php");
$connection = mysqli_connect(HOST, USER, PASSWORD, DB_NAME);

if($connection)
{
//    echo "Connection established successfully";
}
else
{
    die(mysqli_connect_error($connection));
}
?>