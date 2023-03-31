<?php

trait Logger {
    protected static $logFile = 'log1.txt';

    public static function log($message){
        file_put_contents(self::$logFile, $message, FILE_APPEND);
    }
}

class MyClass {
    use Logger;

    public static function setLogFile($filename) {
        self::$logFile = $filename;
    }
}

// MyClass::log("Log message 1           "); // в файл log1.txt запишется сообщение - "Log message 1           "
// MyClass::setLogFile('log2.txt'); // меняем лог файл на log2.txt
// MyClass::log('Log message 2           '); // в файл log2.txt запишется сообщение - "Log message 2           "

MyClass::setLogFile('log1.txt');
MyClass::log('New log message 3 ...........        ');
MyClass::setLogFile('log2.txt');
MyClass::log('New log message 4 ...............       ');
