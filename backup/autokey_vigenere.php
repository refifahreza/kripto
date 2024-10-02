<?php
if (!function_exists('sanitizeInput')) {
    function sanitizeInput($text) {
        return preg_replace("/[^A-Za-z]/", '', $text);
    }
}

function autokeyVigenere($text, $key, $encrypt = true)
{
    $key = strtoupper(sanitizeInput($key));
    $text = strtoupper(sanitizeInput($text));
    $result = '';
    $keyIndex = 0;
    $keyLength = strlen($key);
    $extendedKey = $key . $text;

    for ($i = 0; $i < strlen($text); $i++) {
        $shift = ord($extendedKey[$keyIndex]) - ord('A');
        if ($encrypt) {
            $char = chr((ord($text[$i]) - ord('A') + $shift) % 26 + ord('A'));
        } else {
            $char = chr((ord($text[$i]) - ord('A') - $shift + 26) % 26 + ord('A'));
        }
        $result .= $char;
        $keyIndex++;
    }
    return strtolower($result);
}
