<div class="bg-white offcanvas offcanvas-start shadow sidebar-nav text-white" id="sidebar"
    aria-labelledby="sidebarLabel">
    <div class="offcanvas-body p-0">
        <nav class="navbar-white">
            <ul class="navbar-nav side-link">
                <li>
                    <div class="m-2" id="sidebar-pic"><img alt="tu_image" class="d-block img-fluid rounded-circle"
                            src="images/tu.png"></div>
                </li>
                <li class="nav-item main-link"><a class="nav-link px-3 sidebar-link" href="dashboard.php"><span
                            class="pe-2"><i class="material-icons">space_dashboard</i> </span><span>Dashboard</span></a>
                </li>
                <li class="main-link collapsed" aria-controls="Teacher" aria-expanded="false" data-bs-target="#Teacher"
                    data-bs-toggle="collapse" id="second"><a class="nav-link px-3 sidebar-link" href="#Teacher"
                        aria-controls="Teacher" aria-expanded="false" data-bs-toggle="collapse" role="button"><span
                            class="pe-2"><i class="material-icons">supervisor_account </i></span><span>Teacher</span>
                        <span class="ms-auto right-icon"><i class="material-icons">chevron_right</i></span></a>
                    <div class="ps-4 collapse sidebar-collapse" id="Teacher" aria-labelledby="second"
                        data-bs-parent="#sidebar">
                        <ul class="ps-4 navbar-nav">
                            <li class="nav-item"><a class="nav-link" href="addExternal.php"><span class="title">Add
                                        External</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="addInternal.php"><span class="title">Add
                                        Internal</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="main-link collapsed" aria-controls="student" aria-expanded="false" data-bs-target="#student"
                    data-bs-toggle="collapse" id="third"><a class="nav-link px-3 sidebar-link" href="#student"
                        aria-controls="student" aria-expanded="false" data-bs-toggle="collapse" role="button"><span
                            class="pe-2"><i class="material-icons">people </i></span><span>Student</span> <span
                            class="ms-auto right-icon"><i class="material-icons">chevron_right</i></span></a>
                    <div class="ps-4 collapse sidebar-collapse" id="student" aria-labelledby="third"
                        data-bs-parent="#sidebar">
                        <ul class="ps-4 navbar-nav">
                            <li class="nav-item"><a class="nav-link" href="addstudent.php"><span class="title">Add
                                        student</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="allstudents.php"><span class="title">All
                                        Students</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="main-link collapsed" aria-controls="department" aria-expanded="false"
                    data-bs-target="#department" data-bs-toggle="collapse" id="fou"><a
                        class="nav-link px-3 sidebar-link" href="#department" aria-controls="department"
                        aria-expanded="false" data-bs-toggle="collapse" role="button"><span class="pe-2"><i
                                class="material-icons">business </i></span><span>Departments</span> <span
                            class="ms-auto right-icon"><i class="material-icons">chevron_right</i></span></a>
                    <div class="ps-4 collapse sidebar-collapse" id="department" aria-labelledby="fou"
                        data-bs-parent="#sidebar">
                        <ul class="ps-4 navbar-nav">
                            <li class="nav-item"><a class="nav-link" href="alldepartments.php"><span class="title">Add
                                        Departments</span></a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>