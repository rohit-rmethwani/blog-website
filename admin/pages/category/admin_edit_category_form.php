<?php
    if(isset($_GET["id"]))
    {
        include_once("../includes/functions.php");
        $cat_id = $_GET["id"];
        $category = getAllCategories("cat_id = $cat_id");
        if(count($category) > 0) {
            $cat_name = $category[0]["cat_name"];
            ?>
            <div class="col-md-6">
                <form action="includes/admin_edit_data.php" method="post" role="form">
                    <legend>Edit Category</legend>

                    <input type="hidden" value="<?php echo $cat_id?>" name="cat_id">
                    <div class="form-group">
                        <label for="edit_category">Edit Category</label>
                        <input type="text" class="form-control" name="cat_name" id="cat_name" value="<?php echo $cat_name?>">
                    </div>

                    <button type="submit" class="btn btn-warning" name = "edit_category">Edit Category</button>
                </form>
            </div>
            <?php
        }
    }
?>