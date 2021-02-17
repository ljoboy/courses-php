<?php
/**
 * FILE Model.php
 *
 * @author Dark Angel <jonathanyombo@gmail.com>
 * @copyright DATE 2/17/2021 - 3:13 PM
 *
 * @package App\Models;
 */

namespace App\Models;

use Database\DBConnection;
use PDO;

/**
 * Class Model
 * @package App\Models
 */
abstract class Model
{
    protected PDO $db;
    public function __construct()
    {
        $this->db = (new DBConnection())->getPDO();
    }
}
