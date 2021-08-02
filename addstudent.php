<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true) {
	header("location: login.php");
	exit;
}
?>

<!doctype html>
<html lang="en">
<!-- Header content starts here -->

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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="styles/style.css">
    <title>Welcome - <?php echo $_SESSION['username'] ?></title>
</head>
<!-- Header content ends here -->


<!-- Body starts here -->

<body>
    <!-- Header starts here -->
    <?php include 'partials/_nav2.php'; ?>
    <?php include 'partials/_sidebar.php'; ?>
    <?php include 'partials/_dbconnect.php'; ?>
    <!-- Header ends here -->

    <!-- Main content starts here -->
    <main class="p-2 mt-1" style="min-height: 800px">


        <!-- Page indicator starts here -->
        <div class="container-fluid page-header">
            <?php
            $showAlert = false;
            if($_SERVER['REQUEST_METHOD']=='POST') {
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $roll = $_POST['roll'];
                $dep = $_POST['department'];
                $gender = $_POST['gender'];
                $regdate = $_POST['regdate'];
                $year = $_POST['year'];
                $thesis = $_POST['thesis'];
                $sql = "INSERT INTO `students` (`student_fname`, `student_lname`, `student_roll`, `student_dep`, `student_gender`, `student_regdate`, `student_year`, `student_thesis`) VALUES ('$fname', '$lname', '$roll', '$dep', '$gender', '$regdate', '$year', '$thesis')";
                $result = mysqli_query($conn, $sql);
                $showAlert = true;
            }
    
            if ($showAlert) {
                echo '            
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> You have successfully added a student.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>';
            }    
            ?>
            <div class="row">
                <div class="col-md-6 py-3">
                    <h4 class="text-muted fw-bold">Add Student</h4>
                </div>
                <div class="col-md-6 d-flex justify-content-end text-muted">
                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
                        aria-label="breadcrumb">
                        <ol class="breadcrumb bg-light p-2 px-3 rounded-pill">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item">Students</li>
                            <li class="breadcrumb-item active" aria-current="page">Add Student</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Page indicator ends here -->

        <!-- Add student content starts here -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4 mt-1">
                        <div class="card-header py-3 pb-2">
                            <strong>Basic Information</strong>
                        </div>
                        <div class="card-body">
                            <?php include 'partials/_register.php';?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add student content ends here -->
    </main>
    <!-- Main content ends here -->


    <!-- Footer starts here -->
    <footer>
        <?php include 'partials/_footer.php'; ?>
    </footer>
    <!-- FOoter ends here -->


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
</body>
<!-- Body ends here -->

</html>