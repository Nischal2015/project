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
        <div class="container-fluid page-header">
            <div class="row">
                <div class="col-md-6 py-3">
                    <h4 class="text-muted fw-bold">Committee</h4>
                </div>
                <div class="col-md-6 d-flex justify-content-end text-muted">
                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
                        aria-label="breadcrumb">
                        <ol class="breadcrumb bg-light p-2 px-3 rounded-pill">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item">External</li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Professor</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7 d-flex justify-content-end text-muted">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-secondary">MidTerm</button>
                        <button type="button" class="btn btn-secondary">FinalTerm</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4 mt-1">
                        <div class="card-header pb-2">
                            <strong>Add Committee Teacher</strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="input-group mb-3">
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected disabled>Select teacher</option>
                                        <?php 
                                        $sql = "SELECT * from `ext_teacher`";
                                        $result = mysqli_query($conn, $sql);
                                        $counter = 1;
                                        while($row = mysqli_fetch_assoc($result)) {
                                            echo '
                                            <option value="'.$counter.'">'. $row['external_fname']. ' ' . $row['external_lname'] . '</option>'
                                            ;
                                            $counter +=1;
                                        }
                                        ?>
                                    </select>
                                    <button class="btn btn-primary" type="button" id="button-addon1">Add
                                        Teacher</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4 mt-1">
                        <div class="col-md-7 d-flex justify-content-end text-muted">
                            <strong>Milan shrestha</strong>
                            <button class="btn btn-primary" type="button" id="button-addon1">Delete</button>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <table class="table table-striped">
                                    <colgroup>
                                        <col span="1" style="width: 10%;">
                                        <col span="1" style="width: 75%;">
                                        <col span="1" style="width: 15%;">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th scope="col">S.N</th>
                                            <th scope="col">Marking Parameter</th>
                                            <th scope="col">Marks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Quality of presentation</td>
                                            <td>....</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Problem Formulation / identification / conceptualization</td>
                                            <td>....</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Methodology/Approach</td>
                                            <td>....</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Literature review</td>
                                            <td>....</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Understanding of thesis work and related theory</td>
                                            <td>....</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Answering to questions</td>
                                            <td>....</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Completeness of thesis work</td>
                                            <td>....</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Planning of organization of thesis work</td>
                                            <td>....</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
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


</body>

</html>