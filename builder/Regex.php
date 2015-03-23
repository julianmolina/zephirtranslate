<?php

/**
 * Translate tasks class from php to zephir code
 *
 * @author Julián Molina <b> jmolinac5116@ean.edu.co </b>
 * @version 0.0.1
 *
 */
class Regex
{

    /**
     * Check if contain a class php
     * @return Boolean
     */
    public static function isClass($string)
    {
        $string = str_replace(" ", "", $string);
        return preg_match("/class+\w/", $string);
    }
}
