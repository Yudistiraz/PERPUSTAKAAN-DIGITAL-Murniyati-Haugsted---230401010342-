<?php
function character_limiter($str, $n = 500, $end_char = '...')
{
    if (trim($str) === '') return $str;

    if (strlen($str) < $n) return $str;

    $out = substr($str, 0, $n);

    return rtrim($out) . $end_char;
}
