<?php
    // массив создается с помощью функции []
    $arr1 = []; // создаем массив arr1
    var_dump($arr1);
    echo "<br>";

    // создадим и заполним массив $arr2 названиями дней недели

    // Элементы массива разделяются между собой запятой
    $arr2 = ['понедельник',
        'вторник',
        'среда',
        'четверг',
        'пятница',
        'суббота',
        'воскресенье'];

    echo $arr2[0];
    echo "<br>";

    echo $arr2[5];
    echo "<br>";

    // нумерация в массивах начинается с 0

    var_dump($arr2);
    echo "<br>";
    $arr3 = ['понедельник',
        2,
        24526,
        'суббота'];

    var_dump($arr3);
    echo "<br>";

    // укажем ключи в явном виде
    $arr4 = [1 => 'понедельник',
        2 => 'вторник',
        3 => 'среда',
        4 => 'четверг',
        5 => 'пятница',
        6 => 'суббота',
        7 => 'воскресенье'];

    var_dump($arr4);
    echo "<br>";

    $arr5 = ['первый день недели' => 'понедельник',
        'второй день недели' => 'вторник',
        3 => 'среда',
        4 => 'четверг',
        'пятый день недели' => 'пятница',
        6 => 'суббота',
        7 => 'воскресенье'];

    var_dump($arr5);
    echo "<br>";
    /* Ассоциативный массив

    Синтакисис здесь следуюший:
    ключ, затем идет стрелка =>, далее значения.
    Ключи могут быть не только числами, но также и строками.
    */

    // создадим массив $arr6 сотрудников, где ключами будут имена сотрудников,
    // а значениями будут зарплаты.


    $arr6 = ['Петя' => 100, // 'Петя' - ключ (key); 100 - значение (value)
        'Вася' => 200,
        'Миша', 300];

    // выведем зарплату сотрудника с именем (ключем) Петя
    echo $arr6['Петя']; // 100
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    // цикл foreach

    /*
     foreach ($arr - имя массива as $elem - переменная для элемента массива)
     {
        Код, который находится между фигурными скобками
        будет повторяться столько раз сколько элементов в массиве.
      }
     */

    $arr7 = [1,2,3,4,5,6,7];
    foreach ($arr7 as $item)
    {
        echo $item.'<br>';
    }
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    // Цикл foreach следует использовать когда необходимо
    // выполнить какие-либо действия над каждым элементом массива по отдельности

    // Задача: умножим каждый эдемент массива $arr7 на 2
    // $arr7 = [1,2,3,4,5,6,7];
    foreach ($arr7 as $item) {
        $res = $item*2;
        echo $res.'<br>';
    }
    echo "<br>";

    // foreach и html
    $arr8 = [1,2,3,4,5,6,7,8];
    foreach ($arr8 as $item) {
        //HTML код внутри цикла foreach выполнится 8 раз
?>
        <!--
           Скобки php закрыты и теперь будем писать на HTML внутри цикла foreach
        -->
    <p>{<?php echo $item?>}</p>
<?php
    }


    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";

    foreach ($arr8 as $item){
        echo "<p>".'{'.$item."}"."</p>";
    }


    // Цикл WHILE
    /*
     while (пока выражение истинно ) {
        код;
    }

    В начале каждого прохода цикла PHP проверяет выжение
    в круглых скобках  (пока выражение истинно )
        если выражение верно, то выполняется следующий проход цикла,
        если выражение не верно, то цикл завершает свою работу.

    Цикл прекращает работу, когда условие становится ложным.

    Если условие ложно изначально, то цикл не будет запущен.
     */

        $var1 = 1;

        while ($var1 < 5) {
            echo $var1.'<br>';

            $var1++;
        }


