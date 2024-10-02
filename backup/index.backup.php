<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="vigenere auto key autokey substitution polyalphabetic alphabet code cipher solver">
    <meta name="author" content="">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png?v=kP3zzJW9A0">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png?v=kP3zzJW9A0">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png?v=kP3zzJW9A0">
    <link rel="mask-icon" href="/safari-pinned-tab.svg?v=kP3zzJW9A0" color="#5bbad5">
    <link rel="shortcut icon" href="/favicon.ico?v=kP3zzJW9A0">
    <meta name="apple-mobile-web-app-title" content="CacheSleuth">
    <meta name="application-name" content="CacheSleuth">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <title>CacheSleuth - Vigenère/Autokey Cipher</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/main.css" rel="stylesheet">

    <style>
        .pointer {
            cursor: pointer;
        }

        textarea {
            resize: vertical;
            height: auto;
            overflow: auto;
            width: 95%;
            min-width: 150px;
            background-color: white;
            border: solid;
            border-color: #4e73df;
            color: black;
            font-size: 1.1em;
            margin-bottom: 5px;
            margin-top: 5px;
        }

        /* Extra small devices (phones, 320px and down) */
        @media only screen and (max-width: 320px) {}

        /* Small devices (portrait tablets and large phones, 320px and up) */
        @media only screen and (min-width: 320px) {}

        /* Small devices (portrait tablets and large phones, 370 and up) */
        @media only screen and (min-width: 370px) {}

        /* Small devices (portrait tablets and large phones, 600px and up) */
        @media only screen and (min-width: 600px) {}

        /* Medium devices (landscape tablets, 768px and up) */
        @media only screen and (min-width: 768px) {}

        /* Large devices (laptops/desktops, 992px and up) */
        @media only screen and (min-width: 992px) {}

        /* Extra large devices (large laptops and desktops, 1200px and up) */
        @media only screen and (min-width: 1200px) {}

        /* Extra large devices (large laptops and desktops, 1500px and up) */
        @media only screen and (min-width: 1500px) {}
    </style>
    <script src="assets/js/checkMobile.js" type="text/javascript"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <script>
                if (checkMobile()) {
                    document.body.className += "sidebar-toggled";
                    document.getElementById('accordionSidebar').classList.add('toggled');
                }
            </script>
            <div cs-include-html="sidebar_pages.inc"></div>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->





        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <!--mobile view only-->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fas fa-bars"></i>
                    </button>
                    <span class="navbar-brand d-sm-inline d-none">CacheSleuth</span><br>
                    <div class="navbar-brand d-sm-none mr-auto">CacheSleuth</div>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!--Topbar Select -->
                        <a id="topofpage"></a>
                        <!--Nav Item - Search Dropdown (Visible Only XS)-->
                        <!-- remove this <li class="nav-item dropdown no-arrow d-sm-none">-->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!--Dropdown - Messages-->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" id="search" class="form-control form-control-sm small bg-light border-1 mr-2"
                                            placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="search btn btn-primary btn-sm pointer" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h6 class="h6 mb-0 text-gray-900"><a href="http://cachesleuth.com/index.html?goto=tools"><i
                                    class="fas fa-chevron-left"></i> Back to Tools</a></h6>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-12 mx-auto">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Vigenère/Autokey Cipher</h6>
                                </div>
                                <div class="card-body">
                                    <div class="col-12 mx-auto">
                                        The <a href="https://en.wikipedia.org/wiki/Vigen%C3%A8re_cipher" target="_blank" rel="nofollow">Vigenère
                                            Cipher</a> is a polyalphabetic substitution cipher. In this cipher, a message is encrypted using a secret key,
                                        as well as an
                                        encryption table (tabula recta). The tabula recta typically contains the 26 letters of the from A to Z along the
                                        top of each column, and repeated along the left side at the beginning of each row. Each row of the square has
                                        the 26
                                        letters, shifted one position to the right in a cyclic way as the rows progress downwards. Once B moves to the
                                        front, A moves down to the end. This continues for the entire square. The <a
                                            href="https://en.wikipedia.org/wiki/Autokey_cipher" target="_blank" rel="nofollow">Autokey Cipher</a> is
                                        closely related to the Vigenère Cipher, but since the key does not
                                        repeat, it makes it much harder to break.<br><br>Both of these ciphers are supported on this page. Just select
                                        which one you want to use in the dropdown.
                                        <div class="text-center mt-4 mb-2">
                                            <h6 class="font-weight-bold">Plaintext:</h6>
                                            <textarea id="plaintext" rows="4" class="form-control text-monospace" spellcheck="false"
                                                placeholder="If encrypting, enter plaintext here."></textarea>

                                            <script>
                                                var plain = "plaintext";
                                                var customid = "";
                                                var customidnum = 0;
                                                var customaz09 = 0;
                                                var customid1 = "";
                                                var customidnum1 = 0;
                                                var customaz09_1 = 0;
                                                var ignorechar = 0;
                                            </script>
                                            <div cs-include-html="textoptions_plain.inc"></div>

                                            <p class="mt-2"><b>Keyword:</b>
                                                <input id="key" name="key" type="text"
                                                    class='form-control form-control-sm bg-light border-1 mt-2 mb-2 col-lg-4 col-md-6 col-xs-12 mx-auto text-center'
                                                    placeholder="Enter keyword here.">
                                                <button id="generatecipherkey" class="btn btn-primary btn-sm btn-rounded mt-2 mb-2">Generate Random
                                                    Key</button>
                                            </p>

                                            <p class="mt-2"><b>Alphabet:</b><br>
                                                <small>Enter a keyword or phrase and the alphabet will be calculated for you.</small><br>
                                                <input id="alphabet" placeholder="Default A-Z" type="text"
                                                    class="form-control form-control-sm col-xl-4 col-md-6 col-sm-8 col-xs-12 mx-auto bg-light border-1 text-center">

                                                <script>
                                                    var customid = "alphabet"; //id of alphabet input
                                                    var customidnum = 0; //iteration of alphabets
                                                    var customaz09 = 0; //true includes 0-9 in alphabet
                                                </script>
                                            <div cs-include-html="alphabetoptions_0.inc"></div>
                                            </p>

                                            <p><b>Cipher Mode:</b><br>
                                                <small>This page supports both standard Vigenère and the more secure Autokey version.</small><br>
                                                <select class='form-control form-control-sm bg-light col-xl-4 col-md-6 col-sm-8 col-xs-12 mx-auto'
                                                    id="autokeychoice">
                                                    <option value="0">Standard Vigenère</option>
                                                    <option value="1" selected>Autokey Vigenère</option>
                                                </select>
                                            </p>

                                            <div class="mt-4 mb-4">
                                                <button id="encrypt" class="btn btn-primary btn-sm btn-rounded mb-2"><i class="fas fa-angle-down"></i>
                                                    Encrypt <i class="fas fa-angle-down"></i></button>
                                                <button id="decrypt" class="btn btn-primary btn-sm btn-rounded mb-2"><i class="fas fa-angle-up"></i> Decrypt
                                                    <i class="fas fa-angle-up"></i></button>
                                            </div>

                                            <h6 class="font-weight-bold">Ciphertext:</h6>
                                            <textarea id="ciphertext" rows="4" class="form-control text-monospace" spellcheck="false"
                                                placeholder="If decrypting, enter ciphertext here."></textarea>

                                            <script>
                                                var encrypttext = "ciphertext";
                                            </script>
                                            <div cs-include-html="textoptions_encrypt.inc"></div>

                                        </div>

                                        <div class="col-md-6 col-xs-12 mx-auto mt-3">
                                            <p>The Vigenère/Autokey cipher uses the following tableau (the 'tabula recta') to encipher the plaintext:</p>
                                            <div id="tableau" class="d-flex justify-content-center"></div>

                                            <!--<img src="assets/https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Vigen%C3%A8re_square_shading.svg/1200px-Vigen%C3%A8re_square_shading.svg.png" style="width:95%;height:auto;" class="m-2">-->
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
            
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <script src="assets/js/includehtml.js" type="text/javascript"></script>
    <script>
        includeHTML();
    </script>
    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/main.js" type="text/javascript"></script>
    <script src="assets/js/copy2clipboard.js" type="text/javascript"></script>
    <script src="assets/js/textmanipulatorfiles/texttools.js" type="text/javascript"></script>

</body>


<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip();

        $('form input').on('keypress', function(e) {
            return e.which !== 13;
        });

        $("input[type=text]").click(function() {
            if (!$(this).hasClass("selected")) {
                $(this).select();
                $(this).addClass("selected");
            }
        });

        $("input[type=text]").blur(function() {
            if ($(this).hasClass("selected")) {
                $(this).removeClass("selected");
            }
        });

        $('#encrypt').click(function() {
            encrypt();
        });

        $('#decrypt').click(function() {
            decrypt();
        });

        $('#generatecipherkey').click(function() {
            GenRandCipherKey(getRandomInt(2, 15));
        });

        function encrypt() {
            var plaintext = $('#plaintext').val();
            var alphabet = $('#alphabet').val().toLowerCase();
            if (!alphabet) alphabet = 'abcdefghijklmnopqrstuvwxyz';
            var options = {
                preserveCasing: true,
                includeSpace: true
            }
            var tableau = BuildTableau(alphabet);
            $('#tableau').html(tableau);
            var autokey = checkAutoKey();
            var key = $('#key').val().toLowerCase();

            if (plaintext.length < 1) {
                alert("Please enter some plaintext (letters and numbers only).");
                return;
            }

            if (key.length <= 1) {
                alert("Keyword should be at least 2 characters long.");
                return;
            }

            var keyLength = key.length;
            var keyAlphabet = alphabet.length != 95 ? alphabet : 'abcdefghijklmnopqrstuvwxyz';
            var ciphertext = '';
            var textMask = getTextMask(plaintext, options, alphabet);
            var normalizedText = getNormalizedText(plaintext, textMask);
            if (normalizedText.length > 0 && keyLength > 0) {
                var transformedText = transform(normalizedText, alphabet, getKeyShifts(key, keyAlphabet), autokey, false);
                ciphertext = restoreText(plaintext, transformedText, textMask)
            }

            $('#ciphertext').val(ciphertext);
        }

        function decrypt() {
            var ciphertext = $('#ciphertext').val();
            var alphabet = $('#alphabet').val().toLowerCase();
            if (!alphabet) alphabet = 'abcdefghijklmnopqrstuvwxyz';
            var options = {
                preserveCasing: true,
                includeSpace: true
            }
            var tableau = BuildTableau(alphabet);
            $('#tableau').html(tableau);
            var autokey = checkAutoKey();
            var key = $('#key').val().toLowerCase();

            if (ciphertext.length < 1) {
                alert("Please enter some ciphertext (letters and numbers only).");
                return;
            }

            if (key.length <= 1) {
                alert("Keyword should be at least 2 characters long.");
                return;
            }

            var keyLength = key.length;
            var keyAlphabet = alphabet.length != 95 ? alphabet : 'abcdefghijklmnopqrstuvwxyz';
            var plaintext = '';
            var textMask = getTextMask(ciphertext, options, alphabet);
            var normalizedText = getNormalizedText(ciphertext, textMask);
            if (normalizedText.length > 0 && keyLength > 0) {
                var transformedText = transform(normalizedText, alphabet, getKeyShifts(key, keyAlphabet), autokey, true);
                plaintext = restoreText(ciphertext, transformedText, textMask)
            }

            $('#plaintext').val(plaintext);
        }

        function getKeyShifts(key, keyAlphabet) {
            var arr = new Array(key.length);
            for (var i = 0; i < key.length; i++) {
                var p = keyAlphabet.indexOf(key[i]);
                arr[i] = p;
            }

            return arr;
        }

        function checkAutoKey() {
            return $('#autokeychoice').val() == '1';
        }

        function transform(src, alphabet, shifts, autokey, invert) {
            var result = '';
            var keyLength = shifts.length;

            if (shifts.length == 0)
                return src;

            for (var i = 0; i < src.length; i++) {
                var shift = 0;
                if (!autokey || i < keyLength) {
                    shift = invert ? -shifts[i % keyLength] : shifts[i % keyLength];
                } else {
                    shift = invert ? -alphabet.indexOf(result[i - keyLength]) : alphabet.indexOf(src[i - keyLength]);
                }
                result += transformChar(src[i], alphabet, shift);
            }

            return result;
        }

        function transformChar(ch, alphabet, shift) {
            var p = (alphabet.indexOf(ch) + shift + alphabet.length) % alphabet.length;
            return alphabet[p];
        }

        function getTextMask(text, options, alphabet) {
            var arr = text.split('');
            var alphabetUpper = alphabet.toUpperCase();
            var alphabetLower = alphabet.toLowerCase();
            var length = text.length;
            for (var i = 0; i < length; i++) {
                var isUpperLetter = alphabetUpper.indexOf(text[i]) !== -1;
                var isLowerLetter = alphabetLower.indexOf(text[i]) !== -1;
                var l = '-';
                if (options.preserveCasing && isUpperLetter)
                    l = 'A';
                else if (isUpperLetter || isLowerLetter)
                    l = 'a';
                else if (options.includeSpace)
                    l = '+';
                arr[i] = l;
            }

            return arr.join('');
        }

        function getNormalizedText(text, textMask) {
            var arr = [];
            var length = textMask.length;
            for (var i = 0; i < length; i++) {
                if (textMask[i] === 'a' || textMask[i] === 'A')
                    arr.push(text[i]);
            }

            return arr.join('').toLowerCase();
        }

        function restoreText(originalText, normalizedText, textMask) {
            var arr = originalText.split('');
            var j = 0;
            var length = textMask.length;
            for (var i = 0; i < length; i++) {
                switch (textMask[i]) {
                    case 'a':
                        arr[i] = normalizedText[j++];
                        break;
                    case 'A':
                        arr[i] = normalizedText[j++].toUpperCase();
                        break;
                    case '-':
                        arr[i] = '';
                }
            }

            return arr.join('');
        }

        function GenRandCipherKey(lim) {
            var keychars = "abcdefghijklmnopqrstuvwxyz";
            var chars = keychars.split("");
            ret = "";
            for (i = 0; i < lim; i++) {
                index = Math.floor(chars.length * Math.random());
                ret += chars[index];
                chars.splice(index, 1);
            }
            $("#key").val(ret.toUpperCase());
        }

        function getRandomInt(min, max) {
            min = Math.ceil(min);
            max = Math.floor(max);
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }

        var tableau = BuildTableau('abcdefghijklmnopqrstuvwxyz');
        $('#tableau').html(tableau);

        function BuildTableau(alpha, n) {
            if (!alpha) alpha = 'abcdefghijklmnopqrstuvwxyz';
            /*var s = "<tt><b><u>&nbsp;&nbsp;|&nbsp;" +
              alpha.substr(0, 4) + '&nbsp;' +
              alpha.substr(4, 4) + '&nbsp;' +
              alpha.substr(8, 4) + '&nbsp;' +
              alpha.substr(12, 4) + '&nbsp;' +
              alpha.substr(16, 4) + '&nbsp;' +
              alpha.substr(20, 4) + '&nbsp;' +
              alpha.substr(24, 2) + "</u></b>";*/

            var s = "<tt><b><u>&nbsp;&nbsp;|&nbsp;" + alpha + "</u></b>";

            if (!n) {
                n = 26;
            }

            for (var i = 0; i < n; i++) {
                /*s += '<br><b>' + alpha.charAt(0) + '</b>&nbsp;|&nbsp;' +
                  alpha.substr(0, 4) + '&nbsp;' +
                  alpha.substr(4, 4) + '&nbsp;' +
                  alpha.substr(8, 4) + '&nbsp;' +
                  alpha.substr(12, 4) + '&nbsp;' +
                  alpha.substr(16, 4) + '&nbsp;' +
                  alpha.substr(20, 4) + '&nbsp;' +
                  alpha.substr(24, 2);*/
                s += '<br><b>' + alpha.charAt(0) + '</b>&nbsp;|&nbsp;' + alpha;
                alpha += alpha.charAt(0);
                alpha = alpha.substr(1);
            }
            s += "</tt>";
            return s;
        }

    });
</script>

</html>