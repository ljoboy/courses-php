<?php
/**
 * FILE Route.php
 *
 * @author Dark Angel <jonathanyombo@gmail.com>
 * @copyright DATE 2/12/2021 - 10:49 AM
 *
 * @package Router;
 */

namespace Router;


/**
 * Class Route
 * @package Router
 */
class Route
{

    /**
     * @var string
     */
    public string $path;
    /**
     * @var string
     */
    public string $action;

    /**
     * Route constructor.
     * @param string $path
     * @param string $action
     */
    public function __construct(string $path, string $action)
    {
        $this->path = $path;
        $this->action = $action;
    }
}
