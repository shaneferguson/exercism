<?php

function toRoman($number)
{
    $roman = '';

    $lookup = [
        1000 => 'M',
        900 => 'CM',
        500 => 'D',
        400 => 'CD',
        100 => 'C',
        90 => 'XC',
        50 => 'L',
        40 => 'XL',
        10 => 'X',
        9  => 'IX',
        5  => 'V',
        4  => 'IV',
        1  => 'I',
    ];

    foreach ($lookup as $limit => $numeral) {
        while ($number >= $limit) {
            $roman .= $numeral;
            $number -= $limit;
        }
    }

    return $roman;
}