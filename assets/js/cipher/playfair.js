$(document).ready(function() {
    function prepareText(input) {
        return input.toUpperCase().replace(/[^A-Z]/g, '').replace(/J/g, 'I'); // Replace J with I
    }

    function generateKeyMatrix(key) {
        let keyAdjusted = key.toUpperCase().replace(/[^A-Z]/g, '').replace(/J/g, 'I');
        let seen = {};
        let matrix = [];
        let alphabet = "ABCDEFGHIKLMNOPQRSTUVWXYZ";
        let currentRow = [];

        for (let char of keyAdjusted) {
            if (!seen[char] && currentRow.length < 5) {
                currentRow.push(char);
                seen[char] = true;
                if (currentRow.length === 5) {
                    matrix.push(currentRow);
                    currentRow = [];
                }
            }
        }

        for (let char of alphabet) {
            if (!seen[char] && currentRow.length < 5) {
                currentRow.push(char);
                seen[char] = true;
                if (currentRow.length === 5) {
                    matrix.push(currentRow);
                    currentRow = [];
                }
            }
        }

        return matrix;
    }

    function findPosition(matrix, char) {
        for (let row = 0; row < matrix.length; row++) {
            let col = matrix[row].indexOf(char);
            if (col !== -1) {
                return [row, col];
            }
        }
        return null;
    }

    function playfairEncrypt(text, matrix) {
        let encryptedText = '';
        for (let i = 0; i < text.length; i += 2) {
            if (i + 1 >= text.length) text += 'X'; // Append 'X' if text length is odd
            let pair1 = text[i];
            let pair2 = text[i + 1];
            let pos1 = findPosition(matrix, pair1);
            let pos2 = findPosition(matrix, pair2);

            if (pos1[0] === pos2[0]) { // Same row
                encryptedText += matrix[pos1[0]][(pos1[1] + 1) % 5];
                encryptedText += matrix[pos2[0]][(pos2[1] + 1) % 5];
            } else if (pos1[1] === pos2[1]) { // Same column
                encryptedText += matrix[(pos1[0] + 1) % 5][pos1[1]];
                encryptedText += matrix[(pos2[0] + 1) % 5][pos2[1]];
            } else { // Rectangle
                encryptedText += matrix[pos1[0]][pos2[1]];
                encryptedText += matrix[pos2[0]][pos1[1]];
            }
        }
        return encryptedText;
    }

    function playfairDecrypt(text, matrix) {
        let decryptedText = '';
        for (let i = 0; i < text.length; i += 2) {
            let pair1 = text[i];
            let pair2 = text[i + 1];
            let pos1 = findPosition(matrix, pair1);
            let pos2 = findPosition(matrix, pair2);

            if (pos1[0] === pos2[0]) { // Same row
                decryptedText += matrix[pos1[0]][(pos1[1] + 4) % 5];
                decryptedText += matrix[pos2[0]][(pos2[1] + 4) % 5];
            } else if (pos1[1] === pos2[1]) { // Same column
                decryptedText += matrix[(pos1[0] + 4) % 5][pos1[1]];
                decryptedText += matrix[(pos2[0] + 4) % 5][pos2[1]];
            } else { // Rectangle
                decryptedText += matrix[pos1[0]][pos2[1]];
                decryptedText += matrix[pos2[0]][pos1[1]];
            }
        }
        return decryptedText;
    }

    function displayMatrix(matrix) {
        let matrixHtml = '<div class="playfair-matrix">';
        for (let row of matrix) {
            matrixHtml += '<div class="matrix-row">';
            for (let char of row) {
                matrixHtml += `<span class="matrix-cell">${char}</span>`;
            }
            matrixHtml += '</div>';
        }
        matrixHtml += '</div>';
        return matrixHtml;
    }

    $('#encryptBtn').click(function() {
        var key = $('#keyInput').val();
        var text = $('#textInput').val();
        if (!text) {
            alert('Please enter text or upload a file.');
            return;
        }
        var preparedText = prepareText(text);
        var matrix = generateKeyMatrix(key);
        var encryptedText = playfairEncrypt(preparedText, matrix);
        $('#outputArea').html(encryptedText.toLowerCase() + displayMatrix(matrix));
        $('#textInput').val(encryptedText); // Simpan teks yang dienkripsi ke dalam input text
    });

    $('#decryptBtn').click(function() {
        var key = $('#keyInput').val();
        var encryptedText = $('#textInput').val(); // Gunakan teks yang dienkripsi sebagai input
        if (!encryptedText) {
            alert('Please encrypt some text first.');
            return;
        }
        var matrix = generateKeyMatrix(key);
        var decryptedText = playfairDecrypt(encryptedText, matrix);
        $('#decryptOutput').html(decryptedText.toLowerCase() + displayMatrix(matrix));
    });
});