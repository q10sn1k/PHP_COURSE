<?php
 class User {
     private static int $count = 0;

     public static function getCount(): int {
         return self::$count;
     }
     public function __construct() {
         self::$count++;
     }
 }


// $user1 = new User();
// $user2 = new User();
// $user3 = new User();
// $user4 = new User();
// $user5 = new User();

echo User::getCount();