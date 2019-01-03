<div class="row">
    <div class="col-md-12">
        <a href="posts.php?source=admin_add_post" class="btn btn-primary">Add Posts</a>
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
                    <th>Author</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Tags</th>
                    <th>Comments</th>
                    <th>Date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include_once ("../includes/functions.php");
                $result = getAllPosts();
                while($row = mysqli_fetch_assoc($result))
                {
                    $post_id = $row["post_id"];
                    $post_author = $row["post_author"];
                    $post_title = $row["post_title"];
                    $post_cat_id = $row["post_cat_id"];
                    $post_status = $row["post_status"];
                    $post_image = $row["post_image"];
                    $post_tags = $row["post_tags"];
                    $post_comment_count = $row["post_comment_count"];
                    $post_date = $row["post_date"];
                    $category = getAllCategories("cat_id = $post_cat_id");
                    $cat_name = $category[0]["cat_name"];
                    echo <<< POST
<tr>
<td>$post_id</td>
<td>$post_author</td>
<td>$post_title</td>
<td>$cat_name</td>
<td>$post_status</td>
<td><img src="../images/$post_image" alt="" class="img-fluid" width="100px"></td>
<td>$post_tags</td>
<td>$post_comment_count</td>
<td>$post_date</td>
<td><a href="posts.php?source=admin_edit_post&post_id=$post_id" class="btn btn-outline-primary"><i class="fa fa-edit"></i></a></td>
<td><a href="posts.php?source=admin_delete_post&post_id=$post_id" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a></td>
POST;

                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>