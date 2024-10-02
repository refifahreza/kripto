function processHillCipher(operation) {
    const text = document.getElementById('text').value.toUpperCase().replace(/[^A-Z]/g, '');
    const matrixInput = document.getElementById('matrix').value.split(',').map(Number);
    const size = Math.sqrt(matrixInput.length); // Determine the size of the matrix (e.g., 2x2, 3x3 based on input length)

    if (size % 1 !== 0) {
        alert('Invalid matrix size');
        return;
    }

    let matrix = [];
    for (let i = 0; i < size; i++) {
        matrix.push(matrixInput.slice(i * size, (i + 1) * size));
    }

    if (operation === 'encrypt') {
        document.getElementById('output').value = encryptHill(text, matrix, size);
    } else if (operation === 'decrypt') {
        document.getElementById('output').value = decryptHill(text, matrix, size);
    }
}

function encryptHill(text, matrix, size) {
    let result = '';
    for (let i = 0; i < text.length; i += size) {
        let chunk = text.slice(i, i + size);
        if (chunk.length < size) {
            while (chunk.length < size) chunk += 'X'; // Padding if necessary
        }
        result += multiplyMatrix(chunk, matrix, size);
    }
    return result;
}

function decryptHill(encryptedText, matrix, size) {
    const inverseMatrix = invertMatrix(matrix, size);
    if (!inverseMatrix) {
        alert('Matrix is not invertible or no valid inverse found');
        return '';
    }

    let result = '';
    for (let i = 0; i < encryptedText.length; i += size) {
        let chunk = encryptedText.slice(i, i + size);
        result += multiplyMatrix(chunk, inverseMatrix, size);
    }
    return result;
}

function multiplyMatrix(chunk, matrix, size) {
    let vector = chunk.split('').map(char => char.charCodeAt(0) - 'A'.charCodeAt(0));
    let resultVector = new Array(size).fill(0);

    for (let i = 0; i < size; i++) {
        for (let j = 0; j < size; j++) {
            resultVector[i] += vector[j] * matrix[i][j];
        }
        resultVector[i] = String.fromCharCode(resultVector[i] % 26 + 'A'.charCodeAt(0));
    }

    return resultVector.join('');
}

function invertMatrix(matrix, size) {
    if (size === 2) {
        const a = matrix[0][0];
        const b = matrix[0][1];
        const c = matrix[1][0];
        const d = matrix[1][1];

        // Calculate the determinant
        let det = a * d - b * c;
        det = mod(det, 26);  // Ensure the determinant is modulo 26

        // Find the modular inverse of the determinant
        const invDet = modInverse(det, 26);
        if (invDet === null) {
            alert('Matrix is not invertible or no valid inverse found');
            return null;
        }

        // Calculate the inverse matrix
        return [
            [mod(d * invDet, 26), mod(-b * invDet, 26)],
            [mod(-c * invDet, 26), mod(a * invDet, 26)]
        ];
    }
    // Placeholder for larger matrices
    return null;
}

function modInverse(a, m) {
    a = mod(a, m);  // Normalize a within the range of 0 to m-1
    if (gcd(a, m) != 1) {
        return null;  // No modular inverse if a and m are not coprime
    }
    for (let x = 1; x < m; x++) {
        if ((a * x) % m === 1) {
            return x;
        }
    }
    return null;
}

function gcd(x, y) {
    while (y != 0) {
        let temp = y;
        y = x % y;
        x = temp;
    }
    return x;
}

function mod(n, m) {
    return ((n % m) + m) % m;
}
