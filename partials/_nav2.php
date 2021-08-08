<nav class="navbar navbar-expand-lg bg-light fixed-top shadow my-0">
    <!-- Offcanvas trigger -->
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar"
        aria-controls="sidebar">
        <!-- <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span> -->
        <span class="material-icons" data-bs-target="#sidebar">menu</span>
    </button>
    <div class="page-title">
        <div class="navbar-brand fw-bold text-uppercase me-auto" id="thesis" href="#">
            <span>
                <i class="fa fa-graduation-cap fa-lg" style="padding:0 5px 0 55px; color: #ffffff !important;"></i>
            </span>
            Thesis
        </div>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="material-icons">menu</span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="d-flex ms-auto navbar-nav mb-2 mb-lg-0">
            <li class="nav-item dropdown mx-3">
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="material-icons me-1">
                        account_circle
                    </span>
                    <p class="my-0 text-dark"><?php echo $_SESSION['username']; ?></p>
                </a>
                <ul class="dropdown-menu dropdown-menu-end me-auto" aria-labelledby="navbarDropdown">
                    <li class="py-1">
                        <a class="dropdown-item" href="welcome.php">
                            <span>
                                <i class="fas fa-user-circle fa-lg"></i>
                            </span>
                            Profile
                        </a>
                    </li>
                    <li class="py-1">
                        <a class="dropdown-item" href="logout.php">
                            <span><i class="fa fa-sign-out fa-lg"></i></span>
                            Logout
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>