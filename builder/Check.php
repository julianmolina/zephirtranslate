<?php

/**
 * Translate tasks class from php to zephir code
 *
 * @author Julián Molina <b> jmolinac5116@ean.edu.co </b>
 * @version 0.0.1
 *
 */
class Check
{
    /**
     *
     */
     public static function isFile($file)
     {
         if (file_exists($file)) {
             return true;
         } else {
             return false;
         }
     }

    /**
     *
     */
     public static function isDirectory($directory)
     {
         if (is_dir($directory)) {
             return true;
         } else {
             return false;
         }
     }

    /**
     * Check if is a php file extension
     * @return boolean
     */
    public static function isPhpFile($path)
    {
        $pathinfo = pathinfo($path);
        if (isset($pathinfo["extension"])) {
            if (strtolower($pathinfo["extension"]) == "php") {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     *
     */
    public static function isClass($path)
    {
        $file = fopen($path, "r");
        $string = fread($file, filesize($path));
        if (Regex::isClass($string) === 1) {
            fclose($file);
            return true;
        }
        fclose($file);
        return false;
    }
}
