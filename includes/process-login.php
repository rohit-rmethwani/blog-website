<?php
/**
 * Created by PhpStorm.
 * User: Raju Methwani
 * Date: 20-01-2019
 * Time: 21:00
 */
include_once ("connection.php");
if(isset($_POST["login"]))
{
    $user_name = $_POST["user_name"];
    $user_password = $_POST["user_password"];

    $query = "SELECT * FROM users WHERE user_name = ?";
    $ps = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($ps, "s", $user_name);
    mysqli_stmt_execute($ps);
    $result = mysqli_stmt_get_result($ps);
    if($row = mysqli_fetch_assoc($result))
    {
        $user_id = $row["user_id"];
        $db_password = $row["user_password"];
        $user_role = $row["user_role"];
    }
    if(password_verify($user_password, $db_password))
    {
        if(!isset($_SESSION["user_id"]))
        {
            session_start();
        }
//        die("Setting user id");
        $_SESSION["user_id"] = $user_id;
        $_SESSION["user_role"] = $user_role;
        header("Location: ../admin/index.php");
    }

}