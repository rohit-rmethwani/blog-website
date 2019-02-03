<?php
/**
 * Created by PhpStorm.
 * User: Raju Methwani
 * Date: 28-12-2018
 * Time: 11:54
 */

if(isset($_POST["add_user"]))
{
//    die("inside if");
    $user_name = $_POST["user_name"];
    $user_password = $_POST["user_password"];
    $user_password = password_hash($user_password, PASSWORD_DEFAULT);
    $user_first_name = $_POST["user_first_name"];
    $user_last_name = $_POST["user_last_name"];
    $user_email = $_POST["user_email"];

    $user_image = $_FILES["user_image"]["name"];
    $user_image_temp = $_FILES["user_image"]["tmp_name"];
    move_uploaded_file($user_image_temp, "images/users/$user_image");

    $user_role = $_POST["user_role"];

    //INSERTING VALUES
    include_once ("../includes/connection.php");
    $query = "INSERT INTO users (user_name, user_password, user_first_name, user_last_name, user_email, user_image, user_role) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $ps = mysqli_prepare($connection, $query);


    mysqli_stmt_bind_param($ps, "sssssss",$user_name, $user_password, $user_first_name, $user_last_name, $user_email, $user_image, $user_role);

    mysqli_stmt_execute($ps);

    if(mysqli_errno($connection))
    {
        die(mysqli_error($connection));
    }
    else
    {
        header("Location: users.php");
    }
}
?>

<div class="row">
    <div class="col-md-12">
        <form action="" method="post" role="form" enctype="multipart/form-data">
            <legend>Add User</legend>

            <div class="form-group">
                <label for="user_name">User name</label>
                <input type="text" class="form-control" name="user_name" id="user_name">
            </div>

            <div class="form-group">
                <label for="user_password">Password</label>
                <input type="password" class="form-control" name="user_password" id="user_password">
            </div>

            <div class="form-group">
                <label for="user_first_name">First Name</label>
                <input type="text" class="form-control" name="user_first_name" id="user_first_name">
            </div>

            <div class="form-group">
                <label for="user_last_name">Last Name</label>
                <input type="text" class="form-control" name="user_last_name" id="user_last_name">
            </div>

            <div class="form-group">
                <label for="user_email">Email</label>
                <input type="text" class="form-control" name="user_email" id="user_email">
            </div>

            <div class="form-group">
                <label for="user_image">Profile Image</label>
                <input type="file" class="form-control-file" name="user_image" id="user_image">
            </div>

            <div class="form-group">
                <label for="user_role">Role</label>
                <select name="user_role" id="user_role" class="form-control">
                    <option value="0">Select Role</option>
                    <option value="admin">Admin</option>
                    <option value="subscriber">Subscriber</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary" name="add_user">Submit</button>
        </form>
    </div>
</div>
<div class="mb-3"></div>