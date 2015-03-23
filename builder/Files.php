<?php

/**
 * Translate tasks class from php to zephir code
 *
 * @author Julián Molina <b> jmolinac5116@ean.edu.co </b>
 * @version 0.0.1
 *
 */
class Files
{
    /**
     *
     */
    private $_fopen = null;

    /**
     *
     */
    public function open($path)
    {
        $this->_fopen = fopen($path, "w+");
    }

    /**
     *
     */
    public function write($txt)
    {
        return fwrite($this->_fopen, $txt);
    }

    /**
     *
     */
    public function getFirstLine()
    {
        return fgets($this->_fopen);
    }

    /**
     *
     */
    public function getLine()
    {
        return feof($this->_fopen);
    }

    /**
     *
     */
    public function getFopen($fopen)
    {
        return $this->_fopen;
    }

    /**
     *
     */
    public function close($fopen)
    {
        return fclose($fopen);
    }

}
