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
        return $this->view('blog.index');
    }

    public function show(int $id)
    {
        return $this->view('blog.show', compact('id'));
    }
}
