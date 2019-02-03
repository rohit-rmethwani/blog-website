<?php
/**
 * Created by PhpStorm.
 * User: Raju Methwani
 * Date: 20-01-2019
 * Time: 21:49
 */
session_start();
$_SESSION["user_id"] = null;
$_SESSION["role"] = null;
session_unset();
header("Location: ../index.php");
?>