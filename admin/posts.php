<!DOCTYPE html>
<html lang="en">
<?php
    ob_start();
    $page_title = "Posts";
    include_once("includes/admin_header.php");
?>
  <body id="page-top" class="sidebar-toggled" class="sidebar-toggled">

    <!--Top Navigation-->
    <?php
        include_once("includes/admin_navigation.php");
    ?>
    <div id="wrapper">

      <!-- Sidebar -->
      <?php
        include_once("includes/admin_sidebar.php");
      ?>

      <div id="content-wrapper">

        <div class="container-fluid">

            <?php
                $page = "Posts";
                include_once ("includes/admin_breadcrumbs.php");
            ?>

            <?php
                if(isset($_GET["source"]))
                {
                    $source = $_GET["source"];
                }
                else{
                    $source = "";
                }
                switch($source)
                {
                    case "admin_add_post":
                        include_once ("pages/posts/admin_add_post.php");
                      break;
                    case "admin_edit_post":
                        include_once ("pages/posts/admin_edit_post.php");
                      break;
                    case "admin_delete_post":
                        include_once ("pages/posts/admin_delete_post.php");
                        include_once ("pages/posts/admin_view_all_posts.php");
                        break;
                    default:
                      include_once ("pages/posts/admin_view_all_posts.php");
                }
          ?>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <?php
            include_once("includes/admin_footer.php");
        ?>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php
        include_once("includes/admin_scripts_top_btn.php");
    ?>
  </body>

</html>
