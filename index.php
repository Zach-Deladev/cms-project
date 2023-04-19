<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./view/assets/style.css">
    <link rel="stylesheet" href="./view/assets/dash.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>


    <link rel=“stylesheet” href=“https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css”>

</head>

<body>
    <?php include_once './view/navbar.php'; ?>

    <?php include_once './view/homeHero.php'; ?>

    <?php include_once './view/homeVid.php'; ?>

    <div class="blog-container">
        <h3>Social feed:</h3>
        <div id="all-feed-two">
            <div class="dashcontainer">
                <?php include_once './view/noUserBlog.php'; ?>
            </div>
        </div>
    </div>

    <?php include_once './view/footer.php'; ?>

</body>

</html>