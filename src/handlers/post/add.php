<?include $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php'; ?>
    <?php
        $dbOptions = (require $_SERVER['DOCUMENT_ROOT']. '/src/settings.php')['db'];

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
        $result = mysqli_query($conn, "INSERT INTO `post` (`id`, `title`, `author`, `preview`, `content`) VALUES (NULL, '$postTitle', '$postAuthor', '$postPreview', '$postDetail')");
        if ($result) {
            header('Location: /');
            exit();
        } else {
            echo 'db insert error';
        }
    ?>
<?include $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php'; ?>

