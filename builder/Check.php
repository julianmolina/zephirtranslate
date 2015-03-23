<?php

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
        TranslateException::notice("test", $path);
        $files = new Files();
        $files->open($path);
        while (!$files->getLine()) {
            echo $files->getFirstLine()."\n";
        }
    }
}
