<?php
/**
 * FILE DBConnection.php
 *
 * @author Dark Angel <jonathanyombo@gmail.com>
 * @copyright DATE 2/12/2021 - 2:30 PM
 *
 * @package Database;
 */

namespace Database;

use PDO;

/**
 * Class DBConnection
 * @package Database
 */
class DBConnection
{
    /**
     * @var string
     */
    private string $dbname;
    /**
     * @var string
     */
    private string $host;
    /**
     * @var string
     */
    private string $username;
    /**
     * @var string
     */
    private string $password;

    /**
     * @var PDO
     */
    private PDO $pdo;

    /**
     * DBConnection constructor.
     * get information from environment
     *
     */
    public function __construct()
    {
        $this->dbname = getenv('DB_NAME');
        $this->host = getenv('DB_HOST');
        $this->username = getenv('DB_USER');
        $this->password = getenv('DB_PASS');
    }

    /**
     * @return PDO
     */
    public function getPDO(): PDO
    {
        return $this->pdo ??
            $this->pdo = new PDO("mysql:dbname={$this->dbname};host={$this->host};charset=utf8", $this->username, $this->password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            ]);
    }
}
