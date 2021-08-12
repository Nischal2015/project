<!-- Sidebar starts here -->
<div class="offcanvas offcanvas-start sidebar-nav bg-white text-white shadow" id="sidebar"
    aria-labelledby="sidebarLabel" style="z-index: 0;">
    <div class="offcanvas-body p-0">
        <nav class="navbar-white">
            <ul class="navbar-nav side-link">
                <li>
                    <div class="m-2" id="sidebar-pic">
                        <img src="images/tu.png" alt="tu_image" class="img-fluid rounded-circle d-block">
                    </div>
                </li>
                <li class="nav-item main-link">
                    <a href="dashboard.php" class="nav-link px-3 sidebar-link">
                        <span class="pe-2"><i class="material-icons">
                                space_dashboard</i>
                        </span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="collapsed main-link" data-bs-toggle="collapse" data-bs-target="#Teacher"
                    aria-expanded="false" aria-controls="Teacher" id="second">
                    <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#Teacher" role="button"
                        aria-expanded="false" aria-controls="Teacher">
                        <span class="pe-2"><i class="material-icons">
                                supervisor_account
                            </i></span>
                        <span>Teacher</span>
                        <span class="right-icon ms-auto"><i class="material-icons">
                                chevron_right
                            </i></span>
                    </a>
                    <div class="collapse sidebar-collapse ps-4" aria-labelledby="second" data-bs-parent="#sidebar"
                        id="Teacher">
                        <ul class="navbar-nav ps-4">
                            <li class="nav-item">
                                <a href="addExternal.php" class="nav-link ">
                                    <span class="title">
                                        Add External
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="addInternal.php" class="nav-link ">
                                    <span class="title">
                                        Add Internal
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="collapsed main-link" data-bs-toggle="collapse" data-bs-target="#student"
                    aria-expanded="false" aria-controls="student" id="third">
                    <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#student" role="button"
                        aria-expanded="false" aria-controls="student">
                        <span class="pe-2"><i class="material-icons">
                                people
                            </i></span>
                        <span>Student</span>
                        <span class="right-icon ms-auto"><i class="material-icons">
                                chevron_right
                            </i></span>
                    </a>
                    <div class="collapse sidebar-collapse ps-4" aria-labelledby="third" data-bs-parent="#sidebar"
                        id="student">
                        <ul class="navbar-nav ps-4">
                            <li class="nav-item">
                                <a href="addstudent.php" class="nav-link ">
                                    <span class="title">
                                        Add student
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="allstudents.php" class="nav-link ">
                                    <span class="title">
                                        All Students
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="collapsed main-link" data-bs-toggle="collapse" data-bs-target="#department"
                    aria-expanded="false" aria-controls="department" id="fou">
                    <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#department" role="button"
                        aria-expanded="false" aria-controls="department">
                        <span class="pe-2"><i class="material-icons">
                                business
                            </i></span>
                        <span>Departments</span>
                        <span class="right-icon ms-auto"><i class="material-icons">
                                chevron_right
                            </i></span>
                    </a>
                    <div class="collapse sidebar-collapse ps-4" aria-labelledby="fou" data-bs-parent="#sidebar"
                        id="department">
                        <ul class="navbar-nav ps-4">
                            <li class="nav-item">
                                <a href="alldepartments.php" class="nav-link ">
                                    <span class="title">
                                        Add Departments
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- Sidebar ends here -->