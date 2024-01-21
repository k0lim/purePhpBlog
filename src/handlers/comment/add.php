<?php

if (!empty($_POST)):

    $dbOptions = (require  $_SERVER['DOCUMENT_ROOT'] . '/src/settings.php')['db'];

    $postId = $_POST['postId'];
    $comment = $_POST['comment'];

    // Create connection
    $conn = mysqli_connect(
        $dbOptions['host'],
        $dbOptions['user'],
        $dbOptions['password'],
        $dbOptions['dbname']
    );
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        //echo 'succes comment';
    }
    $result = mysqli_query($conn,"INSERT INTO `comment` (`id`, `post_id`, `content`) VALUES (NULL, '$postId', '$comment')");

    if ($result == 1){
        header('Location: /templates/detail.php?post_id=' . $postId);
        exit();
    } else {
        echo 'db insert error';
    }

endif;
