<?php

/**
 * Translate tasks class from php to zephir code
 *
 * @author Julián Molina <b> jmolinac5116@ean.edu.co </b>
 * @version 0.0.1
 *
 */
class ZephirTranslateTask extends \Phalcon\CLI\Task
{

    /**
     * Means folder to convert
     * @var String
     */
    private $_root = null;

    /**
     *
     */
    public function buildAction(array $params)
    {
        $this->_root = getcwd()."/".$params[0];
        if (is_dir($this->_root)) {
            $parser = new Parser();
            if (!empty($params[1])) {
                if (Check::isDirectory($params[1]) or Check::isFile($params[1])) {
                    $parser->setSavePath($params[1]);
                } else {
                    echo TranslateException::error(__CLASS__, "The path is not valid path.");
                }
            } else {
                $parser->setSavePath($this->_root);
            }
            $parser->setRootPath($this->_root);
            $parser->parseFolder();
        } else {
            echo TranslateException::error(__CLASS__, "The root folder is invalid or do not exist.");
        }
    }
}
