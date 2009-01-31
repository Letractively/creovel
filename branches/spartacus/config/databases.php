<?php
/**
 * Set database connection settings.
 *
 * @package     Creovel
 * @subpackage  Creovel.Config
 * @license     http://creovel.org/license MIT License
 * @since       Class available since Release 0.2.0
 **/

/**
 * Development settings.
 */
CREO('database', array(
    'mode'      => 'development',
    'adapter'   => 'mysql_improved',
    'host'      => 'localhost',
    'username'  => '',
    'password'  => '',
    'default'   => 'creovel_development'
    ));

/**
 * Test settings.
 */
CREO('database', array(
    'mode'      => 'test',
    'adapter'   => 'mysql_improved',
    'host'      => 'localhost',
    'username'  => '',
    'password'  => '',
    'default'   => 'creovel_test'
    ));

/**
 * Production settings.
 */
CREO('database', array(
    'mode'      => 'production',
    'adapter'   => 'mysql_improved',
    'host'      => 'localhost',
    'username'  => '',
    'password'  => '',
    'default'   => 'creovel_production'
    ));