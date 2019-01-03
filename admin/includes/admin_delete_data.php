<?php
/**
 * Created by PhpStorm.
 * User: Raju Methwani
 * Date: 27-12-2018
 * Time: 15:04
 */
include_once ("admin_functions.php");
include_once ("admin_connection.php");
if(isset($_GET["cat_id"]))
{
    $cat_id = $_GET["cat_id"];
    delete("categories", "cat_id = $cat_id");
    header("Location: ../categories.php");
}