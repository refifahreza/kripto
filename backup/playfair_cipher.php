<?php
function generateMatrix($key)
{
    $key = strtoupper($key);
    $key = preg_replace("/[^A-Z]/", "", $key);
    $key = str_replace("J", "I", $key);
    $used = array();
    $matrix = array();

    // Fill matrix with key
    for ($i = 0, $len = strlen($key); $i < $len; $i++) {
        if (!in_array($key[$i], $used)) {
            $used[] = $key[$i];
            $matrix[] = $key[$i];
        }
    }

    // Fill matrix with remaining letters
    for ($ch = 'A'; $ch <= 'Z'; $ch++) {
        if ($ch != 'J' && !in_array($ch, $used)) {
            $matrix[] = $ch;
        }
    }

    return $matrix;
}

function findPosition($matrix, $char)
{
    $index = array_search($char, $matrix);
    $row = intdiv($index, 5);
    $col = $index % 5;
    return array($row, $col);
}

function playfairCipher($text, $key, $encrypt = true)
{
    $matrix = generateMatrix($key);
    $text = strtoupper($text);
    $text = preg_replace("/[^A-Z]/", "", $text);
    $text = str_replace("J", "I", $text);
    $length = strlen($text);

    // Ensure text length is even by padding with 'X'
    if ($length % 2 != 0) {
        $text .= 'X';
        $length++;
    }

    $result = '';

    // Process each digraph
    for ($i = 0; $i < $length; $i += 2) {
        list($row1, $col1) = findPosition($matrix, $text[$i]);
        list($row2, $col2) = findPosition($matrix, $text[$i + 1]);

        if ($row1 == $row2) {
            // Same row
            $col1 = ($col1 + 1) % 5;
            $col2 = ($col2 + 1) % 5;
        } elseif ($col1 == $col2) {
            // Same column
            $row1 = ($row1 + 1) % 5;
            $row2 = ($row2 + 1) % 5;
        } else {
            // Rectangle swap
            $temp = $col1;
            $col1 = $col2;
            $col2 = $temp;
        }

        $result .= $matrix[$row1 * 5 + $col1];
        $result .= $matrix[$row2 * 5 + $col2];
    }

    return $result;
}
