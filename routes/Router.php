<?php
/**
 * FILE Router.php
 *
 * @author Dark Angel <jonathanyombo@gmail.com>
 * @copyright DATE 2/8/2021 - 12:31 AM
 */

namespace Router;

/**
 * Class Router
 * @package Router
 */
class Router
{
    /**
     * @var string
     */
    public string $url;

    /**
     * @var array
     */
    public array $routes;

    /**
     * Router constructor.
     */
    public function __construct()
    {
        $this->url = $this->currentUrl();
    }

    public function show()
    {
        echo $this->url;
    }

    /**
     * Getting current url
     *
     * @return string
     */
    public function currentUrl(): string
    {
        return $this->sanitize($_SERVER['REQUEST_URI']);
    }

    /**
     * get Url Without Query String and sanitized
     *
     * @param string $url
     * @return string
     */
    private function sanitize(string $url): string
    {
        $urlSanitized = explode('?', $url);


        $urlSanitized = is_array($urlSanitized) ? $urlSanitized[0] : $urlSanitized;

        return trim($urlSanitized, '/');
    }

    /**
     * for the get Request_method
     *
     * @param string $path
     * @param string $action
     */
    public function get(string $path, string $action)
    {
        $this->routes['GET'][] = new Route($path, $action);
    }

    /**
     * for the post Request_method
     *
     * @param string $path
     * @param string $action
     */
    public function post(string $path, string $action)
    {
        $this->routes['POST'] = new Route($path, $action);
    }
}
