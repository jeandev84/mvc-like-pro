<?php
namespace Framework\Database;


use PDO;

/**
 * Class Model
 * @package Framework\Database
 */
abstract class Model
{

    const DB_CONFIG = [
        'host' => 'localhost',
        'dbname' => 'mvclikepro',
        'username' => 'root',
        'password' => ''
    ];


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
           try {

               $dsn = sprintf('mysql:host=%s;dbname=%s;charset=utf8',
                   self::DB_CONFIG['host'],
                   self::DB_CONFIG['dbname']
               );

               $db = new PDO($dsn, self::DB_CONFIG['username'], self::DB_CONFIG['password']);

           } catch (\PDOException $e) {
               die($e->getMessage());
           }

           return $db;
       }
   }
}