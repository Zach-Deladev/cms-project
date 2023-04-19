<?php include_once '../../model/database-classes.php';
include_once '../../controller/classes/blogClass.php';
include_once '../../controller/blogContr/readBlogContr.php';

// Create a new instance of the database class
$database = new Database();

// Set the user ID 
$id = $_SESSION["userid"];

// Create a new instance of the ReadBlogCont class
$readBlogCont = new ReadBlogCont();

// get the prepared statement
$stmt = $readBlogCont->fetchAllBlogs($id);

// Execute statement
$stmt->execute();

// Fetch all rows
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Generate table rows
foreach ($result as $row) {

    echo "<div id='table'>";
    if (isset($_GET["username"]) && $row["username"] == $_GET["username"]) {
        // create a form to edit the blog title and content
        echo "  <div id='post-cont'>";
        echo "      <div id='post-head'>";
        echo "          <div class='head-left'>";
        echo "              <img src='../assets/imgs/avatar.png' alt='avatar' class='post-img'>";
        echo "              <h5>" . htmlspecialchars($row["username"]) . "</h5>";
        echo "              <span>" . htmlspecialchars($row["date"]) . "</span>";
        echo "          </div>";
        echo "      </div>";
        echo "      <form action='../../controller//formData/update.php' method='post'>";
        echo "          <input type='hidden' name='id' value='" . htmlspecialchars($row["id"]) . "'>";
        echo "          <div id='post-title'>";
        echo "              <input style='width:100%; type='text' name='title' value='" . htmlspecialchars($row["title"]) . "'>";
        echo "          </div>";
        echo "          <div id='post-content'>";
        echo "              <textarea style='width:100%; value='" . htmlspecialchars($row["content"]) . " name='content' id='content' cols='30' rows='5'>" . $row["content"] . "</textarea>";
        echo "          </div>";
        echo "          <input type='hidden' name='userid' value='" . htmlspecialchars($row["userid"]) . "'>";
        echo "          <input type='hidden' name='username' value='" . htmlspecialchars($row["username"]) . "'>";

        echo "          <input class='btn btn-primary' type='submit' name='submit' value='Update'>";
        echo "      </form>";
        echo "  </div>";
    } elseif ($row["userid"] == $id) {
        echo "  <div id='post-cont'>";
        echo "      <div id='post-head'>";
        echo "          <div class='head-left'>";
        echo "              <img src='../assets/imgs/avatar.png' alt='avatar' class='post-img'>";
        echo "              <h5>" . htmlspecialchars($row["username"]) . "</h5>";
        echo "              <span>" . htmlspecialchars($row["date"]) . "</span>";
        echo "          </div>";
        echo "      </div>";
        echo "      <div id='post-title'>";
        echo "          <strong>" . htmlspecialchars($row["title"]) . "</strong>";
        echo "      </div>";
        echo "      <div id='post-content'>";
        echo "          <p>" . htmlspecialchars($row["content"]) . "</p>";
        echo "      </div>";

        echo "      <div id='post-actions'>";
        echo "          <a href='?username=" . htmlspecialchars($row["username"]) . "' class='edit' data-id='" . htmlspecialchars($row["id"]) . "' role='button'>Edit</a>";
        echo '         <form action="../../controller/formData/delete.php" method="post">';
        echo '              <input type="hidden" name="id" value="' . htmlspecialchars($row['id']) . '">';
        echo '              <button type="submit" name="delete" class="delete">Delete</button>';
        echo '          </form>';
        echo "      </div>";
        echo "  </div>";
    }

    echo "</div>";
}
