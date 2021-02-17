<?php
/**
 * FILE BlogController.php
 *
 * @author Dark Angel <jonathanyombo@gmail.com>
 * @copyright DATE 2/12/2021 - 10:41 AM
 *
 * @package App\Controllers;
 */

namespace App\Controllers;


class BlogController extends Controller
{
    public function index()
    {
        $posts = $this->db->query('SELECT * FROM posts ORDER BY created_at DESC')->fetchAll();
        $this->view('blog.index', compact('posts'));
    }

    public function home()
    {
        $this->view('blog.welcome');
    }

    public function show(int $id)
    {
        $posts = $this->db->query('SELECT * FROM posts')->fetchAll();
        $this->view('blog.show', compact('id'));
    }
}
