<?php
/* шпаргалка
\n 	новая строка (LF или 0x0A (10) в ASCII)
\r 	возврат каретки (CR или 0x0D (13) в ASCII)
\t 	горизонтальная табуляция (HT или 0x09 (9) в ASCII)
\v 	вертикальная табуляция (VT или 0x0B (11) в ASCII) (с версии PHP 5.2.5)
\e 	escape-знак (ESC или 0x1B (27) в ASCII) (с версии PHP 5.4.4)
\f 	подача страницы (FF или 0x0C (12) в ASCII) (с версии PHP 5.2.5)
*/

function binary_search_in_file($fileName, $key){
    $file = new SplFileObject($fileName, 'r');
    $file->seek(PHP_INT_MAX);
    $last_line = $file->key();
    $top = $last_line;
    $bot = 0;
    while($top >= $bot)
    {
        $p = floor(($top + $bot) / 2);
        $file->seek($p);
        $line = $file->current();
        $lineAr = explode("\t", $line);
        $line = $lineAr[0];
        //echo $line."<br>";
        if ($line < $key) $bot = $p + 1;
        elseif ($line > $key) $top = $p - 1;
        else return TRUE;

    }
    echo "не найдено! </br>";
    return FALSE;
}

$fileName = 'count-s.txt';
$key = "EAEEC";
$result = binary_search_in_file($fileName, $key);
echo $result;
