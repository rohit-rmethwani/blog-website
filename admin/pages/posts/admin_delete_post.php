<?php
/**
 * Created by PhpStorm.
 * User: Raju Methwani
 * Date: 28-12-2018
 * Time: 13:17
 */
include_once ("../includes/connection.php");
if(isset($_GET["post_id"]))
{
    $post_id = $_GET["post_id"];
    $source = $_GET["source"];
    $query = "DELETE FROM posts WHERE post_id=$post_id";
    mysqli_query($connection, $query);
    if(mysqli_errno($connection))
    {
        mysqli_error($connection);
    }
}