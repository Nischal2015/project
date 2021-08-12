<?php

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true) {
	header("location: /");
	exit;
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Profile page of admin">
    <!-- Font awesome pack -->
    <script src="https://kit.fontawesome.com/0212f0c4e4.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="styles/style.min.css">
    <title>Welcome - <?php echo $_SESSION['username'] ?></title>
</head>

<body>
    <header>
        <?php include 'partials/_nav2.php'; ?>
    </header>
    
    <aside>
        <?php include 'partials/_sidebar.php'; ?>
    </aside>

    <main class="p-2 mt-1" style="min-height: 800px">
        <div class="container-fluid page-header">
            <div class="row">
                <div class="col-md-6 py-3">
                    <h4 class="text-muted fw-bold">User Profile</h4>
                </div>
                <div class="col-md-6 d-flex justify-content-end text-muted">
                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
                        aria-label="breadcrumb">
                        <ol class="breadcrumb bg-light p-2 px-3 rounded-pill">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 mt-1">
                        <div class="row">
                            <div class="profile-pic">
                                <img src="images/pulchowk4.jpg" alt="img" class="img-fluid rounded-circle d-block">
                                <b>
                                    <p class="text-center m-0 mt-3 fs-5"><?php echo $_SESSION['username'] ?></p>
                                </b>
                                <small>
                                    <p class="text-center m-0">Professor</p>
                                </small>
                                <small>
                                    <p class="text-center m-0">dummy_email@gmail.com</p>
                                </small>
                            </div>
                        </div>
                        <div class="card-body">
                            <em>This is the body of the profesor's modal.</em>
                        </div>
                    </div>

                    <div class="card mb-4 mt-1">
                        <div class="row">
                            <div class="profile-pic">
                                <img src="images/pulchowk1.jpg" alt="img" class="img-fluid rounded-circle d-block">
                                <b>
                                    <p class="text-center m-0 mt-3 fs-5"><?php echo $_SESSION['loggedin'] ?></p>
                                </b>
                                <small>
                                    <p class="text-center m-0">Assoc. Professor</p>
                                </small>
                                <small>
                                    <p class="text-center m-0">microsoft@facebook.com</p>
                                </small>
                            </div>
                        </div>
                        <div class="card-body">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corporis quia dolorum amet sint,
                            iure aut assumenda consectetur possimus commodi quibusdam odit dolor quaerat eveniet atque
                            qui perferendis. Accusamus maiores rerum velit distinctio eos deserunt consequatur
                            recusandae dolores incidunt, similique quam iste ab ipsa natus repellat sunt nesciunt optio
                            perferendis nam.
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card mb-4 mt-1">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Full Name: Nischal Shakya</li>
                                <li class="list-group-item">Email</li>
                                <li class="list-group-item">Phone</li>
                                <li class="list-group-item">Mobile</li>
                                <li class="list-group-item">Addresss</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="card mb-4 mt-1">
                                <div class="card-body">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, enim ullam? Sint
                                    debitis totam beatae soluta veritatis molestiae dicta quas possimus et aperiam
                                    repellendus corrupti unde alias ab maxime blanditiis porro, repellat nemo obcaecati.
                                    Nam illo ipsum, explicabo accusamus ad nostrum adipisci? Laborum nulla modi beatae
                                    iusto et sequi amet aliquam vitae vero nisi officiis nobis cumque tenetur
                                    accusantium recusandae commodi deleniti repellat pariatur facilis, at possimus quia
                                    impedit! Blanditiis nisi quo voluptas tenetur, libero eum asperiores rerum dolorem,
                                    optio, est laborum quae doloremque aperiam delectus eaque odit fuga. Pariatur
                                    tenetur, dicta modi obcaecati commodi sit. Iure impedit voluptatum laboriosam!
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card mb-4 mt-1">
                                <div class="card-body">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, enim ullam? Sint
                                    debitis totam beatae soluta veritatis molestiae dicta quas possimus et aperiam
                                    repellendus corrupti unde alias ab maxime blanditiis porro, repellat nemo obcaecati.
                                    Nam illo ipsum, explicabo accusamus ad nostrum adipisci? Laborum nulla modi beatae
                                    iusto et sequi amet aliquam vitae vero nisi officiis nobis cumque tenetur
                                    accusantium recusandae commodi deleniti repellat pariatur facilis, at possimus quia
                                    impedit! Blanditiis nisi quo voluptas tenetur, libero eum asperiores rerum dolorem,
                                    optio, est laborum quae doloremque aperiam delectus eaque odit fuga. Pariatur
                                    tenetur, dicta modi obcaecati commodi sit. Iure impedit voluptatum laboriosam!
                                </div>
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