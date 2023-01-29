<?php
    // 0 zzz x ffff - желаемый результат
    // Ограничение жадности в регулярных выражениях
    $pattern = '#a.+x#';
    $replacement = '0';
    $subject = 'aeeex zzz x ffff'; // 0 fff - результат по факту.
    //echo $res = preg_replace($pattern, $replacement, $subject);

    // 0 zzz x ffff - желаемый результат
    $pattern = '#a.+?x#';
    $replacement = '0';
    $subject = 'aeeex zzz x ffff'; // 0 zzz x ffff - результат по факту, соот.
    //echo $res = preg_replace($pattern, $replacement, $subject);

    // Жадность в регулярных выраениях можно ограничивать всеми операторами повторения
    // Примеры *?, ?? и {}?


    // Группы сиволов в регулярных выражениях, не являются гибким решением
    // [] - любой символ из перечисленных, который находится внутри квадратных скобок.
    $pattern = '#x[a-z]x#';
    $replacement = '0';
    $subject = 'xax xbx xcx x9x x0x x1x';
    $res = preg_replace($pattern, $replacement, $subject);
    //echo $res; // 0 0 0 x9x x0x x1x

    // xax 0 xcx x9x x0x x1x
    $pattern = '#x[A-Z]x#';
    $replacement = '0';
    $subject = 'xax xBx xcx x9x x0x x1x';
    $res = preg_replace($pattern, $replacement, $subject);
    //echo $res; // xax 0 xcx x9x x0x x1x

    // 0 0 0 x9x x0x x1x
    $pattern = '#x[A-Za-z]x#';
    $replacement = '0';
    $subject = 'xax xBx xcx x9x x0x x1x';
    $res = preg_replace($pattern, $replacement, $subject);
//    echo $res; // 0 0 0 x9x x0x x1x

    // 0 0 0 0 0 0
    $pattern = '#x[A-Za-z0-9]x#';
    $replacement = '0';
    $subject = 'xax xBx xcx x9x x0x x1x';
    $res = preg_replace($pattern, $replacement, $subject);
//    echo $res; // 0 0 0 0 0 0

    // 0 0 0 0 0 0 0 0
    $pattern = '#x[A-Za-z0-9]+x#';
    $replacement = '0';
    $subject = 'xax xBx xb9dfb3x x2323gwegwex xcx x9x x0x x1x';
    $res = preg_replace($pattern, $replacement, $subject);
    //echo $res; // 0 0 0 0 0 0 0 0

    //0 0 0 0 xzx xfx x6x x9x 0 0
    $pattern = '#x[A-Da-d0-3]x#';
    $replacement = '0';
    $subject = 'xax xBx xcx xDx xzx xfx x6x x9x x0x x1x ';
    $res = preg_replace($pattern, $replacement, $subject);
    //echo $res; // 0 0 0 0 xzx xfx x6x x9x 0 0


    // 0 0 0 xDx xzx xfx x6x x9x x0x x1x
    $pattern = '#x[a-d]x#'; // подходят следующие шаблоны поска - xax xbx xcx xdx
    $replacement = '0';
    $subject = 'xax xdx xcx xDx xzx xfx x6x x9x x0x x1x ';
    $res = preg_replace($pattern, $replacement, $subject);
    //echo $res; // 0 0 0 xDx xzx xfx x6x x9x x0x x1x

//________________________________________________________
//  инвертирование наборов символов в регулярных выражениях
    $pattern = '#x[^abc]r#';
    $replacement = '0';
    $subject = 'xar xbr xkr xjr xcr';
    $res = preg_replace($pattern, $replacement, $subject);
    // echo $res;

    // особености кириллических символов
    // при использовании кирилических символ в шаблоне обязательно надо добавить
    // ограничитель u
    $pattern = '#[а-яё]#u';
    $replacement = '0';
    $subject = 'а я п е ё ё';
    $res = preg_replace($pattern, $replacement, $subject);
    //echo $res; // 0 0 0 0 0 0

    /*
     Все специальные символы внутри квадратных скобок [] становятся обычными символами!!!

    Являются спец. символами: * ? + ^ $ \ / {} [] () | .
    Спец. символами не являются: # ` ~ % & = _ - , : @ ' " ;
     */
    $pattern = '#x[a-z.]x#';
    $replacement = '0';
    $subject = 'xax xbx xcx xdx x.x x0x x7x xox';
    $res = preg_replace($pattern, $replacement, $subject);
    //echo $res; // 0 0 0 0 0 x0x x7x 0

    $pattern = '#x[a-z.]x#';
    $replacement = '0';
    $subject = 'xax xbx xcx xdx x.x x!x x(x xox';
    $res = preg_replace($pattern, $replacement, $subject);
    // echo $res; // '#x[a-z.]x#';

    /*
     \d - цифры от 0-9
     \D - не цифры
     \w - цифры, буквы латинского алфавита и символ _
     \W - НЕ  цифры, буквы латинского алфавита и символ _
     \s - пробельный символ
     \S - Не побельный символ
     */

    /*
     Группы символов внутри квадратных скобок обозначают сами себя
     */

    // 0 0 xcx 0 0 x!x x(x xox;
    $pattern = '#x[\d.]x#';
    $replacement = '0';
    $subject = 'x0x x9x xcx x3x x.x x!x x(x xox';
    $res = preg_replace($pattern, $replacement, $subject);
    //echo $res; // 0 0 xcx 0 0 x!x x(x xox;



    // x0q x9q 0 x3q 0 0 0 0
    $pattern = '#x[\D.]q#';
    $replacement = '0';
    $subject = 'x0q x9q xcq x3q x.q x!q x(q xoq';
    $res = preg_replace($pattern, $replacement, $subject);
    //echo $res; // x0q x9q 0 x3q 0 0 0 0

    /*
     символ ^ (инвертирования), для того чтобы он обозначал сам себя необходимо экранировать, либо разместить последним в квадратных скобках
     */
    //инвертирование наборов символов в регулярных выражениях
    $pattern = '#x[^abc]r#';
    $replacement = '0';
    $subject = 'xar xbr xkr xjr xcr';
    $res = preg_replace($pattern, $replacement, $subject);
    //echo $res; // xar xbr 0 0 xcr

    $pattern = '#[d^]xx#';
    $replacement = '0';
    $subject = 'axx bxx cxx dxx ^xx';
    $res = preg_replace($pattern, $replacement, $subject);
    //echo $res; // axx bxx cxx 0 0

    /* Символы начала и конца строки в регулярных выражениях
        ^ - начало строки
        $ - обозначать конец строки
    */

    $pattern = '#^a+$#';
    $replacement = '0';
    $subject = 'aaaaaaaaaaaaaaaaaaaaaaa';
    $res = preg_replace($pattern, $replacement, $subject);
    echo $res;