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
    $arPost = mysqli_fetch_array($post);

endif;
?>

    <div class="container p-5">
        <h4 class="text-center mb-5 mt-2">Edit the post</h4>
        <form class="w-50 m-auto" action="../src/handlers/post/edit.php" method="post">
            <input type="hidden" value="<?=$arPost['id'];?>" name="postId">
            <div class="mb-3">
                <label for="postTitle" class="form-label">Title</label>
                <input type="text" name="postTitle" value="<?=$arPost['title'];?>" class="form-control" id="postTitle">
            </div>
            <div class="mb-3">
                <label for="postAuthor" class="form-label">Author</label>
                <input type="text" name="postAuthor" value="<?=$arPost['author'];?>"  class="form-control" id="postAuthor">
            </div>
            <div class="mb-3">
                <label for="postPreview" class="form-label">Preview</label>
                <textarea id="postPreview" name="postPreview" cols="10" rows="1"class="form-control"><?=$arPost['preview'];?></textarea>
            </div>
            <div class="mb-3">
                <label for="postDetail" class="form-label">Detail Text</label>
                <textarea id="postDetail" name="postDetail" cols="30" rows="5"class="form-control"><?=$arPost['content'];?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">submit</button>
        </form>
    </div>
<?include $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php'; ?>