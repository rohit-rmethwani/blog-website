<?php
/**
 * Created by PhpStorm.
 * User: Raju Methwani
 * Date: 28-12-2018
 * Time: 11:54
 */

include_once ("../includes/connection.php");
if(isset($_POST["edit_post"]))
{
//    die("inside if");
    $post_author = $_POST["post_author"];
    $post_title = $_POST["post_title"];
    $post_cat_id = $_POST["post_cat_id"];
    $post_status = $_POST["post_status"];
    $post_id = $_GET["post_id"];
    $old_image = $_POST["old_image"];
    $post_image = $_FILES["post_image"]["name"];
    if($post_image == "")
    {
        $post_image = $old_image;
    }
    else
    {
        $post_image_temp = $_FILES["post_image"]["tmp_name"];
        move_uploaded_file($post_image_temp, "../images/$post_image");
    }

    $post_tags = $_POST["post_tags"];
    $post_content = $_POST["post_content"];

    $post_date = date("Y-m-d");


    //UPDATING VALUES
    $query = "UPDATE posts SET post_cat_id = ?, post_title = ?, post_author = ?, post_image = ?, post_content = ?, post_tags = ?, post_status = ? WHERE post_id = ?";
    $ps = mysqli_prepare($connection, $query);
//    die("$post_cat_id,$post_title,$post_author,$post_image,$post_content,$post_tags,$post_status,$post_id");

    mysqli_stmt_bind_param($ps, "dssssssd",$post_cat_id, $post_title, $post_author, $post_image, $post_content, $post_tags, $post_status, $post_id);

    mysqli_stmt_execute($ps);

    if(mysqli_errno($connection))
    {
        die(mysqli_error($connection));
    }
    else
    {
        header("Location: posts.php");
    }
}

//CODE TO FETCH DATA
if(isset($_GET["post_id"]))
{
    $edit_post_id = $_GET["post_id"];

    $query = "SELECT * FROM posts WHERE post_id = $edit_post_id";
    $result = mysqli_query($connection, $query);
    if($row = mysqli_fetch_assoc($result))
    {
        $post_title = $row["post_title"];
        $post_status = $row["post_status"];
        $post_cat_id = $row["post_cat_id"];
        $post_author = $row["post_author"];
        $post_tags = $row["post_tags"];
        $post_image = $row["post_image"];
        $post_content = $row["post_content"];

?>

<div class="row">
    <div class="col-md-12">
        <form action="" method="post" role="form" enctype="multipart/form-data">
            <legend>Add Post</legend>

            <div class="form-group">
                <label for="post_title">Post Title</label>
                <input type="text" class="form-control" name="post_title" id="post_title" value="<?php echo $post_title?>">
            </div>

            <div class="form-group">
                <label for="post_author">Post Author</label>
                <input type="text" class="form-control" name="post_author" id="post_author" value="<?php echo $post_author?>">
            </div>

            <div class="form-group">
                <label for="post_cat_id">Post Category </label>
                <?php
                include_once ("../includes/functions.php");
                $categories = getAllCategories();
                ?>
                <select class="form-control" name="post_cat_id" id="post_cat_id">
                    <?php
                    $i = 0;
                    while($i<count($categories))
                    {
                        $cat_id = $categories[$i]["cat_id"];
                        $cat_name = $categories[$i]['cat_name'];
                        $option_equal = "<option value='$cat_id' selected>$cat_name</option>";
                        $option_normal="<option value='$cat_id'>$cat_name</option>";
                        if($cat_id == $post_cat_id)
                        {
                            echo $option_equal;
                        }
                        else
                        {
                            echo $option_normal;
                        }
                        $i++;
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="post_status">Post Status</label>
                <select name="post_status" id="post_status" class="form-control">
                    <option value="draft" <?php echo $post_status == "draft"?"selected":""?>>Draft</option>
                    <option value="published" <?php echo $post_status == "published"?"selected":""?>>Published</option>
                </select>
            </div>

            <div class="form-group">
                <label for="post_image">Post File</label>
                <input type="hidden" name="old_image" id="old_image" value="<?php echo $post_image;?>">
                <input type="file" class="form-control-file" name="post_image" id="post_image">
            </div>

            <div class="form-group">
                <label for="post_tags">Post Tags</label>
                <input type="text" class="form-control" name="post_tags" id="post_tags" value="<?php echo $post_tags?>">
            </div>

            <div class="form-group">
                <label for="post_content">Post Content</label>
                <textarea name="post_content" id="post_content" cols="30" rows="10" class="form-control"><?php echo $post_content?></textarea>
            </div>

            <button type="submit" class="btn btn-primary" name="edit_post">Submit</button>
        </form>
    </div>
</div>
<div class="mb-3"></div>
<?php
}
}
?>

