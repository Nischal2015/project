<?php $showAlert=false;$showErrors=false;if($_SERVER["REQUEST_METHOD"]=="POST"){include 'partials/_dbconnect.php';require_once("cache.php");$username=mysqli_real_escape_string($conn,$_POST['username']);$password=mysqli_real_escape_string($conn,$_POST['password']);$cpassword=mysqli_real_escape_string($conn,$_POST['cpassword']);$existSql="SELECT * FROM `admin_user` WHERE username = '$username'";$result=mysqli_query($conn,$existSql);$numExistRows=mysqli_num_rows($result);if($numExistRows>0){$showErrors="Username Already exists";}else{if($password==$cpassword){$hash=password_hash($password,PASSWORD_DEFAULT);$sql="INSERT INTO `admin_user` (`username`, `password`, `date`) VALUES('$username', '$hash', current_timestamp())";$result=mysqli_query($conn,$sql);if($result){$showAlert=true;}}else{$showErrors="Passwords do not match";}}} ?>
<!doctypehtml>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width,initial-scale=1" name="viewport">
        <meta content="Signup page of website" name="description">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            crossorigin="anonymous" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC">
        <link href="https://fonts.googleapis.com" rel="preconnect">
        <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
        <style>
        * {
            font-family: Poppins, sans-serif
        }
        </style>
        <title>SignUp</title>
    </head>

    <body>
        <header><?php require 'partials/_nav.php' ?></header><?php if($showAlert){echo '
		<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Success!</strong> Your account is now created and you can login
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>';}if($showErrors){echo '
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>Sorry! </strong>'.$showErrors.'
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>';} ?><main>
            <div class="col-12 col-lg-4 col-md-8 container my-4">
                <ul class="nav nav-fill nav-tabs">
                    <li class="nav-item"><a class="nav-link text-secondary" href="login.php"
                            aria-current="page">Login</a></li>
                    <li class="nav-item"><a class="nav-link active border-2 border-bottom-0 border-light text-primary"
                            href="signup.php">SignUp</a></li>
                </ul>
                <form action="<?php $_SERVER['REQUEST_URI']; ?>" class="bg-light p-3 rounded-3" method="post">
                    <div class="mb-3"><label class="form-label" for="username">Username</label> <input
                            class="form-control" id="username" name="username" maxlength="11"
                            aria-describedby="usernameHelp"></div>
                    <div class="mb-3"><label class="form-label" for="password">Password</label> <input
                            class="form-control" id="password" name="password" type="password"></div>
                    <div class="mb-3"><label class="form-label" for="cpassword">Confirm Password</label> <input
                            class="form-control" id="cpassword" name="cpassword" type="password"> <small
                            class="form-text" id="passwordHelp">Make sure to type the same pasword</small></div><button
                        class="btn btn-primary" type="submit">SignUp</button>
                </form>
            </div>
        </main>
        <footer><?php require 'partials/_footer.php'; ?></footer>
        <script crossorigin="anonymous"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>