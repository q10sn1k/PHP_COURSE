<?php

trait Log {
    public static function write($message) {
        echo $message;
    }
}

class MyClass{
    use Log;
}

MyClass::write(" MESSAGE3");