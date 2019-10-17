<?php
namespace App\Models;


use Framework\Database\Model;
use PDO;
use PDOException;


/**
 * Class Post
 * @package App\Models
 */
class Post extends Model
{


    /**
     * Get all the posts as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        try {

            $db = static::getDB();

            $stmt = $db->query('SELECT id, title, content FROM posts ORDER BY created_at');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;

        } catch (PDOException $e) {

        }
    }
}