<?php
// Использование статичного метода в трейте
trait Log {
    public static function write($message) {
        echo $message;
    }
}

class MyClass {
    use Log;
}

MyClass::write('Today is a good day');
echo "<br>";
//_______________________________________________
//_______________________________________________
// использование не статичного метода в трейте
trait notStaticLog {
    public function write($message) {
        echo $message;
    }
}

class NotStaticMyClass {
    use notStaticLog;
}
$notStaticMessage = new NotStaticMyClass();
$notStaticMessage->write("Today is a very good day");