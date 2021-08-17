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
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} ORDER BY :order_by :order_format");
        $stmt->execute(
            [
                'order_by' => $order_by,
                'order_format' => $order_format
            ]
        );
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this));
        return $stmt->fetchAll();
    }

    /**
     * find by id
     *
     * @param int $id
     * @return Model|null
     */
    public function findById(int $id): ?Model
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this));
        return $stmt->fetch();
    }

    /**
     * @param string $column
     * @param string $sign
     * @param string $value
     * @return array
     */
    public function where(string $column, string $sign, string $value): array
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE {$column} {$sign} :{$column}");
        $stmt->execute(["{$column}" => $value]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this));
        return $stmt->fetchAll();
    }

    public function query(string $sql, int $params = null, bool $single = null)
    {
        $method = is_null($params) ? 'query' : 'prepare';
        $fetch = is_null($single) ? 'fetchAll' : 'fetch';

        $stmt = $this->db->$method($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this));

        if ($method !== 'query') {
            $stmt->execute([$params]);
        }

        return $stmt->$fetch();
    }
}
