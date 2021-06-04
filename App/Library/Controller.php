<?php

namespace App\Library;

class Controller {
    public function __construct ()
    {
        //Checks for all the button Clicked
        if(array_key_exists('CreateNewBlog', $_POST)) { $this->createNewBlog($_POST); }
        elseif(array_key_exists('UpdateBlog', $_POST)) { $this->updateBlog(); }
        elseif(array_key_exists('deleteBlog', $_POST)) { $this->deleteBlog(); }
    }

    //Creates new blog and insert to database
    public function createNewBlog(array $blog) {
        global $report, $count;

        $id = $this->hashId();
        if( Blog::insert([
            'title' => sanitize($blog['title']),
            'description' => sanitize($blog['description']),
            'id' => $id,
        ])) {
            $_SESSION['report'] = "Created Successfully";
            header("Location: index.php");
        } else {
            $report = "There is an Error creating this data";
            $count = 1;
        }
    }

    //Update existing based on id to database
    public function updateBlog() {
        global $report, $count;

//        die($_POST['UpdateBlog']);
        $id = $_POST['UpdateBlog'];
        if( Blog::update([
            'title' => sanitize($_POST['title']),
            'description' => sanitize($_POST['description'])
        ], $id)) {
            $_SESSION['report'] = "Updated Successfully";
            header("Location: ?");
        } else {
            $report = "There is an Error Updating this data";
            $count = 1;
        }
    }

    //Delete existing based on id to database
    public function deleteBlog() {
        global $report, $count;

        $id = $_POST['deleteBlog'];
        if( Blog::delete($id)) {
            $report = "Deleted Successfully";
//            $_SESSION['report'] = "Deleted Successfully";
//            header("Location: ?");
        } else {
            $report = "There is an Error Updating this data";
            $count = 1;
        }
    }

    protected function hashId() {
        return substr(str_shuffle(str_repeat('123456789abcdefghijklmnopqrstuvwxyz', 11)),
            0, 11);
    }
}