<?php
$delete = false;

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
    <meta name="description" content="Displays the page for adding internal teacher">
    <!-- Font awesome pack -->
    <script src="https://kit.fontawesome.com/0212f0c4e4.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Internal</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <header>
        <?php include 'partials/_nav2.php'; ?>
        <?php include 'partials/_dbconnect.php'; ?>
        <?php
            if (isset($_GET['delete'])) {
                $teacher_id = $_GET['delete'];
                echo $teacher_id;
                $sql = "DELETE FROM `teacher` WHERE `teacher_id` = '$teacher_id'";
                $result = mysqli_query($conn, $sql);
                $delete = true;
            }
            ?>
    </header>
    <aside>
        <?php include 'partials/_sidebar.php'; ?>
    </aside>

    <main class="p-2 mt-1" style="min-height: 800px">
        <div class="container-fluid page-header">
            <?php
            $showAlert = false;
            if($_SERVER['REQUEST_METHOD']=='POST') {
                $tpost = $_POST['tpost'];
                $tfname = $_POST['tfname'];
                $tmname = $_POST['tmname'];
                $tlname = $_POST['tlname'];
                if($tfname != "" && $tlname != "" && $tpost != ""){
                    $sql = "INSERT INTO `teacher` (`teacher_post`, `teacher_fname`, `teacher_mname`, `teacher_lname`) VALUES ('$tpost', '$tfname', '$tmname', '$tlname')";
                    $result = mysqli_query($conn, $sql);
                    $showAlert = true;
                }
            }
    
            if ($showAlert) {
                echo '            
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> You have successfully added an external teacher.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>';
            }    
            ?>

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
            ?>
            <div class="row">
                <div class="col-md-6 py-3">
                    <h4 class="text-muted fw-bold">Add Internal</h4>
                </div>
                <div class="col-md-6 d-flex justify-content-end text-muted">
                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
                        aria-label="breadcrumb">
                        <ol class="breadcrumb bg-light p-2 px-3 rounded-pill">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item">Teacher</li>
                            <li class="breadcrumb-item active" aria-current="page">Add Internal</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4 mt-1">
                        <div class="card-header pb-2">
                            <strong>Add Internal</strong>
                        </div>
                        <div class="card-body">
                            <form action="addInternal.php" method="post">
                                <div class="row">
                                    <div class="col-md-6 pt-2">
                                        <div class="form-floating mb-2">
                                            <select class="form-select" aria-label="Default select example" id="tpost"
                                                name="tpost">
                                                <option selected value="">Choose..</option>
                                                <option value="Dr.">Dr.</option>
                                                <option value="Mr.">Mr.</option>
                                                <option value="Mrs.">Mrs.</option>
                                            </select>
                                            <label for="tpost">Designation</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6 pt-2">
                                        <div class="form-floating mb-2">
                                            <input type="text" class="form-control" id="tfname" name="tfname"
                                                placeholder="Firstname">
                                            <label for="InputFirstname">Firstname</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6 pt-2">
                                        <div class="form-floating mb-2">
                                            <input type="text" class="form-control" id="tmname" name="tmname"
                                                placeholder="Middlename">
                                            <label for="InputMiddlename">Middlename</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6 pt-2">
                                        <div class="form-floating mb-2">
                                            <input type="text" class="form-control" id="tlname" name="tlname"
                                                placeholder="Lastname">
                                            <label for="InputLastname">Lastname</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4 mt-1">
                        <div class="card-header py-3 pb-2">
                            <strong>Internal Teachers</strong>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="internal-list" class="table table-striped table-hover" style="width:100%">
                                    <colgroup>
                                        <col span="1" style="width: 85%;">
                                        <col span="1" style="width: 15%;">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $sql = "SELECT * from `teacher`";
                                        $result = mysqli_query($conn, $sql);
                                        while($row = mysqli_fetch_assoc($result)) {
                                            echo '
                                            <tr>
                                            <td>'. $row['teacher_post'] . ' '. $row['teacher_fname'] . ' '. $row['teacher_mname'] . ' ' . $row['teacher_lname'] . '</td>
                                            <td>
                                            <!--<button type="button" class="edit btn btn-primary btn-sm" id="'. $row['teacher_id'] .'"  data-bs-placement="bottom" title="Edit" data-bs-toggle="modal" data-bs-target="#studentEditModal">
                                            <i class="fa fa-pencil"></i>
                                            </button>-->

                                            <button type="button" class="delete btn btn-danger btn-sm" id="'. $row['teacher_id'] .'" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"><i class="fa fa-trash-o"></i>
                                            </button>

                                            <!--<button type="button" class="information btn btn-warning btn-sm" id="'. $row['teacher_id'] .'" title="Details" data-bs-toggle="modal" data-bs-target="#studentInfoModal">	
                                            <i class="fa fa-info"></i>
                                            </button>-->

                                            </td>
                                            </tr>';
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
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

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->
    <script>
    $(document).ready(function() {
        $('#internal-list').DataTable();
    });
    </script>

    <script>
    /*infos = document.getElementsByClassName('information');
    Array.from(infos).forEach((element) => {
        element.addEventListener("click", (e) => {
            tr = e.currentTarget.parentNode.parentNode;
            console.log(tr);
            name = tr.getElementsByTagName("td")[0].innerText;
        })
    })*/

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
        element.addEventListener("click", (e) => {
            element_id = e.currentTarget.id;
            if (confirm("Are you sure you want to delete the record?")) {
                window.location = `./addInternal.php?delete=${element_id}`;
            }
        })
    })

    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
        element.addEventListener("click", (e) => {
            tr = e.currentTarget.parentNode.parentNode;
            element_id = e.currentTarget.id;
        })
    })
    </script>

</body>

</html>