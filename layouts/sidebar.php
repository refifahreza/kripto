<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">UMKT</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'index.html' ? 'active' : ''; ?>">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Cipher Tools
    </div>

    <!-- Nav Item - Vigenere Cipher -->
    <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'vigenere.php' ? 'active' : ''; ?>">
        <a class="nav-link" href="vigenere.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Vigenere Cipher</span></a>
    </li>

    <!-- Nav Item - Playfair Cipher -->
    <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'playfair.php' ? 'active' : ''; ?>">
        <a class="nav-link" href="playfair.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Playfair Cipher</span></a>
    </li>

    <!-- Nav Item - Hill Cipher -->
    <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'hill.php' ? 'active' : ''; ?>">
        <a class="nav-link" href="hill.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Hill Cipher</span></a>
    </li>

    <!-- Nav Item - Super Encryption -->
    <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'super_encryption.php' ? 'active' : ''; ?>">
        <a class="nav-link" href="super_encryption.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Super Encryption</span></a>
    </li>

</ul>