<?php
    $user_id = null;
    if(isset($_SESSION["user_id"]))
    {
        $user_id = $_SESSION["user_id"];
    }
    else
    {
        session_start();
        $user_id = $_SESSION["user_id"];
        include_once ("../includes/functions.php");
        $result = getAllUsers("user_id = $user_id");
        if($row = mysqli_fetch_assoc($result))
        {
            $image = $row["user_image"];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php
    $page_title = "Dashboard";
    include_once("includes/admin_header.php");
?>
<?php
    if($user_id == null)
    {
        include_once ("includes/no_access.php");
    }
    else {
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
                    $page = "Overview";
                    include_once ("includes/admin_breadcrumbs.php");
                    ?>

                    <!-- Icon Cards-->
                    <div class="row">
                        <div class="col-xl-3 col-sm-6 mb-3">
                            <div class="card text-white bg-primary o-hidden h-100">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fas fa-fw fa-comments"></i>
                                    </div>
                                    <div class="mr-5">26 New Messages!</div>
                                </div>
                                <a class="card-footer text-white clearfix small z-1" href="#">
                                    <span class="float-left">View Details</span>
                                    <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 mb-3">
                            <div class="card text-white bg-warning o-hidden h-100">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fas fa-fw fa-list"></i>
                                    </div>
                                    <div class="mr-5">11 New Tasks!</div>
                                </div>
                                <a class="card-footer text-white clearfix small z-1" href="#">
                                    <span class="float-left">View Details</span>
                                    <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 mb-3">
                            <div class="card text-white bg-success o-hidden h-100">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fas fa-fw fa-shopping-cart"></i>
                                    </div>
                                    <div class="mr-5">123 New Orders!</div>
                                </div>
                                <a class="card-footer text-white clearfix small z-1" href="#">
                                    <span class="float-left">View Details</span>
                                    <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 mb-3">
                            <div class="card text-white bg-danger o-hidden h-100">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fas fa-fw fa-life-ring"></i>
                                    </div>
                                    <div class="mr-5">13 New Tickets!</div>
                                </div>
                                <a class="card-footer text-white clearfix small z-1" href="#">
                                    <span class="float-left">View Details</span>
                                    <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                                </a>
                            </div>
                        </div>
                    </div>

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
        <?php
    }
?>
</html>
