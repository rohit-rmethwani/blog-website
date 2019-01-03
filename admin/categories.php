<!DOCTYPE html>
<html lang="en">
<?php
    $page_title = "Categories";
    include_once("includes/admin_header.php");
?>
  <body id="page-top" class="sidebar-toggled">

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
            $page = "Categories";
            include_once ("includes/admin_breadcrumbs.php");
          ?>

            <div class="row">
                <?php
                include_once("pages/category/admin_add_category_form.php");
                include_once("pages/category/admin_edit_category_form.php");
                ?>
            </div>

            <?php
                include_once("pages/category/admin_view_all_category_form.php");
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
