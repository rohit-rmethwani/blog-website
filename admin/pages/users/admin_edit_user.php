<?php
/**
 * Created by PhpStorm.
 * User: Raju Methwani
 * Date: 28-12-2018
 * Time: 11:54
 */

include_once ("../includes/connection.php");
if(isset($_POST["edit_user"]))
{
    $user_name = $_POST["user_name"];
    $user_first_name = $_POST["user_first_name"];
    $user_last_name = $_POST["user_last_name"];
    $user_email = $_POST["user_email"];
    $user_role = $_POST["user_role"];
//    die("$user_role");
    //UPDATING VALUES
    $query = "UPDATE users SET user_role = ? WHERE user_id = ?";
    $ps = mysqli_prepare($connection, $query);
//    die("$post_cat_id,$post_title,$post_author,$post_image,$post_content,$post_tags,$post_status,$post_id");

    mysqli_stmt_bind_param($ps, "ss", $user_role, $user_id);

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

//CODE TO FETCH DATA
if(isset($_GET["user_id"]))
{
    $edit_user_id = $_GET["user_id"];
    $query = "SELECT * FROM users WHERE user_id = $edit_user_id";
    $result = mysqli_query($connection, $query);
    if($row = mysqli_fetch_assoc($result))
    {
        $user_name = $row["user_name"];
        $user_password = $row["user_password"];
        $user_first_name = $row["user_first_name"];
        $user_last_name = $row["user_last_name"];
        $user_email = $row["user_email"];
        $user_image = $row["user_image"];
        $user_role = $row["user_role"];

?>
        <div class="row">
            <div class="col-md-12">
                <form action="" method="post" role="form" enctype="multipart/form-data">
                    <legend>Add User</legend>

                    <div class="form-group">
                        <label for="user_name">User name</label>
                        <input type="text" class="form-control" name="user_name" id="user_name" value="<?php echo $user_name?>" disabled>
                    </div>

                    <div class="form-group">
                        <label for="user_first_name">First Name</label>
                        <input type="text" class="form-control" name="user_first_name" id="user_first_name" value="<?php echo $user_first_name?>" disabled>
                    </div>

                    <div class="form-group">
                        <label for="user_last_name">Last Name</label>
                        <input type="text" class="form-control" name="user_last_name" id="user_last_name" value="<?php echo $user_last_name?>" disabled>
                    </div>

                    <div class="form-group">
                        <label for="user_email">Email</label>
                        <input type="text" class="form-control" name="user_email" id="user_email" value="<?php echo $user_email?>" disabled>
                    </div>

                    <div class="form-group">
                        <label for="user_role">Role</label>
                        <select name="user_role" id="user_role" class="form-control" value="<?php echo $user_value?>">
                            <option value="0">Select Role</option>
                            <option value="admin">Admin</option>
                            <option value="subscriber">Subscriber</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary" name="edit_user">Edit</button>
                </form>
            </div>
        </div>
        <div class="mb-3"></div>
<?php
}
}
?>

