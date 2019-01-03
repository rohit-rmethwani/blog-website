<?php
/**
 * Created by PhpStorm.
 * User: Raju Methwani
 * Date: 27-12-2018
 * Time: 15:10
 */
include_once ("admin_connection.php");
if(isset($_POST["edit_category"]))
{
    $cat_name = $_POST["cat_name"];
    $cat_id = $_POST["cat_id"];
    $query = "UPDATE categories SET cat_name = '$cat_name' WHERE cat_id = '$cat_id'";
//    die($query);
    mysqli_query($connection, $query);
    if(mysqli_errno($connection))
    {
        die(mysqli_error($connection));
    }
    header("Location: ../categories.php");
}