<?php

function toRna($dna)
{
    return strtr($dna, 'GCTA', 'CGAU');
}