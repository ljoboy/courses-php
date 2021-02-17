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
    /**
     * @var PDO
     */
    private PDO $db;
    /**
     * The name of the table
     *
     * @var string
     */
    protected string $table;

    /**
     * Model constructor.
     */
    public function __construct()
    {
        $this->db = (new DBConnection())->getPDO();
    }

    /**
     * get all element from the db
     *
     * @param string $order_by
     * @param string $order_format
     * @return array
     */
    public function all(string $order_by = 'id', string $order_format = 'DESC'): array
    {
        $stmt = $this->db->query("SELECT * FROM {$this->table} ORDER BY {$order_by} {$order_format}");
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this));
        return $stmt->fetchAll();
    }
}
