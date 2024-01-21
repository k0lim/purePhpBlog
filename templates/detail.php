<?include $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php'; ?>
<?php

    if (!empty($_GET['post_id'])):

        $dbOptions = (require  $_SERVER['DOCUMENT_ROOT'] . '/src/settings.php')['db'];
        // Create connection
        $conn = mysqli_connect($dbOptions['host'], $dbOptions['user'], $dbOptions['password'], $dbOptions['dbname']);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $post = mysqli_query($conn, 'SELECT * FROM post WHERE id=' . $_GET['post_id']) or die('error!');
        $postComments = mysqli_query($conn, 'SELECT * FROM comment WHERE post_id=' . $_GET['post_id']) or die('error!');
        $arPost = mysqli_fetch_array($post);

    endif;
?>

<section>
    <div class="container my-5 py-5">
        <h2 class="text-center mb-5">Post detail page</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-lg-10 col-xl-8">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fw-bold text-primary mb-1"><?=$arPost['title'];?></h6>
                                <p class="text-muted small mb-0"><?=$arPost['author'];?></p>
                            </div>
                            <div><a class="nav-link" href="/templates/edit-post.php?post_id=<?=$arPost['id'];?>">Edit Post</a></div>
                        </div>
                        <p class="mt-5 mb-4 pb-2"><?=$arPost['content'];?></p>
                    </div>
                    <h5 class="mb-3 mt-2 text-center">Comments</h5>
                    <?if (!empty($postComments)):?>
                        <?foreach ($postComments as $postComment):?>
                            <div class="p-4">
                                <div class="card-body card">
                                    <p><?=$postComment['content'];?></p>
                                </div>
                            </div>
                        <?endforeach;?>
                    <?endif;?>
                    <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                        <form class="" action="../src/handlers/comment/add.php" method="post">
                            <input type="hidden" name="postId" value="<?=$arPost['id'];?>">
                            <div class="d-flex flex-start w-100">
                                <div class="form-outline w-100">
                                    <textarea class="form-control" id="comment" name="comment" rows="4" style="background: #fff;"></textarea>
                                </div>
                            </div>
                            <div class="float-end mt-2 pt-1">
                                <button type="submit" class="btn btn-primary btn-sm">Add comment</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>







<?include $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php'; ?>
