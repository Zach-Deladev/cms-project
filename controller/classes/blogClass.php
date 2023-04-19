<?php

// user class to handle user data CRUD operations

class Blog extends Database
{

    protected function createBlog($userid, $username, $title, $content)
    {
        // Prepare SQL statement to prevent SQL injection
        $stmt = $this->connection()->prepare("INSERT INTO blog (userid, username, title, content) VALUES (?, ?, ?, ?);");

        if (!$stmt->execute(array($userid, $username, $title, $content))) {
            $stmt = null;
            header("location: ../../view/pages/social.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
        header("location: ../../view/pages/social.php?error=none");
    }


    // read blog
    protected function readBlog($id)
    {
        // Prepare SQL statement to prevent SQL injection
        $stmt = $this->connection()->prepare("SELECT * FROM blog WHERE userid = :id ORDER BY date DESC, time DESC");
        $stmt->bindParam(":id", $id);
        return $stmt;
    }
    protected function readBlogNoUser()
    {

        // Set the timezone to Europe/London
        date_default_timezone_set('Europe/London');
        // Prepare SQL statement to prevent SQL injection
        $stmt = $this->connection()->prepare("SELECT * FROM blog ORDER BY date DESC, time DESC; ");
        return $stmt;
    }

    // Update blog
    protected function updateBlog($title, $content, $userid, $username, $id)
    {
        $sql = "UPDATE blog SET title = :title, content = :content WHERE userid = :userid AND username = :username AND id = :id";

        $stmt = $this->connection()->prepare($sql);

        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':userid', $userid);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }
    // delete blog

    protected function deleteBlog($id)
    {
        $sql = "DELETE FROM blog WHERE id = :id";

        $stmt = $this->connection()->prepare($sql);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }
}
