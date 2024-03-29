<?php
/**
 * Logging class.
 *
 * @package     Creovel
 * @subpackage  Modules
 * @license     http://creovel.org/license MIT License
 * @since       Class available since Release 0.4.2
 * @author      Nesbert Hidalgo
 **/
class Logger extends ModuleBase
{
    /**
     * Filename and path to log file.
     *
     * @var string
     **/
    public $filename = '';
    
    /**
     * Flag to include time stamp in logs.
     *
     * @var integer
     **/
    public $filesize_limit = 10485760; // 10 MBs
    
    /**
     * Flag to include time stamp in logs.
     *
     * @var boolean
     **/
    public $timestamp = true;
    
    /**
     * Set $filename.
     *
     * @param string $filename
     * @return void
     **/
    public function __construct($filename = '')
    {
        parent::__construct();
        
        $this->filename = $filename;
    }
    
    /**
     * Write a message to file.
     *
     * @param string $message
     * @param boolean $auto_break
     * @return boolean
     **/
    public function write($message, $auto_break = true)
    {
        clearstatcache();
        
        if (empty($this->filename)) {
            error_log("Creovel: The filename is missing from logger!");
            return false;
        }
        
        if (@filesize($this->filename) >= $this->filesize_limit) {
            $this->partition($this->filename);
        }
        
        $message = ($this->timestamp ? '[' . CDate::datetime() . '] ' : '') .
                    $message . ($auto_break ? "\n" : '');
                    
        if (!@file_put_contents($this->filename, $message, FILE_APPEND)) {
            error_log("Creovel: The file {$this->filename} is not writable!");
            return false;
        }
        
        return true;
    }
    
    /**
     * Partitions current log by renaming the current file and date stamps it.
     *
     * @return boolean
     **/
    public function partition()
    {
        return rename($this->filename, $this->filename . '.' . date('YmdHis'));
    }
} // END class Logger extends ModuleBase