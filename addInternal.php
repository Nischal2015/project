<?php $delete=false;session_start();if(!isset($_SESSION['loggedin'])||$_SESSION['loggedin']!=true){header("location: /");exit;} ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width,initial-scale=1" name="viewport">
    <meta content="Displays the page for adding internal teacher" name="description">
    <script src="https://kit.fontawesome.com/0212f0c4e4.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC">
    <title>Internal</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="styles/style.min.css" rel="stylesheet">
</head>

<body>
    <header>
        <?php include 'partials/_nav2.php'; ?><?php include 'partials/_dbconnect.php'; ?><?php if(isset($_GET['delete'])){$teacher_id=$_GET['delete'];echo $teacher_id;$sql="DELETE FROM `teacher` WHERE `teacher_id` = '$teacher_id'";$result=mysqli_query($conn,$sql);$delete=true;} ?>
    </header>
    <aside><?php include 'partials/_sidebar.php'; ?></aside>
    <main class="mt-1 p-2" style="min-height:800px">
        <div class="container-fluid page-header"><?php $showAlert=false;if($_SERVER['REQUEST_METHOD']=='POST'){$tpost=$_POST['tpost'];$tfname=$_POST['tfname'];$tmname=$_POST['tmname'];$tlname=$_POST['tlname'];if($tfname!=""&&$tlname!=""&&$tpost!=""){$sql="INSERT INTO `teacher` (`teacher_post`, `teacher_fname`, `teacher_mname`, `teacher_lname`) VALUES ('$tpost', '$tfname', '$tmname', '$tlname')";$result=mysqli_query($conn,$sql);$showAlert=true;}}if($showAlert){echo '            
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> You have successfully added an external teacher.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
</div>';} ?><?php if($delete){echo '            
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Record has been deleted successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
</div>';} ?><div class="row">
                <div class="col-md-6 py-3">
                    <h4 class="text-muted fw-bold">Add Internal</h4>
                </div>
                <div class="col-md-6 d-flex justify-content-end text-muted">
                    <nav aria-label="breadcrumb"
                        style="--bs-breadcrumb-divider:url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;)">
                        <ol class="p-2 bg-light breadcrumb px-3 rounded-pill">
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
                    <div class="mt-1 card mb-4">
                        <div class="card-header pb-2"><strong>Add Internal</strong></div>
                        <div class="card-body">
                            <form action="addInternal.php" method="post">
                                <div class="row">
                                    <div class="col-md-6 pt-2">
                                        <div class="form-floating mb-2"><select aria-label="Default select example"
                                                class="form-select" id="tpost" name="tpost" required>
                                                <option value="" selected>Choose..</option>
                                                <option value="Dr.">Dr.</option>
                                                <option value="Mr.">Mr.</option>
                                                <option value="Mrs.">Mrs.</option>
                                            </select> <label for="tpost">Designation</label></div>
                                    </div>
                                    <div class="col-md-6 pt-2">
                                        <div class="form-floating mb-2"><input class="form-control" id="tfname"
                                                name="tfname" placeholder="Firstname" autocomplete="off" required> <label
                                                for="InputFirstname">Firstname</label></div>
                                    </div>
                                    <div class="col-md-6 pt-2">
                                        <div class="form-floating mb-2"><input class="form-control" id="tmname"
                                                name="tmname" placeholder="Middlename" autocomplete="off"> <label
                                                for="InputMiddlename">Middlename</label></div>
                                    </div>
                                    <div class="col-md-6 pt-2">
                                        <div class="form-floating mb-2"><input class="form-control" id="tlname"
                                                name="tlname" placeholder="Lastname" autocomplete="off" required> <label
                                                for="InputLastname">Lastname</label></div>
                                    </div>
                                    <div class="col-md-12"><button class="btn btn-primary" type="submit">Submit</button>
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
                    <div class="mt-1 card mb-4">
                        <div class="card-header pb-2 py-3"><strong>Internal Teachers</strong></div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped" id="internal-list" style="width:100%">
                                    <colgroup>
                                        <col span="1" style="width:85%">
                                        <col span="1" style="width:15%">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody><?php $sql="SELECT * from `teacher`";$result=mysqli_query($conn,$sql);while($row=mysqli_fetch_assoc($result)){echo '
<tr>
<td>'.$row['teacher_post'].' '.$row['teacher_fname'].' '.$row['teacher_mname'].' '.$row['teacher_lname'].'</td>
<td>
<button type="button" class="delete btn btn-danger btn-sm" id="'.$row['teacher_id'].'" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"><i class="fa fa-trash-o"></i>
</button>                                        
</td>
</tr>';} ?></tbody>
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
    <footer><?php include 'partials/_footer.php'; ?></footer>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"></script>
    <script>
    $(document).ready(function() {
        $("#internal-list").DataTable()
    })
    </script>
    <script>
    deletes = document.getElementsByClassName("delete"), Array.from(deletes).forEach(e => {
        e.addEventListener("click", e => {
            element_id = e.currentTarget.id, confirm("Are you sure you want to delete the record?") && (
                window.location = `./addInternal.php?delete=${element_id}`)
        })
    });
    </script>
    
</body>

</html>