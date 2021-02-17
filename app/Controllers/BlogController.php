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


use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $post = new Post();
        $posts = $post->all();
        var_dump($posts);die;
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
