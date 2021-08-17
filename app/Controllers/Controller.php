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
abstract class Controller
{

    /**
     * @param string $path
     * @param array|null $params
     */
    protected function view(string $path, array $params = null)
    {
        if ($params) {
            extract($params);
            unset($params);
        }

        ob_start();
        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);
        require VIEWS . $path . '.php';

        $content = ob_get_clean();
        require VIEWS . 'layout.php';
    }
}
