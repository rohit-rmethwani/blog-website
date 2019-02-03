<?php
/**
 * Created by PhpStorm.
 * User: Raju Methwani
 * Date: 28-12-2018
 * Time: 13:17
 */
include_once ("../includes/connection.php");
if(isset($_GET["user_id"]))
{
    $user_id = $_GET["user_id"];
    $source = $_GET["source"];
    $query = "DELETE FROM users WHERE user_id=$user_id";
    mysqli_query($connection, $query);
    if(mysqli_errno($connection))
    {
        mysqli_error($connection);
    }
}