<?php
/**
 * Created by PhpStorm.
 * User: Raju Methwani
 * Date: 27-12-2018
 * Time: 11:07
 */
    include_once("connection.php");
    function getAllCategories($condition=1)
    {
        global $connection;
        $query = "SELECT * FROM categories WHERE $condition";
        if($result = mysqli_query($connection, $query))
        {
            $all_categories = array();
            $i = 0;
            while($row = mysqli_fetch_assoc($result))
            {
                $single_category = array();
                $single_category["cat_id"] = $row["cat_id"];
                $single_category["cat_name"] = $row["cat_name"];
                $all_categories[$i] = $single_category;
                $i++;
            }
        }
        return $all_categories;
    }

    function getAllPosts($condition = 1)
    {
        global $connection;
        $query = "SELECT * FROM posts WHERE $condition";
        if($result = mysqli_query($connection, $query))
        {
            return $result;
        }
    }

    function getAllComments($condition = 1)
    {
        global $connection;
        $query = "SELECT * FROM comments WHERE $condition";
        if($result = mysqli_query($connection, $query))
        {
            return $result;
        }
    }
?>