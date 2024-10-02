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
                    <h6 class="m-0 font-weight-bold text-primary">Playfair Cipher</h6>
                </div>
                <div class="card-body">

                    <div class="col-12 mx-auto">
                        <p>
                            Cipher Playfair menggunakan matriks 5x5 yang diisi dengan huruf-huruf dari alfabet, di mana huruf 'j' sering digabungkan dengan 'i' untuk memungkinkan 25 huruf masuk ke dalam matriks 5x5 (karena alfabet Inggris memiliki 26 huruf). Kata kunci digunakan untuk mengisi matriks ini, diikuti oleh huruf-huruf yang tersisa dari alfabet yang belum digunakan dalam kata kunci. Setelah matriks terbentuk, enkripsi dilakukan dengan mengambil pasangan huruf dari teks yang akan dienkripsi, dan menerapkan aturan tertentu berdasarkan posisi huruf-huruf tersebut dalam matriks untuk mendapatkan teks terenkripsi.
                        </p>
                        <hr>
                        <!-- Form untuk input dan tombol -->
                        <form id="playfairForm">
                            <div class="form-group">
                                <label for="textInput">Text:</label>
                                <textarea class="form-control" id="textInput" rows="3" placeholder="Enter text" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="keyInput">Key:</label>
                                <input type="text" class="form-control" id="keyInput" placeholder="Enter key" required>
                            </div>
                            <div class="form-group">
                                <input type="file" class="form-control-file" id="fileInput">
                            </div>
                            <button type="button" class="btn btn-primary" id="encryptBtn">Encrypt</button>
                            <button type="button" class="btn btn-secondary" id="decryptBtn">Decrypt</button>
                        </form>

                        <div class="row">
                            <div class="col-6">
                                <div id="outputArea" class="mt-3"></div>
                            </div>
                            <div class="col-6">
                                <div id="decryptOutput" class="mt-3"></div>
                            </div>
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