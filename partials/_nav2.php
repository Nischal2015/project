<nav class="my-0 bg-light fixed-top navbar navbar-expand-lg shadow"><button aria-controls="sidebar"
        class="navbar-toggler" data-bs-target="#sidebar" data-bs-toggle="offcanvas" type="button"><span
            class="material-icons" data-bs-target="#sidebar">menu</span></button>
    <div class="page-title">
        <div class="me-auto fw-bold navbar-brand text-uppercase" id="thesis" href="#"><span><i
                    class="fa-lg fa fa-graduation-cap" style="padding:0 5px 0 55px;color:#fff!important"></i>
            </span>Thesis</div>
    </div><button aria-controls="navbarSupportedContent" class="navbar-toggler" data-bs-target="#navbarSupportedContent"
        data-bs-toggle="collapse" type="button" aria-expanded="false" aria-label="Toggle navigation"><span
            class="material-icons">menu</span></button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="d-flex mb-2 mb-lg-0 ms-auto navbar-nav">
            <li class="dropdown mx-3 nav-item"><a class="d-flex align-items-center dropdown-toggle nav-link" href="#"
                    aria-expanded="false" data-bs-toggle="dropdown" id="navbarDropdown" role="button"><span
                        class="material-icons me-1">account_circle</span>
                    <p class="my-0 text-dark"><?php echo $_SESSION['username']; ?></p>
                </a>
                <ul class="me-auto dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li class="py-1"><a class="dropdown-item" href="welcome.php"><span><i
                                    class="fa-lg fa-user-circle fas"></i> </span>Profile</a></li>
                    <li class="py-1"><a class="dropdown-item" href="logout.php"><span><i
                                    class="fa-lg fa fa-sign-out"></i></span> Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>