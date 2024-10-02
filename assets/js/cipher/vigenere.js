function generateVigenereTable() {
    const table = [];
    for (let i = 0; i < 26; i++) {
        let row = [];
        for (let j = 0; j < 26; j++) {
            const letter = String.fromCharCode((i + j) % 26 + 65);
            row.push(letter);
        }
        table.push(row);
    }
    return table;
}

function encrypt() {
    const cipherType = document.getElementById('cipherType').value;
    const text = document.getElementById('inputText').value.toUpperCase().replace(/[^A-Z]/g, '');
    const key = document.getElementById('key').value.toUpperCase().replace(/[^A-Z]/g, '');
    if (text.length === 0 || key.length === 0) {
        alert('Please enter both text and key.');
        return;
    }
    const table = generateVigenereTable();
    let encryptedText = '';
    let extendedKey = (cipherType === 'autokey') ? key + text : key;
    for (let i = 0, j = 0; i < text.length; i++, j++) {
        if (j >= extendedKey.length) j = 0;
        const row = extendedKey.charCodeAt(j) - 65;
        const col = text.charCodeAt(i) - 65;
        encryptedText += table[row][col];
    }
    document.getElementById('outputText').value = encryptedText;
    document.getElementById('inputText').value = encryptedText; // Set encrypted text as new input for decryption
}

function decrypt() {
    const cipherType = document.getElementById('cipherType').value;
    const encryptedText = document.getElementById('inputText').value.toUpperCase().replace(/[^A-Z]/g, '');
    const key = document.getElementById('key').value.toUpperCase().replace(/[^A-Z]/g, '');
    if (encryptedText.length === 0 || key.length === 0) {
        alert('Please encrypt some text first.');
        return;
    }
    const table = generateVigenereTable();
    let decryptedText = '';
    let extendedKey = (cipherType === 'autokey') ? key + encryptedText : key;
    for (let i = 0, j = 0; i < encryptedText.length; i++, j++) {
        if (cipherType === 'autokey' && j >= key.length) {
            extendedKey += decryptedText; // Extend key with decrypted text
        }
        if (j >= extendedKey.length) j = 0;
        const row = extendedKey.charCodeAt(j) - 65;
        const col = table[row].indexOf(encryptedText[i]);
        decryptedText += String.fromCharCode(col + 65);
    }
    document.getElementById('decryptOutput').value = decryptedText;
}