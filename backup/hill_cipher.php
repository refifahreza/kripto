<?php
// Fungsi untuk mengonversi karakter ke angka
function charToNumber($char)
{
    return ord(strtoupper($char)) - ord('A');
}

// Fungsi untuk mengonversi angka ke karakter
function numberToChar($number)
{
    return chr(($number % 26) + ord('A'));
}

// Fungsi untuk menghitung invers modulo
function modInverse($a, $m)
{
    for ($x = -$m; $x < $m; $x++) {
        if (($a * $x) % $m == 1) {
            return $x;
        }
    }
    return null; // Return null if no modular inverse is found
}

// Fungsi untuk mengenkripsi teks menggunakan Hill Cipher
function hillCipherEncrypt($text, $keyMatrix)
{
    $text = strtoupper(preg_replace("/[^A-Z]/", "", $text));
    $length = strlen($text);
    if ($length % 2 != 0) {
        $text .= 'X'; // Padding if not even length
    }

    $result = '';
    for ($i = 0; $i < $length; $i += 2) {
        $vector = [
            charToNumber($text[$i]),
            charToNumber($text[$i + 1])
        ];

        // Multiply key matrix with vector
        $x = ($keyMatrix[0][0] * $vector[0] + $keyMatrix[0][1] * $vector[1]) % 26;
        $y = ($keyMatrix[1][0] * $vector[0] + $keyMatrix[1][1] * $vector[1]) % 26;

        $result .= numberToChar($x) . numberToChar($y);
    }

    return $result;
}

// Contoh penggunaan
$keyMatrix = [
    [5, 8],
    [17, 3]
];
$text = "HELLO";
echo "Encrypted Text: " . hillCipherEncrypt($text, $keyMatrix);
