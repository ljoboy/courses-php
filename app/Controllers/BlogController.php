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


class BlogController
{
    public function index()
    {
        echo "Home page...";
    }

    public function show(int $id)
    {
        echo "Post $id...";
    }
}
