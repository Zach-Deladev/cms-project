<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<?php
include_once './model/database-classes.php';
include_once './controller/classes/blogClass.php';
include_once './controller/blogContr/readBlogContr.php';

// Create a new instance of the database class
$database = new Database();

// Create a new instance of the ReadBlogCont class
$readBlogCont = new ReadBlogCont();

// Check if a user is logged in
if (isset($_SESSION["username"])) {
    // Set the username
    $username = $_SESSION["username"];

    // get the prepared statement
    $stmt = $readBlogCont->fetchAllBlogsNoUser();
} else {
    // User is not logged in; fetch all blog posts
    $stmt = $readBlogCont->fetchAllBlogsNoUser();
}

// Execute statement
$stmt->execute();

// Fetch all rows
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Generate table rows
foreach ($result as $row) {
    echo  "<div id='table'>";
    echo "<div id='post-cont'>";
    echo "  <div id='post-head'>";
    echo "      <div class='head-left'>";
    echo "          <img src='./view/assets/imgs/avatar.png' alt='avatar' class='post-img'>";
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
