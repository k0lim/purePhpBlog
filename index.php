<?include $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php'; ?>
    <div class="container p-5">
        <h2 class="text-center mb-5">Home page</h2>
        <div class="row mb-2">
            <?php
            $dbOptions = (require __DIR__ . '/src/settings.php')['db'];

            if (empty($_GET['page']) || ($_GET['page'] <= 0)) {
                $page = 1;
            }  else  {
                $page = (int) $_GET['page'];
            }

            $posts_on_page = 4;

            // Create connection
            $conn = mysqli_connect($dbOptions['host'], $dbOptions['user'], $dbOptions['password'], $dbOptions['dbname']);
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $count = mysqli_num_rows(mysqli_query($conn, 'select * from  post'));

            $pages_count = ceil($count / $posts_on_page);

            ?>
            <?if ($count != 0):?>
            <?php
                $start_pos = ($page - 1) * $posts_on_page;
                $result = mysqli_query($conn, 'select * from  post order by id asc limit '.$start_pos.',  '.$posts_on_page ) or die('error!');
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <div class="col-sm-6 mb-5">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?=$row['title'];?></h5>
                                <span class="author"><?=$row['author'];?></span>
                                <p class="card-text"><?=$row['preview'];?>...</p>
                                <a href="/templates/detail.php?post_id=<?=$row['id'];?>" class="btn btn-primary">Continue reading</a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                mysqli_free_result($result);
            ?>
                <nav class="d-flex justify-content-center">
                    <ul class="pagination">
                        <?php
                        if ($count > $posts_on_page) {
                            for ($i = 1; $i <= $pages_count; $i++) {
                                echo "<li class=\"page-item\"><a class=\"page-link\" href=\"?page=$i\">$i </a></li>";
                            }
                        }
                        ?>
                    </ul>
                </nav>
            <?else:?>
                <h6 class="text-center mb-5">There is not posts yet..</h6>
                <p class="text-center">You can create a first post <a href="/templates/add-post.php">by click here</a></p>
            <?endif;?>

        </div>


    </div>

<?include $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php'; ?>
