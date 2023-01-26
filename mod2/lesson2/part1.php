<?php
    // Регулярные выражения в php

    //preg_replace(что мы меняем, на что мы меняем, строка в которой мы производим поиск)

    // #....# - # - ограничители регулярного выражения

    // preg_replace — Выполняет поиск и замену по регулярному выражению

    $res = preg_replace('#a#', '!', 'abcda'); //!bcd!

    //echo $res;

    // . - любой символ

    $res = preg_replace('#a.a#', '!', 'abc aba apa a1a');
    // abc ! ! !

    //echo $res;

    $res = preg_replace('#b.b#', '!', 'bca b1f bab d1b');
    // bca b1f ! d1b
    //echo $res;

// _________________________________________________________________________

    /* Квантификаторы (операторы повторения символов в регулярных выражениях)
    + - повторение 1 и более раз
    * - повторение 0 и более раз
    ? - поторение 0 или 1 раз


    */
    // В шаблоне поиска xa+x, буква а должна встречаться 1 и более раз
    $res = preg_replace('#xa+x#', '!', 'xx xax xaax xaaax xab');
    //echo $res;
    // xx ! ! ! xab


    // В шаблоне поиска xa*x, буква а должна встречаться 0 и более раз
    $res = preg_replace('#xa*x#', '!', 'xx xax xaax xaaax xab');
    //echo $res; // ! ! ! ! xab


    $pattern = '#xa*x#';
    $replacement = '!';
    $subject = 'xx xax xaax xaaax xab';
    $res = preg_replace($pattern, $replacement, $subject);
    //echo $res; // ! ! ! ! xab


    // В шаблоне поиска xa?x, буква а должна встречаться 0 и 1 раз
    $pattern = '#xa?x#';
    $replacement = '!';
    $subject = 'xx xax xaax xab';
    $res = preg_replace($pattern, $replacement, $subject);
    //echo $res; // ! ! xaax xab




    // группирующие скобки в регулярных выражениях -  '(' и ')'
    $pattern = '#x(ab)+x#'; // ищем x, далее ab 1 и более раз, далее x
    $replacement = '0';
    $subject = 'xabx xababx xabababx xaax xaabbx';
    $res = preg_replace($pattern, $replacement, $subject);
    //echo $res; // 0 0 0 xaax xaabbx



    // Экранирование специальных символов в регулярных выражениях
    $pattern = '#a\+x#'; // a+x // в данном примере #a\+x# символ + обозначает
    //  сам себя, поскольку квантификатор + экранирован символом \.
    $replacement = '0';
    $subject = 'a+x ax aax aaax';
    $res = preg_replace($pattern, $replacement, $subject);
    //echo $res; // 0 ax aax aaax

    // В регулярных выражениях, если мы хотим, чтобы спец. символы обозначали
    // сами себя, то нам необхлодимо экранировать их с помощью символа '\'.


    $pattern = '#a\.b#';
    $replacement = '0';
    $subject = 'a.x abc adi abx';
    $res = preg_replace($pattern, $replacement, $subject);
    //echo $res; // 0 abc adi abx


    // Являются спец. символами: * ? + ^ $ \ / {} [] () | .
    // Спец. символами не являются: # ` ~ % & = _ - , : @ ' " ;
    // Экранировать нужно только спец. символы
    // Любой символ который не является специальным символом можно использовать в качестве ограничителя регулярного выражения

    /*
    {} - c помощбю фигурных скобок можно указывать конкретное количество
    повторений в паттерне (шаблоне) поиска регулярного выражения. (Альернатва квантификаторам, обладающаяя более широким спектром возможностей (функциональностью))

    Примеры использования
    {7} - повторить 7 раз
    {5,7} - повторить от 5 до 7 раз (включая 5 и 7 повторений)
    {5,} - повторить 5 и более раз
    */

    // В шаблоне поиска xa?x, буква а должна встречаться 0 и 1 раз
    $pattern = '#xa{1,3}x#'; // соответствует шаблонам поиска xax xaax xaaax
    $replacement = '0';
    $subject = 'xx xax xaax xaaax xaaaax xab';
    //echo $res = preg_replace($pattern, $replacement, $subject); // xx 0 0 0 xaaaax xab

    // Группы символов в регулярных выражениях
    // \d - обозначает цифры от 0 до 9
    // \w - обозначает цифры, буквы латинского алфавита и символ _

    $pattern = '#\d#'; // любая цифра (0-9)
    $replacement = 'J';
    $subject = '1 123 xax 1321 xaax 8976986325 xaaax 141 xaaaax 000 xab';
    echo $res = preg_replace($pattern, $replacement, $subject);
    // 0 000 xax 0000 xaax 0000000000 xaaax 000 xaaaax 000 xab
