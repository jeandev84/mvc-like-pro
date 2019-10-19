<?php
namespace App\Models;


use Framework\Database\Model;
use PDO;
use PDOException;


/**
 * Class Post
 * @package App\Models
 */
class User extends Model
{


    /**
     * Get all the posts as an associative array
     *
     * @return array
     */
    /*
    public static function getAll()
    {
            $db = static::getDB();
            $stmt = $db->query('SELECT id, name FROM users');
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    */
}
