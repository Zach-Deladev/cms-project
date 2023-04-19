<?php

include_once '../../model/database-classes.php';
include_once '../../controller/classes/blogClass.php';
include_once '../../controller/blogContr/readBlogContr.php';

$database = new Database();
$blog = new Blog();

// Create a new instance of the ReadBlogCont class
$readBlogCont = new ReadBlogCont();

// get the prepared statement
$stmt = $readBlogCont->fetchAllBlogsNouser();

// Execute statement
$stmt->execute();

// Fetch all rows
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<div id='all-feed'>";
foreach ($result as $row) {
    echo  "<div id='table'>";
    echo "<div id='post-cont'>";
    echo "  <div id='post-head'>";
    echo "      <div class='head-left'>";
    echo "          <img src='../assets/imgs/avatar.png' alt='avatar' class='post-img'>";
    echo "          <h5>" . htmlspecialchars($row["username"]) . "</h5>";
    echo "          <span>" . htmlspecialchars($row["date"]) . "</span>";
    echo "      </div>";
    echo "  </div>";
    echo "  <div id='post-title'>";
    echo "      <strong>" . htmlspecialchars($row["title"]) . "</strong>";
    echo "  </div>";
    echo "  <div id='post-content'>";
    echo "      <p>" . htmlspecialchars($row["content"]) . "</p>";
    echo "  </div>";
    echo "</div>";
    echo "</div>";
}

echo "</div>";
