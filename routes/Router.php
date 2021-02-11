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
     * get Url Without Query String
     *
     * @param string $url
     * @return string
     */
    private function sanitize(string $url): string
    {
        $urlSanitized = explode('?', $url);

        return is_array($urlSanitized) ? $urlSanitized[0] : $urlSanitized;
    }
}
