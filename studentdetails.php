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
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <header>
        <?php include 'partials/_nav2.php'; ?>
        <?php include 'partials/_sidebar.php'; ?>
        <?php include 'partials/_dbconnect.php'; ?>
    </header>

    <main class="p-2 mt-1" style="min-height: 800px">
        <?php
            if($_SERVER['REQUEST_METHOD']=='POST') {
               if(!empty($_POST['checklist'])) {
                   $student_id = $_GET['id'];
                   foreach($_POST['checklist'] as $selected) {
                       $sql= "INSERT INTO `teacher_assigned` (`assigned_fname`, `assigned_lname`, `assigned_teacher_id`) SELECT student_fname, student_lname , (SELECT teacher_id FROM teacher WHERE teacher_id = '$selected') FROM students WHERE student_id='$student_id'";
                       $result = mysqli_query($conn, $sql);
                   }
                   
               }
               echo "sucess";
            }
            ?>
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
                            <li class="breadcrumb-item">Students</li>
                            <li class="breadcrumb-item"><a href="allstudents.php">All Students</a></li>
                            <li class="breadcrumb-item">Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <?php include 'partials/_studentinfo.php'; ?>
                </div>
                <div class="col-md-12 mb-4">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#supervisorModal">Add
                        Supervisor &plus;</button>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#externalModal">Add External
                        &plus;</button>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#committeeModal">Add
                        Committee &plus;</button>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <strong>Supervisor</strong>
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <strong>Add Supervisor</strong>
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </div>


        </div>
        </div>
        </div>
    </main>

    <?php include 'partials/_footer.php'; ?>


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
    <!-- Supervisor Modal -->
    <div class="modal fade" id="supervisorModal" tabindex="-1" aria-labelledby="supervisorModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="supervisorModalLabel">Add Supervisor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="container">
                        <div class="row row-cols-2">
                            <?php
                            $sql = "SELECT * FROM `teacher`";
                            $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_assoc($result)) {
                                $id = $row['teacher_id'];
                                $post = $row['teacher_post'];
                                $fname = $row['teacher_fname'];
                                $mname = $row['teacher_mname'];
                                $lname = $row['teacher_lname'];
                            echo '
                            <div class="col">
                                <label for='.$id.'>'.$post.' '.$fname.' '.$mname.' '.$lname.'</label>
                                <input type="radio" name="supervisor" id='.$id.'>
                            </div>';
                            }
                            ?>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Committe Modal -->
    <div class="modal fade" id="committeeModal" tabindex="-1" aria-labelledby="committeeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="committeeModalLabel">Add committee Teachers</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php $_SERVER['REQUEST_URI']; ?>" method="post">
                    <div class="modal-body">
                        <div class="container">
                            <div class="row row-cols-2">
                                <?php
                            $sql = "SELECT * FROM `teacher`";
                            $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_assoc($result)) {
                                $id = $row['teacher_id'];
                                $post = $row['teacher_post'];
                                $fname = $row['teacher_fname'];
                                $mname = $row['teacher_mname'];
                                $lname = $row['teacher_lname'];
                            echo '
                            <div class="col">
                                <label for='.$id.'>'.$post.' '.$fname.' '.$mname.' '.$lname.'</label>
                                <input type="checkbox" name="checklist[]" id='.$id.' value='.$id.'>
                            </div>';
                            }
                            ?>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- External Modal -->
    <div class="modal fade" id="externalModal" tabindex="-1" aria-labelledby="externalModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="externalModalLabel">Add external</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


</body>

</html>