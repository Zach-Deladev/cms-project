<?php

include_once '../../model/database-classes.php';
include_once '../../controller/classes/blogClass.php';

class BlogContr extends Blog
{
    public function deleteBlogContr($id)
    {
        return $this->deleteBlog($id);
    }
}
