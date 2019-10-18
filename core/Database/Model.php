<?php
namespace Framework\Database;


use App\Config;
use PDO;

/**
 * Class Model
 * @package Framework\Database
 */
abstract class Model
{


    /**
     * Get the PDO database connection
     *
     * @return mixed
     */
    public static function getDB()
    {
       static $db = null;

       if($db === null)
       {
               $dsn = sprintf('mysql:host=%s;dbname=%s;charset=utf8',
                   Config::DB_HOST,
                   Config::DB_NAME
               );

               $db = new PDO($dsn, Config::DB_USER, Config::DB_PASSWORD);

               // Throw an Exception when an error occurs
               $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       }

        return $db;
   }
}