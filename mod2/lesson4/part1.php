<?php
    // ИЛИ `|` в регулярных выражениях поиска
    $pattern = '#a{3}|b{3}#'; // 3 буквы a или 3 буквы b
    $replacement = '0';
    $subject = 'aaa bbb aaa ccc ddd eee fff'; // 0 0 0 ccc ddd eee fff
    $res = preg_replace($pattern, $replacement, $subject);
    // echo $res; // 0 0 0 ccc ddd eee fff


    // пример а - 5 раз b - 1 и более
    $pattern = '#a{5}|b+#'; // 3 буквы a или 3 буквы b
    $replacement = '0';
    $subject = 'aaaaa bbb aaaaa aaa ccc ddd bbbbbbbb eee fff'; //
    $res = preg_replace($pattern, $replacement, $subject);
    //echo $res; // 0 0 0 aaa ccc ddd 0 eee fff

    // пример буквы в верхнем и нижнем регистре 1 раз и более или 2 цифры
    $pattern = '#[a-zA-Z]+|\d{2}#';
    $replacement = '@';
    $subject = 'a abc abcd ajrtf 1 12 12';
    $res = preg_replace($pattern, $replacement, $subject);
    //echo $res; // 0 0 0 0 1 0 0

    // a - 3 раза, или  b - 1 раз и более, или с - 5 раз или 4 цифры
    $pattern = '#a{3}|b+|c{5}|\d{4}#';
    $replacement = '@';
    $subject = 'aaaa b 2345 cccc ffff';
    $res = preg_replace($pattern, $replacement, $subject);
    //echo $res; // 0a 0 0 cccc ffff

    // Группы символов в регулярных выражениях
    /*
     \d - обозначает цифры от 0 до 9
     \W - обозаначает все, кроме цифр от 0 до 9

     \w - обозначает цифры, буквы латинского алфавита и символ _
     \W - обозначает  НЕ цифры, НЕ буквы латинского алфавита и НЕ символ _

     \b - обозначает начало или конец слова
     \B - обозначает НЕ начало или НЕ конец слова
    */

    //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    // начинается с s заканчивается на z. Между s и z 3 цифры или 4 букы
    $pattern = '#\bs[a-zA-Z]{4}z\b|\bs\d{3}z\b#';
    $replacement = '@';
    $subject = 'aaa sACFVz s123z s333rz';
    $res = preg_replace($pattern, $replacement, $subject);
    //echo $res; // aaa @ @ s333rz

    //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    // начинается с s, далее латиница в верхнем и нижнем регистре 4 раза  или 3 цифры и в конце z
    $pattern = '#\bs[a-zA-Z]{4}|\d{3}z\b#';
    $replacement = '@';
    $subject = 'aaa sACFVz s123z s333rz';
    $res = preg_replace($pattern, $replacement, $subject);
    //echo $res; // aaa @z s@ s333rz

    // ограничителем регулярного выражения может быть не только символ #, а любой символ который не является специальным.
   // Спец. символами не являются: # ` ~ % & = _ - , : @ ' " ;

    $pattern = '@\bs[a-zA-Z]{4}|\d{3}z\b@';
    $replacement = '@';
    $subject = 'aaa sACFVz s123z s333rz';
    $res = preg_replace($pattern, $replacement, $subject);
    //echo $res; // aaa @z s@ s333rz

    // особенность экранирования обратного слеша
    $str = '\\ \\\\ \\\\\\'; // '\ \\ \\\' для того чтобы обратный
    //echo $str; // \ \\ \\\
    /*
      если \ написать один раз то это спец символ, а если два раза то это и будет обратный слэш
     */

    //_______________________________________________________
    /*
     но есть особенность в регулярных выражениях:
     В регулярных выражениях обратный слеш также является и специальным
     символом регулярного выражения PHP.

     Для того чтобы обратный слеш внутри регулярного выражения обозначал
     сам себя его необходимо написать 4 раза \\\\

     */

    $pattern = '@\\\\@'; // \
    $replacement = '@';
    $subject = 'aaa \\ bb cbfsd \\';
    $res = preg_replace($pattern, $replacement, $subject);
    //echo $res; // aaa @ bb cbfsd @

    $pattern = '@\\\\@'; // \
    $replacement = '@';
    $subject = 'aaa \\ bb \\\\ cbfsd \\';
    $res = preg_replace($pattern, $replacement, $subject);
    //echo $res; // aaa @ bb @@ cbfsd @


    // ________________________________________________________________
    /*
        В php обратный слеш являвтся спец спмволом поэтому его необходимо экранировать то есть написать дважды \\
     */
    $str = '\\';
    //echo $str;
    /*
       В регулярном выражение \ является специальным символом регудярного выражения поэтому его необходимо экранировать, то есть записать дважды \\, но так как обратный слеш являтся также спец символом php нам необходимо экранировать обратный слеш то есть написать обратный слеш в регулярном выражении 4 раза \\\\
     */

    $pattern = '#\\\\#'; // шаблон поиска - \ (обратный слеш)
    $replacement = '@';
    $subject = '\\ 111 222 332'; // \ 111 222 332
    $res = preg_replace($pattern, $replacement, $subject);
    echo $res; // @ 111 222 332