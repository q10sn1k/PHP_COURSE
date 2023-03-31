<?php

trait Log {
    protected static $logFile = 'log.txt';

    public static function write($message) {
        file_put_contents(self::$logFile, $message, FILE_APPEND);
    }
}

class MyClass {
    use Log;
}

MyClass::write(" MESSAGE3 ");