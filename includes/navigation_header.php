<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item <?php echo $active_page == 'Home'?active:''?> ">
                    <a class="nav-link" href="index.php">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <?php
                    include_once ("functions.php");
                    $categories = getAllCategories();
                    $i = 0;
                    while($i < count($categories))
                    {
                        echo <<<LINK
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?cat_id={$categories[$i]["cat_id"]}">{$categories[$i]["cat_name"]}</a>
                        </li>
LINK;
                        $i++;

                    }
                ?>
            </ul>
        </div>
    </div>
</nav>

