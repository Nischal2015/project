<?php $login=false;$showErrors=false;if($_SERVER["REQUEST_METHOD"]=="POST"){include 'partials/_dbconnect.php';$username=mysqli_real_escape_string($conn,$_POST['username']);$password=mysqli_real_escape_string($conn,$_POST['password']);$sql="SELECT * FROM `admin_user` WHERE username='$username'";$result=mysqli_query($conn,$sql);$num=mysqli_num_rows($result);if($num==1){while($row=mysqli_fetch_assoc($result)){if(password_verify($password,$row['password'])){$login=true;session_start();$_SESSION['loggedin']=true;$_SESSION['username']=$username;header("location: dashboard.php");}else{$showErrors="Either the username or password do not match";}}}else{$showErrors="Username doesn't exist";}} ?>
<!doctypehtml>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width,initial-scale=1" name="viewport">
        <meta content="Landing page of the website" name="description">
        <meta name="google-site-verification" content="WxEiyTio10336erQIx2IGPniVZgz9GwtCKk6wCS7zOw" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            crossorigin="anonymous" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC">
        <link href="https://fonts.googleapis.com" rel="preconnect">
        <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
        <style>
        * {
            font-family: Poppins, sans-serif
        }

        * {
            margin: 0;
            padding: 0
        }

        .big-text {
            font-size: 52px;
            margin: 20px 0;
            color: #ff8c00
        }

        .btn-first {
            margin: 30px 10px;
            width: 150px;
            padding: 10px;
            border-radius: 20px
        }

        .btn-first {
            background-color: #ff8c00;
            color: #fff
        }

        .btn-first:hover {
            background: #ff8c00;
            border: none;
            color: #fff;
            box-shadow: 5px 5px 10px #999;
            transition: .3s
        }

        .banner-info {
            margin: 100px 0
        }

        .banner-image {
            margin: 30px 0
        }

        .tu_logo {
            height: 400px;
            width: 380px;
            margin: 60px 0
        }
        </style>
        <title>MSc Thesis Evaluation System</title>
    </head>

    <body>
        <header><?php require 'partials/_nav.php'; ?></header>
        <?php if($login){echo '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> You are logged in<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';}if($showErrors){echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Sorry! </strong>'.$showErrors.'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';}if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==true){header("location: dashboard.php");} ?>
        <div class="container">
            <div class="contents row">
                <div class="col-sm-6 banner-info">
                    <h1>Institute of Engineering, TU</h1>
                    <p class="big-text">MSc Thesis Evaluation System</p><button class="btn btn-first" type="button"
                        data-bs-target="#login-button" data-bs-toggle="modal">LOGIN</button>
                    <div class="fade modal" aria-hidden="true" aria-labelledby="login-buttonLabel" id="login-button"
                        tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="login-buttonLabel">LOGIN</h5><button class="btn-close"
                                        type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="index.php" class="bg-light p-3 rounded-3" method="post">
                                        <div class="mb-3"><label class="form-label" for="username">Username</label>
                                            <input class="form-control" id="username" name="username"
                                                aria-describedby="emailHelp"></div>
                                        <div class="mb-3"><label class="form-label" for="password">Password</label>
                                            <input class="form-control" id="password" name="password" type="password">
                                        </div><button class="btn btn-primary" type="submit">Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 banner-image"><img alt="tu-logo" class="img-responsive tu_logo"
                        src="images/tu-logo.png"></div>
            </div>
        </div>
        <footer><?php include 'partials/_footer.php'; ?></footer>
        <script crossorigin="anonymous"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
            
    </body>

    </html>