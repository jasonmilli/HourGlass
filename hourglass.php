<?php
for ($argv[1] = 0; $argv[1] < 60; $argv[1]++) {
    echo str_repeat("\n", 50);
    $lid = str_repeat('M', 19)."\n";
    $t = $argv[1];
    $widths = array(1,2,3,5,7,9,7,5,3,2,1);
    $grid = $lid;
    $l = min($t, 4);
    $t = $argv[1] - $l;
    for ($i = 0; $i < 11; $i++) {
        if ($i == 5) $t = 60 - $argv[1];
        if ($t >= 19 - 2 * $widths[$i] && $i < 5) {
            $t++;
        }
        $w = min($t, 19 - 2 * $widths[$i]);
        if ($i < 5 && $t == 0 && $l >= 5 - $i) {
            $blank = str_repeat(' ', 9 - $widths[$i]).'.'.str_repeat(' ', 9 - $widths[$i]);
        } else {
            $blank = str_repeat(' ', 19 - 2 * $widths[$i] - $w);
        }
        $grid = str_repeat('M', $widths[$i]).str_repeat('.', $w).$blank.str_repeat('M', $widths[$i])."\n".$grid;
        $t -= $w;
    }
    $grid = $lid.$grid;
    echo $grid;
    usleep(200000);
}
