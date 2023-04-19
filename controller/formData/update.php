<?php

include_once '../../model/database-classes.php';
include_once '../blogContr/updateBlogContr.php';

if (isset($_POST['submit'])) {
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $content = isset($_POST['content']) ? $_POST['content'] : '';
    $userid = isset($_POST['userid']) ? $_POST['userid'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $database = new Database();
    $blogContr = new BlogContr();

    $result = $blogContr->updateBlogContr($title, $content, $userid, $username, $id);

    if ($result) {
        header('Location: ../../../view/pages/profile.php?update=success');
    } else {
        header('Location: ../../../view/pages/profile.php?update=failure');
    }
} else {
    header('Location: ../../pages/profile.php');
}
