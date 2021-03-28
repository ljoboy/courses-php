<?php
/**
 * FILE PDOStatementWithClass.php
 *
 * @author Dark Angel <jonathanyombo@gmail.com>
 * @copyright DATE 2/20/2021 - 9:37 PM
 *
 * @package App\Models;
 */

namespace Database;

use App\Models\Model;
use PDO;
use PDOStatement;

/**
 * Class PDOStatementWithClass
 * @package App\Models
 */
class DBQuery extends PDOStatement
{
    private $class;
    protected function __construct ($class = Model::class) {
        $this->class = $class;
        $this->setFetchMode(PDO::FETCH_CLASS, $this->class);
    }
}
