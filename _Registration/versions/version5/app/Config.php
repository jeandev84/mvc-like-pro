<?php
namespace App;


/**
 * Application configuration
 * Class Config
 *
 * @package App
 */
class Config
{

    /**
      * Database host
      * @var string
     */
     const DB_HOST = 'localhost';

     /**
      * Database name
      * @var string
     */
     const DB_NAME = 'mvclikeprologin';

     /**
      * Database user
      * @var string
     */
     const DB_USER = 'root'; // mvcuser


    /**
     * Database password
     * @var string
     */
     const DB_PASSWORD = ''; // 123456


     /**
      * Show or hide error messages on screen
      * @var boolean
      *
      * (true: for development mode )
      * (false: will be generated log error file: in /temp/logs/2019-09-17.txt)
      */
      const SHOW_ERRORS = true; // false;


      /**
       * Secret key for hashing
       * @var boolean
       */
      const SECRET_KEY = 'vtQqs0XI2ToGiE07GZ8FMuNhPvlh7Dj6'; // secret



      /**
       * Mailgun API key
       *
       * @var string
      */
      const MAILGUN_API_KEY = 'YOUR-MAILGUN-API-KEY';


      /**
       * Mailgun domain
       *
       * @var string
       */
       const MAILGUN_DOMAIN = 'YOUR-MAILGUN-DOMAIN';
}