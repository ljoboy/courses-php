<?php
/**
 * FILE DBRow.php
 *
 * @author Dark Angel <jonathanyombo@gmail.com>
 * @copyright DATE 2/20/2021 - 9:38 PM
 *
 * @package App\Models;
 */

namespace Database;


use ArrayObject;

class DBRow extends ArrayObject
{

    /**
     * @param string $name
     * @param $val
     */
    public function __set(string $name, $val)
    {
        $this[$name] = $val;
    }

    /**
     * @param string $name
     * @return false|mixed
     */
    public function __get(string $name)
    {
        return $this[$name];
    }
}
