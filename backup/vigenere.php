<?php
if (!function_exists('sanitizeInput')) {
    function sanitizeInput($text) {
        return preg_replace("/[^A-Za-z]/", '', $text);
    }
}

function vigenere($text, $key, $encrypt = true)
{
    $key = strtoupper(sanitizeInput($key));
    $text = strtoupper(sanitizeInput($text));
    if (empty($key) || empty($text)) {
        return 'Error: Key or text is empty or invalid.';
    }

    $result = '';
    $keyIndex = 0;
    $keyLength = strlen($key);

    for ($i = 0; $i < strlen($text); $i++) {
        $shift = ord($key[$keyIndex]) - ord('A');
        if ($encrypt) {
            $char = chr((ord($text[$i]) - ord('A') + $shift) % 26 + ord('A'));
        } else {
            $char = chr((ord($text[$i]) - ord('A') - $shift + 26) % 26 + ord('A'));
        }
        $result .= $char;
        $keyIndex = ($keyIndex + 1) % $keyLength;
    }
    return strtolower($result);
}

if (isset($_POST['encrypt']) || isset($_POST['decrypt'])) {
    $key = $_POST['key'];
    $text = $_POST['textInput'] ?? '';
    $file = $_FILES['fileInput']['tmp_name'];

    if (is_uploaded_file($file)) {
        $text = file_get_contents($file);
    }

    $isEncrypt = isset($_POST['encrypt']);
    $output = vigenere($text, $key, $isEncrypt);

    if (strpos($output, 'Error:') !== false) {
        echo $output;
    } else {
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="output.txt"');
        echo $output;
    }
    exit;
}
