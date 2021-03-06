<?php $delete=false;$update=false;session_start();if(!isset($_SESSION['loggedin'])||$_SESSION['loggedin']!=true){header("location: /");exit;} ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width,initial-scale=1" name="viewport">
    <meta content="Displays the page for all students" name="description">
    <meta content="public" http-equiv="Cache-control">
    <script src="https://kit.fontawesome.com/0212f0c4e4.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC">
    <title>Students</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="styles/style.min.css" rel="stylesheet">
</head>

<body><?php require 'partials/_function.php'; ?><header>
        <?php include 'partials/_nav2.php'; ?><?php include 'partials/_dbconnect.php'; ?><?php if(isset($_GET['delete'])){$student_id=e($_GET['delete']);$sql="DELETE FROM `students` WHERE `student_id` = '$student_id'";$result=mysqli_query($conn,$sql);if($result){$delete=true;}}if($_SERVER['REQUEST_METHOD']=="POST"){$student_id=mysqli_real_escape_string($conn,$_POST['snoEdit']);$fname=mysqli_real_escape_string($conn,$_POST['fnameEdit']);$lname=mysqli_real_escape_string($conn,$_POST['lnameEdit']);$roll=mysqli_real_escape_string($conn,$_POST['rollEdit']);$gender=mysqli_real_escape_string($conn,$_POST['genderEdit']);$dep=mysqli_real_escape_string($conn,$_POST['departmentEdit']);$regdate=mysqli_real_escape_string($conn,$_POST['regdateEdit']);$year=mysqli_real_escape_string($conn,$_POST['yearEdit']);$thesis=mysqli_real_escape_string($conn,$_POST['thesisEdit']);$sql="UPDATE `students` SET `student_fname` = '$fname', `student_lname` = '$lname', `student_roll` = '$roll', `student_gender` = '$gender', `student_regdate` = '$regdate', `student_year` = '$year', `student_dep` = '$dep', `student_thesis` = '$thesis' WHERE `student_id` = $student_id";$result=mysqli_query($conn,$sql);if($result){$update=true;}} ?>
    </header>
    <aside><?php include 'partials/_sidebar.php'; ?></aside>
    <main class="mt-1 p-2" style="min-height:800px">
        <div class="container-fluid page-header">
            <?php if($delete){echo '<div class="row"><div class="col-md-12"><div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> Record has been deleted successfully.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div></div></div>';}if($update){echo "\n<div class='row'>\n<div class='col-md-12'>\n<div class='alert alert-success alert-dismissible fade show' role='alert'>\n<strong>Success!</strong> Your student has been updated successfully.\n<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>\n</div>\n</div>\n</div>";} ?>
            <div class="row">
                <div class="col-md-6 py-3">
                    <h4 class="text-muted fw-bold">All Students</h4>
                </div>
                <div class="col-md-6 d-flex justify-content-end text-muted">
                    <nav aria-label="breadcrumb"
                        style="--bs-breadcrumb-divider:url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;)">
                        <ol class="p-2 bg-light breadcrumb px-3 rounded-pill">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item">Students</li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="allstudents.php">All
                                    Students</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-1 card mb-4">
                        <div class="py-3 card-header pb-2"><strong>All Students</strong></div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped" id="student-list" style="width:100%">
                                    <colgroup>
                                        <col span="1" style="width:12%">
                                        <col span="1" style="width:20%">
                                        <col span="1" style="width:20%">
                                        <col span="1" style="width:23%">
                                        <col span="1" style="width:12%">
                                        <col span="1" style="width:13%">
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
                                            $year = e($_GET['year']);
                                            $sql = "SELECT * from `students` WHERE `student_year`='$year'";
                                        }
                                        else{
                                            $sql = "SELECT * FROM `students`";
                                        }
                                        $result = mysqli_query($conn, $sql);
                                        while($row = mysqli_fetch_assoc($result)) {
                                            echo '
                                            <tr>
                                                <td>'. e($row['student_roll']) .'</td>
                                                <td>'. e($row['student_fname']) . ' ' . e($row['student_lname']) . '</td>
                                                <td>'. $row['student_dep'] .'</td>
                                                <td>'. e($row['student_thesis']) .'</td>
                                                <td>'. e($row['student_regdate']). '</td>
                                                <td>
                                                    <button type="button" class="edit btn btn-secondary btn-sm" id=e'. e($row['student_id']) .'  data-bs-placement="bottom" title="Edit" data-bs-toggle="modal" data-bs-target="#studentEditModal">
                                                    <i class="fa fa-pencil"></i>
                                                    </button>
                                                    <button type="button" class="delete btn btn-danger btn-sm" id=d'. e($row['student_id']) .' data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"><i class="fa fa-trash-o"></i>
                                                    </button>
                                                    <a role="button" href="studentdetails.php?id='. e($row['student_id']) .'" class="information btn btn-warning btn-sm" id='. e($row['student_id']) .' title="Details" style="padding: 4px 5px !important;">	
                                                    <i class="fa fa-info-circle fa-lg" style="color: #ffffff !important;"></i>
                                                    </a>
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
    <footer><?php include 'partials/_footer.php'; ?></footer><?php include 'partials/_editmodal.php'; ?><script
        src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"></script>
    <script>
    $(document).ready(function() {
        $('#student-list').DataTable();
    });
    infos = document.getElementsByClassName("information"), Array.from(infos).forEach(e => {
        e.addEventListener("click", e => {
            tr = e.currentTarget.parentNode.parentNode, console.log(tr), name = tr.getElementsByTagName(
                "td")[0].innerText
        })
    }), deletes = document.getElementsByClassName("delete"), Array.from(deletes).forEach(e => {
        e.addEventListener("click", e => {
            element_id = e.currentTarget.id.substr(1), console.log(element_id), confirm(
                "Are you sure you want to delete the record?") && (window.location =
                `./allstudents.php?delete=${element_id}`)
        })
    }), edits = document.getElementsByClassName("edit"), Array.from(edits).forEach(e => {
        e.addEventListener("click", e => {
            element_id = e.currentTarget.id.substr(1), tr = e.currentTarget.parentNode.parentNode,
                item = tr.getElementsByTagName("td"), roll = item[0].innerText, fname = item[1]
                .innerText.split(" ")[0], lname = item[1].innerText.split(" ")[1], department = item[2]
                .innerText, console.log(department), thesis = item[3].innerText, regdate = item[4]
                .innerText, rollEdit.value = roll, fnameEdit.value = fname, lnameEdit.value = lname,
                thesisEdit.value = thesis, regdateEdit.value = regdate, document.getElementById(
                    "departmentEdit").value = department, snoEdit.value = element_id
        })
    });
    </script>
    
</body>

</html>