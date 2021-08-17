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
    public Post $post;

    public function __construct()
    {
        $this->post = new Post();
    }

    public function index()
    {
        $posts = $this->post->all();
        $this->view('blog.index', compact('posts'));
    }

    public function home()
    {
        $this->view('blog.welcome');
    }

    public function show(int $id)
    {
        $post = $this->post->findById($id);
        $this->view('blog.show', compact('post'));
    }
}
