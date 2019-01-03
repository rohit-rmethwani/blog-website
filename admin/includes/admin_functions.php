<?php
    include_once("admin_connection.php");
    function check_for_query_error($connection)
    {
        if(mysqli_errno($connection))
        {
            die(mysqli_error($connection));
        }
    }
    function insert($table_name, $column_list, $values_list)
    {
        global $connection;
        $query = "INSERT INTO {$table_name} ({$column_list}) VALUES ({$values_list})";
        mysqli_query($connection, $query);
        check_for_query_error($connection);
    }
    function delete($table_name, $condition)
    {
        global $connection;
        $query = "DELETE FROM $table_name WHERE $condition";
        mysqli_query($connection, $query);
        check_for_query_error($connection);
    }
?>