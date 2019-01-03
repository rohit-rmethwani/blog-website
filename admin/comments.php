<!DOCTYPE html>
<html lang="en">
<?php
    $page_title = "Comments";
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
            include_once ("../includes/connection.php");
                if(isset($_GET["source"]))
                {
                    $source = $_GET["source"];
                }
                else{
                    $source = "";
                }
                switch($source)
                {
                    case "approved":
                        if(isset($_GET["comment_id"]))
                        {
                            $comment_id = $_GET["comment_id"];
                            $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $comment_id";
                            mysqli_query($connection, $query);
                        }
                        include_once ("pages/comments/admin_view_all_comments.php");
                      break;
                    case "unapproved":
                        if(isset($_GET["comment_id"]))
                        {
                            $comment_id = $_GET["comment_id"];
                            $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $comment_id";
                            mysqli_query($connection, $query);
                        }
                        include_once ("pages/comments/admin_view_all_comments.php");
                        break;
                    default:
                      include_once ("pages/comments/admin_view_all_comments.php");
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
