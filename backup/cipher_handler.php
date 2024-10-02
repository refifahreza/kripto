<?php
include 'vigenere.php';
include 'autokey_vigenere.php';
include 'playfair_cipher.php';
require_once 'hill_cipher.php';

$key = $_POST['key'] ?? '';
$text = $_POST['textInput'] ?? '';
$method = $_POST['method'];
$action = $_POST['action']; // 'encrypt' or 'decrypt'

$result = '';
switch ($method) {
    case "autokey":
        $result = autokeyVigenere($text, $key, $action === 'encrypt');
        break;
    case "playfair":
        $result = playfairCipher($text, $key, $action === 'encrypt');
        break;
    default:
        $result = vigenere($text, $key, $action === 'encrypt');
        break;
}

echo $result; // Return the result as plain text

if ($_POST['method'] == 'hill') {
    $keyMatrix = [[5, 8], [17, 3]]; // Contoh matriks kunci, sesuaikan sesuai kebutuhan
    $encryptedText = hillCipherEncrypt($_POST['textInput'], $keyMatrix);
    echo $encryptedText;
}
?>
