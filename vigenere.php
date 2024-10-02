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
                    <h6 class="m-0 font-weight-bold text-primary">Vigenère/Autokey Cipher</h6>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="form-group">
                            <label for="cipherType">Cipher Type:</label>
                            <select id="cipherType" class="form-control">
                                <option value="standard">Vigenère Standard</option>
                                <option value="autokey">Vigenère Autokey</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputText">Text:</label>
                            <input type="text" id="inputText" class="form-control" placeholder="Enter text here">
                        </div>
                        <div class="form-group">
                            <label for="key">Key:</label>
                            <input type="text" id="key" class="form-control" placeholder="Enter key">
                        </div>
                        <button onclick="encrypt()" class="btn btn-primary">Encrypt</button>
                        <div class="form-group mt-3">
                            <label for="outputText">Output Encrypted:</label>
                            <input type="text" id="outputText" class="form-control" readonly>
                        </div>
                        <button onclick="decrypt()" class="btn btn-secondary">Decrypt</button>
                        <div class="form-group mt-3">
                            <label for="decryptOutput">Output Decrypted:</label>
                            <input type="text" id="decryptOutput" class="form-control" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<?php include 'layouts/footer.php'; ?>

<!-- End of Footer -->