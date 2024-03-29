<?php
/**
 * A wrapper class to mcrypt for encryption/decryption which supports a wide
 * variety of block algorithms.
 *
 * @package     Creovel
 * @subpackage  Modules
 * @license     http://creovel.org/license MIT License
 * @since       Class available since Release 0.3.0
 * @author      Nesbert Hidalgo
 **/
class Cipher extends ModuleBase
{
    /**
     * Encrypts plaintext with given parameters. <b>Make sure to use the same
     * key for encrypt & decrypt and also same encryption level<b>.
     *
     * <code>
     * function encrypt($str) {
     *     return Cipher::encrypt($str, 2, KEY_STRING);
     * }
     * </code>
     *
     * @param string $str
     * @param integer $level Encryption level, 4 being the strongest/slower.
     * @param string $key String key used to lock/unlock encryption.
     * @return string
     **/
    public static function encrypt($str, $level = 1, $key = 'please change')
    {
        switch ($level) {
            case 1:
            default:
                $return = mcrypt_encrypt(MCRYPT_XTEA,
                                        $key,
                                        $str,
                                        MCRYPT_MODE_ECB,
                                        self::iv1()
                                        );
                break;
                
            case 2:
                $return = mcrypt_encrypt(MCRYPT_SERPENT,
                                        $key,
                                        $str,
                                        MCRYPT_MODE_ECB,
                                        self::iv2()
                                        );
                break;
                
            case 3:
                $return = mcrypt_encrypt(MCRYPT_SAFERPLUS,
                                        $key,
                                        $str,
                                        MCRYPT_MODE_ECB,
                                        self::iv3()
                                        );
                break;
            
            case 4:
                $return = mcrypt_encrypt(MCRYPT_RIJNDAEL_256,
                                        $key,
                                        $str,
                                        MCRYPT_MODE_ECB,
                                        self::iv4()
                                        );
                break;
        }
        return base64_encode($return);
    }
    
    /**
     * Decrypts crypttext with given parameters. * Make sure to use the same
     * key for encrypt & decrypt and also same encryption level.
     *
     * <code>
     * function decrypt($str) {
     *     return cipher::decrypt($str, 2, KEY_STRING);
     * }
     * </code>
     *
     * @param string $str
     * @param integer $level Encryption level, 4 being the strongest/slower.
     * @param string $key String key used to lock/unlock encryption.
     * @return string
     **/
    public static function decrypt($str, $level = 1, $key = 'please change')
    {
        $str = base64_decode($str);
        switch ($level) {
            case 1:
            default:
                $return = mcrypt_decrypt(MCRYPT_XTEA,
                                        $key,
                                        $str,
                                        MCRYPT_MODE_ECB,
                                        self::iv1()
                                        );
                break;
            
            case 2:
                $return = mcrypt_decrypt(MCRYPT_SERPENT,
                                        $key,
                                        $str,
                                        MCRYPT_MODE_ECB,
                                        self::iv2()
                                        );
                break;
            
            case 3:
                $return = mcrypt_decrypt(MCRYPT_SAFERPLUS,
                                        $key,
                                        $str,
                                        MCRYPT_MODE_ECB,
                                        self::iv3()
                                        );
                break;
            
            case 4:
                $return = mcrypt_decrypt(MCRYPT_RIJNDAEL_256,
                                        $key,
                                        $str,
                                        MCRYPT_MODE_ECB,
                                        self::iv4()
                                        );
                break;
        }
        return trim($return);
    }
    
    private static function iv1()
    {
        return mcrypt_create_iv(
                    mcrypt_get_iv_size(MCRYPT_XTEA, MCRYPT_MODE_ECB),
                    MCRYPT_RAND);
    }
    
    private static function iv2()
    {
        return mcrypt_create_iv(
                    mcrypt_get_iv_size(MCRYPT_SERPENT, MCRYPT_MODE_ECB),
                    MCRYPT_RAND);
    }
    
    private static function iv3()
    {
        return mcrypt_create_iv(
                    mcrypt_get_iv_size(MCRYPT_SAFERPLUS, MCRYPT_MODE_ECB),
                    MCRYPT_RAND);
    }
    
    private static function iv4()
    {
        return mcrypt_create_iv(
                    mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB),
                    MCRYPT_RAND);
    } 
} // END class Cipher extends ModuleBase