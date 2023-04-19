<?php

class ReadBlogCont extends Blog
{
    public function fetchAllBlogs($username)
    {
        return $this->readBlog($username);
    }

    public function fetchAllBlogsNoUser()
    {
        return $this->readBlogNoUser();
    }
}
