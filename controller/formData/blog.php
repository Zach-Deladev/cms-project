<?php

if (isset($_POST["submit"])) {

    // Assign data from login form to variable
    $userid = $_POST["userid"];
    $username = $_POST["username"];
    $title = $_POST["title"];
    $content = $_POST["content"];

    // Includes blog class and controllers


    require_once "../blogContr/createBlogContr.php";
    // require_once "../blogContr/readBlogContr.php";
    // require_once "../blogContr/updateBlogContr.php";
    // require_once "../blogContr/deleteBlogContr.php";

    // Create new Blog object and pass the form data to the constructor
    $blog = new CreateBlogCont($userid, $username, $title, $content);

    // Call createBlogValidation method
    $blog->createBlogValidation();
}
