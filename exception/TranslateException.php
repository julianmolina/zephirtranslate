<?php

/**
 * Translate tasks class from php to zephir code
 *
 * @author Julián Molina <b> jmolinac5116@ean.edu.co </b>
 * @version 0.0.1
 *
 */
class TranslateException
{

    /**
     *
     */
    private $_frameStart = "";

    /**
     *
     */
    private $_frameEnd = "";

    /**
     *
     */
    private static function _addFrame($string)
    {
        $aux = "\n\n";
        $length = strlen($string) * 2;
        for ($i = 0; $i < $length; $i++) {
            if ($i < strlen($string)) {
                $aux .= "-";
            } else {
                if ($i == strlen($string)) {
                    $aux .= "\n";
                    $aux .= $string;
                    $aux .= "\n";
                }
                $aux .= "-";
            }
        }
        $aux .= "\n\n";
        return $aux;
    }

    /**
     *
     */
    private static function _addTitle($title)
    {
        return "".$title.": ";
    }

    /**
     * Error print the message with red color when is error and return message with colors
     * @param String
     * @param background color
     * @return String
     */
    public static function error($title, $message)
    {
        $colors = Colors::getInstance();
        $formated = self::_addFrame(self::_addTitle($title).$message);
        return $colors::getColoredString($formated, "white", "red");
    }

    /**
     * Error print the message with red color when is error and return message with colors
     * @param String
     * @return String
     */
    public static function success($title, $message)
    {
        $colors = Colors::getInstance();
        $formated = self::_addFrame(self::_addTitle($title).$message);
        return $colors::getColoredString($formated, "white", "green");
    }

    /**
     * Error print the message with red color when is error and return message with colors
     * @param String
     * @return String
     */
    public static function warning($title, $message)
    {
        $colors = Colors::getInstance();
        $formated = self::_addFrame(self::_addTitle($title).$message);
        return $colors::getColoredString($formated, "white", "yellow");
    }

    /**
     * Error print the message with red color when is error and return message with colors
     * @param String
     * @return String
     */
    public static function notice($title, $message)
    {
        $colors = Colors::getInstance();
        $formated = self::_addFrame(self::_addTitle($title).$message);
        return $colors::getColoredString($formated, "white", "cyan");
    }

    /**
     * Print any message with any color
     * @param $msj String
     * @param $lett String
     * @param $bck String
     * @return String
     */
    public static function printMessage($title, $msj, $lett, $bck)
    {
        $colors = Colors::getInstance();
        $formated = self::_addFrame(self::_addTitle($title).$message);
        return $colors::getColoredString($formated, $lett, $bck);
    }
}
