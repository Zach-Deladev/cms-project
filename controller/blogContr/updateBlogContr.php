<?php

include_once '../../model/database-classes.php';
include_once '../../controller/classes/blogClass.php';

class BlogContr extends Blog
{
    public function updateBlogContr($title, $content, $userid, $username, $id)
    {
        return $this->updateBlog($title, $content, $userid, $username, $id);
    }
}
