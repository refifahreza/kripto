<!-- Topbar -->
<?php include 'layouts/navbar.php'; ?>
<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->
    <div class="row">

        <div class="col-12 mx-auto">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Hill Cipher</h6>
                </div>
                <div class="card-body">

                    <div class="col-12 mx-auto">
                        <p>
                            Cipher Hill menggunakan matriks 5x5 yang diisi dengan huruf-huruf dari alfabet, di mana huruf 'j' sering digabungkan dengan 'i' untuk memungkinkan 25 huruf masuk ke dalam matriks 5x5 (karena alfabet Inggris memiliki 26 huruf). Kata kunci digunakan untuk mengisi matriks ini, diikuti oleh huruf-huruf yang tersisa dari alfabet yang belum digunakan dalam kata kunci. Setelah matriks terbentuk, enkripsi dilakukan dengan mengambil pasangan huruf dari teks yang akan dienkripsi, dan menerapkan aturan tertentu berdasarkan posisi huruf-huruf tersebut dalam matriks untuk mendapatkan teks terenkripsi.
                        </p>
                        <hr>
                        <!-- Form untuk input dan tombol -->
                        <div class="form-group">
                            <label for="text">Text:</label>
                            <input type="text" id="text" class="form-control" placeholder="Enter text">
                        </div>
                        <div class="form-group">
                            <label for="matrix">Key Matrix (comma-separated, e.g., 1,2,3,4 for a 2x2 matrix):</label>
                            <input type="text" id="matrix" class="form-control" placeholder="Enter matrix">
                        </div>
                        <button onclick="processHillCipher('encrypt')" class="btn btn-primary">Encrypt</button>
                        <button onclick="processHillCipher('decrypt')" class="btn btn-secondary">Decrypt</button>
                        <div class="form-group mt-3">
                            <label for="output">Output Encrypt:</label>
                            <input type="text" id="output" class="form-control" readonly>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>


</div>
<!-- End of Main Content -->

<!-- Footer -->
<?php include 'layouts/footer.php'; ?>

<!-- End of Footer -->