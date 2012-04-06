<?php

require_once('Reporter.php');

class Metrics
{
    protected static $reporters = array();

    public static function meter($key)
    {
        $result = self::findMatchingKeyMask($key);
        if (!$result) {
            throw new InvalidArgumentException('No reporter found.');
        }
        return self::$reporters[$result['key_mask']]->meter($result['matchedKey']);
    }

    public static function counter($key)
    {
        $result = self::findMatchingKeyMask($key);
        if (!$result) {
            throw new InvalidArgumentException('No reporter found.');
        }
        return self::$reporters[$result['key_mask']]->counter($result['matchedKey']);
    }

    public static function timer($key)
    {
        $result = self::findMatchingKeyMask($key);
        if (!$result) {
            throw new InvalidArgumentException('No reporter found.');
        }
        return self::$reporters[$result['key_mask']]->timer($result['matchedKey']);
    }

    public static function event($key)
    {
        $result = self::findMatchingKeyMask($key);
        if (!$result) {
            throw new InvalidArgumentException('No reporter found.');
        }
        return self::$reporters[$result['key_mask']]->event($result['matchedKey']);
    }

    public static function reporter($key_mask)
    {
        return new \metrics\Reporter($key_mask);
    }

    public static function saveReporter($key_mask, $reporter)
    {
        self::$reporters[$key_mask] = $reporter;
        return $reporter;
    }

    private static function findMatchingKeyMask($key)
    {
        foreach (self::$reporters as $regex => $reporter) {
            if (preg_match('/' . $regex . '/', $key, $matches)) {
                return array('matchedKey' => $matches[sizeof($matches) - 1], 'key_mask' => $regex);
            }
        }
        return false;
    }
}