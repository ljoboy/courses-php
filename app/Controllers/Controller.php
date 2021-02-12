<?php
/**
 * FILE Controller.php
 *
 * @author Dark Angel <jonathanyombo@gmail.com>
 * @copyright DATE 2/12/2021 - 1:02 PM
 *
 * @package App\Controllers;
 */

namespace App\Controllers;

/**
 * Class Controller
 * @package App\Controllers
 */
class Controller
{
    /**
     * Controller constructor.
     */
    public function __construct()
    {

    }

    /**
     * @param string $path
     * @param array|null $params
     */
    public function view(string $path, array $params = null)
    {
        ob_start();
        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);
        require VIEWS . $path . '.php';

        if ($params) {
            $params = extract($params);
        }

        $content = ob_get_clean();
        require VIEWS . 'layout.php';
    }
}