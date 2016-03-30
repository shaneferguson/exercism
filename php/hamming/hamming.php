<?php

function distance($a, $b)
{
    $a = str_split($a);
    $b = str_split($b);

    if (count($a) != count($b)) {
        throw new InvalidArgumentException('DNA strands must be of equal length.');
    }

    return count(array_diff_assoc($a, $b));
}
