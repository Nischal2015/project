<?php session_start();if(!isset($_SESSION['loggedin'])||$_SESSION['loggedin']!=true){header("location: /");exit;} ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width,initial-scale=1" name="viewport">
    <meta content="Displays the dashboard of admin profile" name="description">
    <script src="https://kit.fontawesome.com/0212f0c4e4.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="styles/style.min.css" rel="stylesheet">
</head>

<body><?php include 'partials/_function.php'; ?><header>
        <?php include 'partials/_nav2.php'; ?><?php include 'partials/_dbconnect.php'; ?></header>
    <aside><?php include 'partials/_sidebar.php'; ?></aside>
    <main class="mt-1 p-2"style="min-height:800px"><div class="container-fluid page-header"><div class="row"><div class="py-3 col-md-6"><h4 class="text-muted fw-bold">Dashboard</h4></div><div class="d-flex col-md-6 justify-content-end text-muted"><nav aria-label="breadcrumb"style="--bs-breadcrumb-divider:url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;)"><ol class="p-2 bg-light breadcrumb px-3 rounded-pill"><li class="breadcrumb-item"><a href="index.php">Home</a></li><li class="breadcrumb-item active"aria-current="page">Dashboard</li></ol></nav></div></div></div><div class="container-fluid"><div class="row"><div class="col-md-3"><div class="mt-1 card mb-4"><div class="card-body"><div class="row align-items-center"><div class="col-md-3"><span class="pe-2"><i class="d-flex justify-content-center material-icons">people</i></span></div><div class="col-md-9"><strong class="card-title">Total Students</strong><p><?php $sql="SELECT `student_id` from `students`";$result=mysqli_query($conn,$sql);echo mysqli_num_rows($result); ?></p></div></div></div></div></div><div class="col-md-3"><div class="mt-1 card mb-4"><div class="card-body"><div class="row align-items-center"><div class="col-md-3"><span class="pe-2"><i class="d-flex justify-content-center material-icons">supervisor_account</i></span></div><div class="col-md-9"><strong class="card-title">Total Internals</strong><p><?php $sql="SELECT `teacher_id` FROM `teacher`";$result=mysqli_query($conn,$sql);echo mysqli_num_rows($result); ?></p></div></div></div></div></div><div class="col-md-3"><div class="mt-1 card mb-4"><div class="card-body"><div class="row align-items-center"><div class="col-md-3"><span class="pe-2"><i class="d-flex justify-content-center material-icons">people</i></span></div><div class="col-md-9"><strong class="card-title">Total Externals</strong><p><?php $sql="SELECT `external_id` FROM `ext_teacher`";$result=mysqli_query($conn,$sql);echo mysqli_num_rows($result); ?></p></div></div></div></div></div><div class="col-md-3"><div class="mt-1 card mb-4"><div class="card-body"><div class="row align-items-center"><div class="col-md-3"><span class="pe-2"><i class="d-flex justify-content-center material-icons">business</i></span></div><div class="col-md-9"><strong class="card-title">Total Departments</strong><p><?php $sql="SELECT `dep_id` from `department`";$result=mysqli_query($conn,$sql);echo mysqli_num_rows($result); ?></p></div></div></div></div></div><div class="col-md-8"><div class="mt-1 card mb-4"><div class="py-3 card-header pb-2"><strong>Student Marks</strong></div><div class="card-body"><div class="table-responsive"><table class="table table-hover table-striped"id="student-marks"style="width:100%"><colgroup><col span="1"style="width:20%"><col span="1"style="width:35%"><col span="1"style="width:15%"><col span="1"style="width:15%"><col span="1"style="width:15%"></colgroup><thead><tr><th>Roll No.</th><th>Name</th><th>Internal</th><th>External</th><th>Total</th></tr></thead><tbody><?php $st_sql="SELECT s.student_roll, s.student_fname, s.student_lname, tm.tm_mid_sup, tm.tm_mid_com, tm.tm_mid_ext, tm.tm_final_sup, tm.tm_final_com, tm.tm_final_ext\n                                        FROM students s\n                                        INNER JOIN total_marks tm\n                                        ON s.student_id=tm.tm_student_id\n                                        ";$result=mysqli_query($conn,$st_sql);while($st_row=mysqli_fetch_assoc($result)){$internal=$st_row['tm_mid_sup']+$st_row['tm_mid_com']+$st_row['tm_final_sup']+$st_row['tm_final_com'];$external=$st_row['tm_final_ext']+$st_row['tm_mid_ext'];$total=$internal+$external;echo '
    <tr>
        <td>'.e($st_row['student_roll']).'</td>
        <td>'.e($st_row['student_fname']).' '.e($st_row['student_lname']).'</td>
        <td>'.e($internal).'</td>
        <td>'.e($external).'</td>
        <td>'.e($total).'</td>
    </tr>
    ';} ?></tbody><tfoot><tr><th>Roll No.</th><th>Name</th><th>Internal</th><th>External</th><th>Total</th></tr></tfoot></table></div></div></div></div><div class="col-md-4"><div class="mt-1 card mb-4"><div class="py-3 card-header pb-2"><strong>Department List</strong></div><div class="card-body"><div class="table-responsive"><table class="table table-hover table-striped"id="department-list"style="width:100%"><colgroup><col span="1"style="width:20%"><col span="1"style="width:80%"></colgroup><thead><tr><th>S.N.</th><th>Dep. Name</th></tr></thead><tbody><?php $sql="SELECT * FROM `department`";$result=mysqli_query($conn,$sql);$sno=1;while($row=mysqli_fetch_assoc($result)){echo '
    <tr>
        <td>'.$sno.'</td>
        <td>'.$row['dep_name'].'</td>
    </tr>';$sno+=1;} ?></tbody><tfoot><tr><th>S.N.</th><th>Dep. Name</th></tr></tfoot></table></div></div></div></div></div></div></main>
    <footer><?php include 'partials/_footer.php'; ?></footer>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"></script>
    <script>
    $(document).ready(function() {
        $("#student-marks").DataTable()
    })
    </script>
</body>

</html>