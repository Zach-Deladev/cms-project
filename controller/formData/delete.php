<?php

include_once '../../model/database-classes.php';
include_once '../blogContr/deleteBlogContr.php';

if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    $database = new Database();
    $blogContr = new BlogContr();

    $result = $blogContr->deleteBlogContr($id);

    if ($result) {
        header('Location: ../../view/pages/profile.php?delete=success');
    } else {
        header('Location: ../../view/pages/profile.php?delete=failure');
    }
} else {
    header('Location: ../../view/pages/profile.php');
}
