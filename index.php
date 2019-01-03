<?php
    $page_title = "Blog | Home";
    $active_page = "Home";
?>
<!DOCTYPE html>
<html lang="en">

 <?php
    include_once ("includes/header.php");
 ?>

  <body>

    <!-- Navigation -->
    <?php
        include_once ("includes/navigation_header.php");
    ?>

    <!-- Page Content -->
    <div class="container">
        <!--row  -->
      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <h1 class="my-4">Recent Posts
            <small>Programming</small>
          </h1>
            <?php
                include_once("includes/connection.php");
                if(isset($_GET["search"]))
                {
                    $key = $_GET["search"];
                    $conditional_statement = "post_title like '%{$key}%' or post_author like '%{$key}%' or post_tags like '%{$key}%'";
                }
                else if(isset($_GET["cat_id"])){
                    $cat_id = $_GET["cat_id"];
                    $conditional_statement = "post_cat_id = $cat_id";
                }
                else{
                    $conditional_statement = "1";
                }
                $query_all_posts = "SELECT * FROM posts WHERE $conditional_statement";
                $all_posts_result = mysqli_query($connection, $query_all_posts);
                while($post = mysqli_fetch_assoc($all_posts_result)) {
                    $post_id = $post["post_id"];
                    $post_title = $post["post_title"];
                    $post_author = $post["post_author"];
                    $post_date = $post["post_date"];
                    $post_content = substr($post["post_content"], 0 ,100)."...";
                    $post_tags = $post["post_tags"];
                    $post_image = $post["post_image"];
                    ?>
                    <!-- Blog Post -->
                    <div class="card mb-4">
                        <img class="card-img-top img-fluid" src="images/<?php echo $post_image;?>" alt="<?php echo $post_title?>">
                        <div class="card-body">
                            <h1>
                                <a href="individual_post.php?post_id=<?php echo $post_id?>" class="card-title"><?php echo $post_title ?></a></h1>
                            <p class="card-text"><?php echo $post_content;?></p>
                            <a href="individual_post.php?post_id=<?php echo $post_id?>" class="btn btn-primary">Read More &rarr;</a>
                        </div>
                        <div class="card-footer-tags text-muted">
                            <ul>
                                <?php
                                    $tags = explode(",", $post_tags);
                                    for($i=0; $i< count($tags); $i++)
                                    {
                                        $tag = trim($tags[$i]);
                                        echo "<li>$tag</li>";
                                    }
                                ?>
                            </ul>
                        </div>
                        <div class="card-footer text-muted">
                            Posted on <?php echo $post_date?> by
                            <a href="#"><?php echo $post_author?></a>
                        </div>
                    </div>
                    <?php
                }
            ?>
          <!-- Pagination -->
          <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
              <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
              <a class="page-link" href="#">Newer &rarr;</a>
            </li>
          </ul>

        </div>

        <!-- Sidebar Widgets Column -->
        <?php
            include_once("includes/sidebar.php");
        ?>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php
        include_once("includes/footer.php");
    ?>

    <!-- Bootstrap core JavaScript -->
    <?php
        include_once ("includes/core_scripts.php");
    ?>

  </body>

</html>
