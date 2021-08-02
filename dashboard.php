<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true) {
	header("location: login.php");
	exit;
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Displays the dashboard of admin profile">
    <!-- Font awesome pack -->
    <script src="https://kit.fontawesome.com/0212f0c4e4.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Welcome - <?php echo $_SESSION['username'] ?></title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <header>
        <?php include 'partials/_nav2.php'; ?>
        <?php include 'partials/_sidebar.php'; ?>
        <?php include 'partials/_dbconnect.php'; ?>
    </header>

    <main class="p-2 mt-1" style="min-height: 800px">
        <div class="container-fluid page-header">
            <div class="row">
                <div class="col-md-6 py-3">
                    <h4 class="text-muted fw-bold">Dashboard</h4>
                </div>
                <div class="col-md-6 d-flex justify-content-end text-muted">
                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
                        aria-label="breadcrumb">
                        <ol class="breadcrumb bg-light p-2 px-3 rounded-pill">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="card mb-4 mt-1">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-3">
                                    <span class="pe-2"><i class="material-icons d-flex justify-content-center">
                                            people
                                        </i></span>
                                </div>
                                <div class="col-md-9">
                                    <strong class="card-title">Total Students</strong>
                                    <p>
                                        <?php
                                        $sql = "SELECT `student_id` from `students`";
                                        $result = mysqli_query($conn, $sql);
                                        echo mysqli_num_rows($result);
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card mb-4 mt-1">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-3">
                                    <span class="pe-2"><i class="material-icons d-flex justify-content-center">
                                            supervisor_account
                                        </i></span>
                                </div>
                                <div class="col-md-9">
                                    <strong class="card-title">Total Professors</strong>
                                    <p>
                                        <?php
                                        $sql = "SELECT `external_id` FROM `ext_teacher`";
                                        $result = mysqli_query($conn, $sql);
                                        echo mysqli_num_rows($result);
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card mb-4 mt-1">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-3">
                                    <span class="pe-2"><i class="material-icons d-flex justify-content-center">
                                            business
                                        </i></span>
                                </div>
                                <div class="col-md-9">
                                    <strong class="card-title">Total Departments</strong>
                                    <p>
                                        <?php
                                        $sql = "SELECT `dep_id` from `department`";
                                        $result = mysqli_query($conn, $sql);
                                        echo mysqli_num_rows($result);
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card mb-4 mt-1">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-3">
                                    <span class="pe-2"><i class="material-icons d-flex justify-content-center">
                                            people
                                        </i></span>
                                </div>
                                <div class="col-md-9">
                                    <strong class="card-title">#Title 3</strong>
                                    <p>78945</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-4 mt-1">
                        <div class="card-header py-3 pb-2">
                            <strong>Student Marks</strong>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="student-marks" class="table table-striped table-hover" style="width:100%">
                                    <colgroup>
                                        <col span="1" style="width: 20%;">
                                        <col span="1" style="width: 35%;">
                                        <col span="1" style="width: 15%;">
                                        <col span="1" style="width: 15%;">
                                        <col span="1" style="width: 15%;">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th>Roll No.</th>
                                            <th>Name</th>
                                            <th>Internal</th>
                                            <th>External</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>075BCT999</td>
                                            <td>Ram lal</td>
                                            <td>12</td>
                                            <td>48</td>
                                            <td>60</td>
                                        </tr>
                                        <tr>
                                            <td>075BCT174</td>
                                            <td>Facebook Google</td>
                                            <td>96</td>
                                            <td>78</td>
                                            <td>174</td>
                                        </tr>
                                        <tr>
                                            <td>075BCT785</td>
                                            <td>alu padhe jhyaple</td>
                                            <td>45</td>
                                            <td>12</td>
                                            <td>57</td>
                                        </tr>
                                        <tr>
                                            <td>075BCT785</td>
                                            <td>alu padhe jhyaple</td>
                                            <td>45</td>
                                            <td>12</td>
                                            <td>57</td>
                                        </tr>
                                        <tr>
                                            <td>075BCT785</td>
                                            <td>alu padhe jhyaple</td>
                                            <td>45</td>
                                            <td>12</td>
                                            <td>57</td>
                                        </tr>
                                        <tr>
                                            <td>075BCT785</td>
                                            <td>alu padhe jhyaple</td>
                                            <td>45</td>
                                            <td>12</td>
                                            <td>57</td>
                                        </tr>
                                        <tr>
                                            <td>075BCT785</td>
                                            <td>alu padhe jhyaple</td>
                                            <td>45</td>
                                            <td>12</td>
                                            <td>57</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Roll No.</th>
                                            <th>Name</th>
                                            <th>Internal</th>
                                            <th>External</th>
                                            <th>Total</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 mt-1">
                        <div class="card-header py-3 pb-2">
                            <strong>Department List</strong>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="department-list" class="table table-striped table-hover" style="width:100%">
                                    <colgroup>
                                        <col span="1" style="width: 20%;">
                                        <col span="1" style="width: 80%;">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Dep. Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM `department`";                                        
                                        $result = mysqli_query($conn, $sql);
                                        $sno = 1;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                        echo '
                                        <tr>
                                            <td>'. $sno .'</td>
                                            <td>'. $row['dep_name'] .'</td>
                                        </tr>';
                                        $sno += 1;
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Dep. Name</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-8 profile-content">
                    <div class="card mb-4 mt-1">
                        <div class="card-body">
                            <h5 class="card-title">#Title 4</h5>
                            <p class="card-text">The contents of the required title are be kept here</p>
                        </div>
                    </div>

                    <div class="card mb-4 mt-1">
                        <div class="card-body">
                            <div>
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div> -->
        </div>


        </div>
    </main>

    <footer>
        <?php include 'partials/_footer.php'; ?>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


    <script>
    $(document).ready(function() {      
        $('#student-marks').DataTable();
    }); 
    </script>



    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    const labels = [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'October',
        'November',
        'December'
    ];
    const data = {
        labels: labels,
        datasets: [{
            label: 'My First dataset',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [0, 10, 5, 2, 20, 30, 45, 15, 56, 10, 30, 9],
        }]
    };

    const config = {
        type: 'line',
        data,
        options: {}
    };
    // === include 'setup' then 'config' above ===

    var myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
    </script> -->



    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->


</body>

</html>