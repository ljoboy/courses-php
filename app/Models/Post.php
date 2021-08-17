<?php
/**
 * FILE Post.php
 *
 * @author Dark Angel <jonathanyombo@gmail.com>
 * @copyright DATE 2/17/2021 - 7:14 PM
 *
 * @package App\Models;
 */

namespace App\Models;


use DateTime;
use Exception;

/**
 * @property string created_at
 * @property int id
 */
class Post extends Model
{
    public string $table = "posts";

    /**
     * @return string
     * @throws Exception
     */
    public function formattedCreatedAt(): string
    {
        return (new DateTime($this->created_at))->format('d-m-Y H:i:s');
    }

    public function getTags()
    {
        return
            $this->query("
        SELECT t.* FROM tags t
        INNER JOIN post_tag pt on t.id = pt.tag_id
        INNER JOIN posts p on pt.post_id = p.id
        WHERE p.id = ?
        ", $this->id);
    }
}
