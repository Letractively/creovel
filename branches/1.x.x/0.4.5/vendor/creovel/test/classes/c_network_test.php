<?php
/**
 * Unit tests for CNetwork object.
 *
 * @access      private
 * @package     Creovel
 * @subpackage  UnitTest
 * @license     http://creovel.org/license MIT License
 * @since       Class available since Release 0.4.5
 * @author      Nesbert Hidalgo
 **/
require_once dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'env.php';

/**
 * Test class for CNetwork.
 * Generated by PHPUnit on 2010-06-04 at 14:11:56.
 */
class CNetworkTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var CNetwork
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new CNetwork;
        $_SERVER['HTTP_HOST'] = 'www.creovel.org';
        $_SERVER['REMOTE_ADDR'] = '10.10.10.10';
        $_SERVER['REQUEST_URI'] = '/index.php';
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        putenv('HTTPS=off');
    }

    public function testIp()
    {
        $this->assertEquals($_SERVER['REMOTE_ADDR'], CNetwork::ip());
    }

    public function testHttp()
    {
        $this->assertEquals('http://', CNetwork::http());
        putenv('HTTPS=on');
        $this->assertEquals('https://', CNetwork::http());
    }

    public function testHost()
    {
        $this->assertEquals('www.creovel.org', CNetwork::host());
    }

    public function testHttp_host()
    {
        $this->assertEquals('http://www.creovel.org', CNetwork::http_host());
        putenv('HTTPS=on');
        $this->assertEquals('https://www.creovel.org', CNetwork::http_host());
    }

    public function testUrl()
    {
        $this->assertEquals('http://www.creovel.org/index.php', CNetwork::url());
    }

    public function testDomain()
    {
        $this->assertEquals('creovel.org', CNetwork::domain());
    }

    public function testTld()
    {
        $this->assertEquals('org', CNetwork::tld());
    }

    public function testInt_ip()
    {
        $this->assertEquals('2130706433', CNetwork::int_ip('127.0.0.1'));
        $this->assertEquals('3221234342', CNetwork::int_ip('192.0.34.166'));
    }
    
    public function testIs_ssl()
    {
        $this->assertFalse(CNetwork::is_ssl());
        putenv('HTTPS=on');
        $this->assertTrue(CNetwork::is_ssl());
    }
    
    public function testIs_ip()
    {
        $this->assertTrue(CNetwork::is_ip('127.0.0.1'));
        $this->assertFalse(CNetwork::is_ip('boom'));
    }
}
?>
