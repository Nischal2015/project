<?php session_start();if(!isset($_SESSION['loggedin'])||$_SESSION['loggedin']!=true){header("location: /");exit;} ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width,initial-scale=1" name="viewport">
    <meta content="Displays the page for adding student" name="description">
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/0212f0c4e4.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="styles/style.min.css" rel="stylesheet">
    <title>Register</title>
</head>

<body>
    <?php include 'partials/_function.php'; ?><?php include 'partials/_nav2.php'; ?><?php include 'partials/_dbconnect.php'; ?>
    <aside><?php include 'partials/_sidebar.php'; ?></aside>
    <main class="mt-1 p-2" style="min-height:800px">
        <div class="container-fluid page-header">
            <?php $showAlert=false;if($_SERVER['REQUEST_METHOD']=='POST'){$fname=mysqli_real_escape_string($conn,$_POST['fname']);$lname=mysqli_real_escape_string($conn,$_POST['lname']);$roll=mysqli_real_escape_string($conn,$_POST['roll']);$dep=mysqli_real_escape_string($conn,$_POST['department']);$gender=mysqli_real_escape_string($conn,$_POST['gender']);$regdate=mysqli_real_escape_string($conn,$_POST['regdate']);$year=mysqli_real_escape_string($conn,$_POST['year']);$thesis=mysqli_real_escape_string($conn,$_POST['thesis']);$sql="INSERT INTO `students` (`student_fname`, `student_lname`, `student_roll`, `student_dep`, `student_gender`, `student_regdate`, `student_year`, `student_thesis`) VALUES ('$fname', '$lname', '$roll', '$dep', '$gender', '$regdate', '$year', '$thesis')";$result=mysqli_query($conn,$sql);$getid="SELECT `student_id` FROM `students` WHERE `student_roll` = '$roll'";$result1=mysqli_query($conn,$getid);$row1=mysqli_fetch_assoc($result1);$student_id=$row1['student_id'];$sql_marks="INSERT INTO `total_marks` (`tm_student_id`, `tm_mid_sup`, `tm_mid_com`, `tm_mid_ext`, `tm_final_sup`, `tm_final_com`, `tm_final_ext`) VALUES ('$student_id', '0', '0', '0', '0', '0', '0')";mysqli_query($conn,$sql_marks);$showAlert=true;}if($showAlert){echo '            
<div class="row"><div class="col-md-12"><div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> You have successfully added a student.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div></div></div>';} ?>
            <div class="row">
                <div class="col-md-6 py-3">
                    <h4 class="text-muted fw-bold">Add Student</h4>
                </div>
                <div class="col-md-6 d-flex justify-content-end text-muted">
                    <nav aria-label="breadcrumb"
                        style="--bs-breadcrumb-divider:url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;)">
                        <ol class="p-2 bg-light breadcrumb px-3 rounded-pill">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item">Students</li>
                            <li class="breadcrumb-item active" aria-current="page">Add Student</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-1 card mb-4">
                        <div class="py-3 card-header pb-2"><strong>Basic Information</strong></div>
                        <div class="card-body"><?php include 'partials/_register.php'; ?></div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer><?php include 'partials/_footer.php'; ?></footer>
    <script crossorigin="anonymous" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"></script>
        
</body>

</html>