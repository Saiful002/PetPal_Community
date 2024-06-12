
<?php
function isActive($page) {
    return basename($_SERVER['PHP_SELF']) == $page ? 'active' : '';
}
?>
  
<nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"> PetPals Community</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?= isActive('home.php') ?>" href="../Home/home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= isActive('adoption.php') ?>" href="../Adoption/adoption.php">Adoption Center</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= isActive('petProfile.php') ?>" href="../Pet_Profile/petProfile.php">Pet Profiles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= isActive('resource.php') ?>" href="../Resources/resource.php">Resources</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= isActive('store.php') ?>" href="../Store/store.php">Store</a>
                    </li>
                    <?php if (isset($_SESSION['user_email'])): ?>
                        <li class="nav-item">
                        <a class="nav-link <?= isActive('ledgerSelect.php') ?>" href="../Ledger/ledgerSelect.php">Ledger</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= isActive('cartSelect.php') ?>" href="../Cart/cartSelect.php">Cart</a>
                    </li>
                <li class="nav-item">
                    <a class="nav-link bg-danger border rounded<?= isActive('logout.php') ?>" href="../LogOut/logOut.php">LogOut</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link bg-success border rounded<?= isActive('login.php') ?>" href="../Login/login.php">LogIn</a>
                </li>
            <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
