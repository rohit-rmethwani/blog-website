<div class="row">
    <div class="col-md-12">
        <a href="users.php?source=admin_add_user" class="btn btn-primary">Add User</a>
        <div class="mb-3"></div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>User Name</th>
                    <th>User Password</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include_once ("../includes/functions.php");
                $result = getAllUsers();
                while($row = mysqli_fetch_assoc($result))
                {
                    $user_id = $row["user_id"];
                    $user_image = $row["user_image"];
                    $user_name = $row["user_name"];
                    $user_password = $row["user_password"];
                    $user_first_name = $row["user_first_name"];
                    $user_last_name = $row["user_last_name"];
                    $user_email = $row["user_email"];
                    $user_role = $row["user_role"];
                    echo <<< POST
<tr>
<td>$user_id</td>
<td><img src="images/users/$user_image" alt="" class="img-fluid rounded-circle" width="50px"></td>
<td>$user_name</td>
<td>$user_password</td>
<td>$user_first_name</td>
<td>$user_last_name</td>
<td>$user_email</td>
<td>$user_role</td>
<td><a href="users.php?source=admin_edit_user&user_id=$user_id" class="btn btn-outline-primary"><i class="fa fa-edit"></i></a></td>
<td><a href="users.php?source=admin_delete_user&user_id=$user_id" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a></td>
POST;

                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>