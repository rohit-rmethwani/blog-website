<?php
/**
 * Created by PhpStorm.
 * User: Raju Methwani
 * Date: 27-12-2018
 * Time: 13:16
 */
include_once ("admin_functions.php");
function convert_to_string($string)
{
    $string_item = "'".$string."'";
    return $string_item;
}

if(isset($_POST["add_category"]))
{
    $cat_name = $_POST["cat_name"];
    $cat_name = convert_to_string($cat_name);
    insert("categories", "cat_name", "{$cat_name}");
    header("Location: ../categories.php");
}
?>