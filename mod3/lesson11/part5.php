<?php

trait Log {
    public static $logFile = 'log5.txt';

    public static function write($message) {
        file_put_contents(self::$logFile, $message, FILE_APPEND);
    }
}

class MyClass {
    use Log;
}

MyClass::write("1");
MyClass::write("2");
MyClass::write("3");
MyClass::write("4");