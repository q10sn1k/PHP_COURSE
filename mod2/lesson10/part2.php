<?php
    $subject = 'ajfkgrg 1234567 dfgвапр oiuerhgoiehgori knonihwoeignoi';
    $pattern = '#[a-zA-Zа-яА-Я0-9ёЁ_-]{7}#u';
    $res = preg_match_all($pattern, $subject, $matches);
    //print_r($matches);
    /*
        [
             [0] => [
                [0] => ajfkgrg,
                [1] => 1234567,
                [2] => dfgвапр,
                [3] => oiuerhg,
                [4] => oiehgor,
                [5] => knonihw,
                [6] => oeignoi
            ]
        ]
     */

    //print_r($matches[0]);

    /*
      [
         [0] => ajfkgrg,
         [1] => 1234567,
         [2] => dfgвапр,
         [3] => oiuerhg,
         [4] => oiehgor,
         [5] => knonihw,
         [6] => oeignoi
      ]

     */
    $counter = 0;
    foreach ($matches[0] as $item){
        $counter++;
    }

    echo $counter;