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
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function show()
    {
        echo $this->url;
    }
}
