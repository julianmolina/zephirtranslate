<?php

/**
 * Translate tasks class from php to zephir code
 *
 * @author Julián Molina <b> jmolinac5116@ean.edu.co </b>
 * @version 0.0.1
 *
 */
class Parser
{

    /**
     *
     */
    private $_savePath = null;

    /**
     *
     */
    private $_rootPath = null;

    /**
     *
     */
    private $_destinyPath = null;

    /**
     *
     */
    private $_destinyFilePath = null;

    /**
     * Read folder and build new folder with zephir
     * @param String $folderRoot
     * @return void
     */
    public function parseFolder()
    {
        if (Check::isDirectory($this->_rootPath)) {

            $notFound = false;
            $foldersCreated = 0;
            $filesCreated = 0;
            $temporaryPath = "";

            $objects = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($this->_rootPath),
                RecursiveIteratorIterator::SELF_FIRST
            );

            foreach ($objects as $path) {

                if (Check::isFile($path) and Check::isPhpFile($path)) {

                    if ($this->_createFolder(dirname($path))) {
                        $foldersCreated++;
                    }
                    $filesCreated += $this->_copyFile($path);
                    Check::isClass($this->_destinyFilePath);
                    $notFound = true;
                }
            }

            echo TranslateException::success("Folders Created", $foldersCreated);
            echo TranslateException::success("Files Created", $filesCreated);

            if ($notFound == false) {
                echo TranslateException::notice("NotFound", "ZephirTranslate not found files php to convert to zephir.");
            }

        } else {
            echo TranslateException::error(__CLASS__."->".__METHOD__, "The path output is not set");
        }
    }

    /**
     *
     */
    private function _copyFile($path)
    {
        $filename = pathinfo($path);
        $this->_destinyFilePath = $this->_destinyPath."/".$filename["filename"].".zep";
        if (copy($path, $this->_destinyFilePath)) {
            return 1;
        } else {
            echo TranslateException::warning("Error file copy", "This file cannot created: {$this->_destinyFilePath}");
            return 0;
        }
    }

    /**
     *
     */
    private function _createFolder($path)
    {
        $this->_destinyPath = $this->_savePath.$this->_getPathFromBaseline($path);
        if (Check::isDirectory($this->_destinyPath)) {
            return false;
        } else {
            $res = mkdir($this->_destinyPath, 0777, true);
            chmod($this->_destinyPath, 0777);
            return $res;
        }
    }

    /**
     *
     */
    private function _getPathFromBaseline($string)
    {
        $string = (string) $string;
        $whenCut = strpos($string, $this->_getLastFolder());
        $outPut = "";
        for ($i = 0; $i < strlen($string); $i++) {
            if ($i >= $whenCut) {
                $outPut .= $string[$i];
            }
        }
        $baseFolder = "zephir_".strtolower($this->_getLastFolder());
        $path = str_replace($this->_getLastFolder(), $baseFolder, $outPut);
        return $path;
    }

    /**
     * Extract base folder to be created.
     * @return String
     */
    private function _getLastFolder()
    {
        return basename($this->_rootPath);
    }

    /**
     *
     */
    public function setSavePath($var)
    {
        $this->_savePath = $var;
    }

    /**
     *
     */
    public function setRootPath($var)
    {
        $this->_rootPath = $var;
    }
}
