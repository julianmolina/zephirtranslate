<?php

/**
 * Translate tasks class from php to zephir code
 *
 * @author Julián Molina <b> jmolinac5116@ean.edu.co </b>
 * @version 0.0.1
 * @link (original version)
 * http://www.if-not-true-then-false.com/2010/php-class-for-coloring-php-command-line-cli-scripts-output-php-output-colorizing-using-bash-shell-colors/
 */
class Colors
{

    /**
     * self instance
     * @static
     */
    private static $_instance = null;

    /**
     *
     */
    private static $_foreground_colors = array();

    /**
     *
     */
    private static $_background_colors = array();

    /**
     *
     */
    private function __construct()
    {}

    /**
     *
     */
    public static function getInstance()
    {
        self::$_foreground_colors['black'] = '0;30';
        self::$_foreground_colors['dark_gray'] = '1;30';
        self::$_foreground_colors['blue'] = '0;34';
        self::$_foreground_colors['light_blue'] = '1;34';
        self::$_foreground_colors['green'] = '0;32';
        self::$_foreground_colors['light_green'] = '1;32';
        self::$_foreground_colors['cyan'] = '0;36';
        self::$_foreground_colors['light_cyan'] = '1;36';
        self::$_foreground_colors['red'] = '0;31';
        self::$_foreground_colors['light_red'] = '1;31';
        self::$_foreground_colors['purple'] = '0;35';
        self::$_foreground_colors['light_purple'] = '1;35';
        self::$_foreground_colors['brown'] = '0;33';
        self::$_foreground_colors['yellow'] = '1;33';
        self::$_foreground_colors['light_gray'] = '0;37';
        self::$_foreground_colors['white'] = '1;37';

        self::$_background_colors['black'] = '40';
        self::$_background_colors['red'] = '41';
        self::$_background_colors['green'] = '42';
        self::$_background_colors['yellow'] = '43';
        self::$_background_colors['blue'] = '44';
        self::$_background_colors['magenta'] = '45';
        self::$_background_colors['cyan'] = '46';
        self::$_background_colors['light_gray'] = '47';

        if (is_null(self::$_instance)) {
            $class = __CLASS__;
            self::$_instance = new $class();
        }

        return self::$_instance;

    }

    /**
     * @param String - Text to print
     * @param String - color text
     * @param String - color Background
     */
    public static function getColoredString($string, $foreground_color = null, $background_color = null)
    {
        $colored_string = "";

        // Check if given foreground color found
        if (isset(self::$_foreground_colors[$foreground_color])) {
            $colored_string .= "\033[" . self::$_foreground_colors[$foreground_color] . "m";
        }

        // Check if given background color found
        if (isset(self::$_background_colors[$background_color])) {
            $colored_string .= "\033[" . self::$_background_colors[$background_color] . "m";
        }

        // Add string and end coloring
        $colored_string .=  $string . "\033[0m";

        return $colored_string;
    }

    /**
     * Returns all foreground color names
     */
    public static function getForegroundColors()
    {
        return array_keys(self::$_foreground_colors);
    }

    /**
     * Returns all background color names
     */
    public static function getBackgroundColors()
    {
        return array_keys(self::$_background_colors);
    }
}
