<?php
namespace Framework\Security\Encryption;

use App\Config;

/**
 * Unique random tokens
 *
 * Class Token
 * @package Framework\Security\Encryption
 */
class Token
{
    /**
     * The token value
     * @var array
     */
    protected $token;


    /**
     * Token constructor.
     * Class constructor. Create a new random token .
     *
     * @return void
     * @throws \Exception
     */
     public function __construct($token_value = null)
     {
         if($token_value)
         {
             $this->token = $token_value;
         }else {
             $this->token = bin2hex(random_bytes(16));
         }
         /*
         $this->token = bin2hex(random_bytes(16));
         16 bytes = 128 bits = 32 hexa characters.
         */
     }


    /**
     * Get the token value
     *
     * @return string The value
     */
     public function getValue()
     {
         return $this->token;
     }


    /**
     * Get the hashed token value
     *
     * @return string The hashed value
     */
     public function getHash()
     {
         return hash_hmac('sha256', $this->token, Config::SECRET_KEY); // sha256 = 64 chars.
         /* hash_hmac('sha256', $this->token, "secret"); sha256 = 64 chars. */
     }

}

/**
$token = new \Framework\Security\Encryption\Token();
echo $token->getValue();
*/