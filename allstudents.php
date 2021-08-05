<?php
$delete = false;
$update = false;

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
    <meta http-equiv="Cache-control" content="public">
    <!-- Font awesome pack -->
    <script src="https://kit.fontawesome.com/0212f0c4e4.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Welcome - <?php echo $_SESSION['username'] ?></title>
    <!-- Google Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <?php include 'partials/_nav2.php'; ?>
    <?php include 'partials/_sidebar.php'; ?>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php
    if (isset($_GET['delete'])) {
        $student_id = $_GET['delete'];
        echo $student_id;
        $sql = "DELETE FROM `students` WHERE `student_id` = '$student_id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $delete = true;
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {        
          // Update the record
        $student_id = $_POST['snoEdit'];
        $fname = $_POST['fnameEdit'];
        $lname = $_POST['lnameEdit'];
        $roll = $_POST['rollEdit'];
        $gender = $_POST['genderEdit'];
        $dep = $_POST['departmentEdit'];
        $regdate = $_POST['regdateEdit'];
        $year = $_POST['yearEdit'];
        $thesis = $_POST['thesisEdit'];
      
        $sql = "UPDATE `students` SET `student_fname` = '$fname', `student_lname` = '$lname', `student_roll` = '$roll', `student_gender` = '$gender', `student_regdate` = '$regdate', `student_year` = '$year', `student_dep` = '$dep', `student_thesis` = '$thesis' WHERE `student_id` = $student_id";

        $result = mysqli_query($conn, $sql);
        if ($result) {
        $update = true;
        }
    }       
    ?>

    <main class="p-2 mt-1" style="min-height: 800px">
        <div class="container-fluid page-header">
            <?php            
            if($delete) {
                echo '            
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> Record has been deleted successfully.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>';
            }

            if ($update) {
                echo "
                <div class='row'>
                    <div class='col-md-12'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>Success!</strong> Your student has been udpated succesfully.
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>
                    </div>
                </div>";        
            }
            ?>
            <div class="row">
                <div class="col-md-6 py-3">
                    <h4 class="text-muted fw-bold">All Students</h4>
                </div>
                <div class="col-md-6 d-flex justify-content-end text-muted">
                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
                        aria-label="breadcrumb">
                        <ol class="breadcrumb bg-light p-2 px-3 rounded-pill">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item">Students</li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a href="allstudents.php">All Students</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container my-4 col-lg-4 col-md-8 col-12">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a href="/project/allstudents.php?year=2075" role="button" class="nav-link">2075</a>
                    <a href="/project/allstudents.php?year=2076" role="button" class="nav-link">2076</a>
                    <a href="/project/allstudents.php?year=2077" role="button" class="nav-link">2077</a>
                    <a href="/project/allstudents.php?year=2078" role="button" class="nav-link">2078</a>
                </div>
            </nav>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4 mt-1">
                        <div class="card-header py-3 pb-2">
                            <strong>All Students</strong>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="student-list" class="table table-striped table-hover" style="width:100%">
                                    <colgroup>
                                        <col span="1" style="width: 12%;">
                                        <col span="1" style="width: 20%;">
                                        <col span="1" style="width: 20%;">
                                        <col span="1" style="width: 23%;">
                                        <col span="1" style="width: 12%;">
                                        <col span="1" style="width: 13%;">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th>Roll</th>
                                            <th>Name</th>
                                            <th>Department</th>
                                            <th>Thesis</th>
                                            <th>Reg. Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        if (isset($_GET['year'])) {
                                            $year = $_GET['year'];
                                            $sql = "SELECT * from `students` WHERE `student_year`='$year'";
                                        }
                                        else{
                                            $sql = "SELECT * FROM `students`";
                                        }
                                        $result = mysqli_query($conn, $sql);
                                        while($row = mysqli_fetch_assoc($result)) {
                                            echo '
                                            <tr>
                                                <td>'. $row['student_roll'] .'</td>
                                                <td>'. $row['student_fname'] . ' ' . $row['student_lname'] . '</td>
                                                <td>'. $row['student_dep'] .'</td>
                                                <td>'. $row['student_thesis'] .'</td>
                                                <td>'. $row['student_regdate']. '</td>
                                                <td>
                                                    <button type="button" class="edit btn btn-primary btn-sm" id=e'. $row['student_id'] .'  data-bs-placement="bottom" title="Edit" data-bs-toggle="modal" data-bs-target="#studentEditModal">
                                                    <i class="fa fa-pencil"></i>
                                                    </button>
                                                    <button type="button" class="delete btn btn-danger btn-sm" id=d'. $row['student_id'] .' data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"><i class="fa fa-trash-o"></i>
                                                    </button>
                                                    <a role="button" href="studentdetails.php?id='. $row['student_id'] .'" class="information btn btn-warning btn-sm" id='. $row['student_id'] .' title="Details" style="padding: 4px 5px !important;">	
                                                    <i class="fa fa-info-circle fa-lg" style="color: #ffffff !important;"></i>
                                                    </button>
                                                </td>
                                            </tr>';
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Roll</th>
                                            <th>Name</th>
                                            <th>Department</th>
                                            <th>Thesis</th>
                                            <th>Reg. Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include 'partials/_footer.php'; ?>
    <?php include 'partials/_editmodal.php'; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->

    <script>
    $(document).ready(function() {
        $('#student-list').DataTable();
    });
    
    infos = document.getElementsByClassName('information');
    Array.from(infos).forEach((element) => {
        element.addEventListener("click", (e) => {
            tr = e.currentTarget.parentNode.parentNode;
            console.log(tr);
            name = tr.getElementsByTagName("td")[0].innerText;
        })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
        element.addEventListener("click", (e) => {
            element_id = e.currentTarget.id.substr(1, );
            console.log(element_id);
            if (confirm("Are you sure you want to delete the record?")) {
                window.location = `./allstudents.php?delete=${element_id}`;
            }
        })
    })

    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
        element.addEventListener("click", (e) => {
            element_id = e.currentTarget.id.substr(1, );
            tr = e.currentTarget.parentNode.parentNode;
            item = tr.getElementsByTagName("td");
            roll = item[0].innerText;
            fname = item[1].innerText.split(" ")[0];
            lname = item[1].innerText.split(" ")[1];
            department = item[2].innerText;
            thesis = item[3].innerText;
            regdate = item[4].innerText;
            rollEdit.value = roll;
            fnameEdit.value = fname;
            lnameEdit.value = lname;
            thesisEdit.value = thesis;
            regdateEdit.value = regdate;
            document.getElementById("departmentEdit").value = department;
            snoEdit.value = element_id;
        })
    })
    </script>
</body>
</html>