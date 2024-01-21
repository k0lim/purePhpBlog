<?include $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php'; ?>
    <?php
        $dbOptions = (require $_SERVER['DOCUMENT_ROOT']. '/src/settings.php')['db'];

        $postId = $_POST['postId'];
        $postTitle = $_POST['postTitle'];
        $postAuthor = $_POST['postAuthor'];
        $postPreview = $_POST['postPreview'];
        $postDetail = $_POST['postDetail'];

        // Create connection
        $conn = mysqli_connect($dbOptions['host'], $dbOptions['user'], $dbOptions['password'], $dbOptions['dbname']);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $result = mysqli_query($conn, "UPDATE `post` SET `title` = '$postTitle', `author` = '$postAuthor', `preview` = '$postPreview', `content` = '$postDetail' WHERE `post`.`id` = '$postId'");
        if ($result) {
            header('Location: /templates/detail.php?post_id=' . $postId);
            exit();
        } else {
            echo 'db insert error';
        }
    ?>
<?include $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php'; ?>

