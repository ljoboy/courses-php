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
     * @var array
     */
    public array $action;
    /**
     * @var array
     */
    public array $matches_url;

    /**
     * Route constructor.
     * @param string $path
     * @param array $action
     */
    public function __construct(string $path, array $action)
    {
        $this->path = trim($path, '/');
        $this->action = $action;
    }

    /**
     * @param string $url
     * @return bool
     */
    public function matches(string $url): bool
    {
        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);
        $pathToMatch = "#^$path$#";

        if (preg_match($pathToMatch, $url, $matches)) {
            $this->matches_url = $matches;
            return true;
        }

        return false;
    }

    /**
     * @return mixed
     */
    public function execute()
    {
        $controller = new $this->action[0]();
        $method = $this->action[1];

        return isset($this->matches_url[1]) ? $controller->$method($this->matches_url[1]) : $controller->$method();
    }
}
