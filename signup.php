<!-- Signup backend starts here -->
<?php 
$showAlert = false;
$showErrors = false;
if($_SERVER["REQUEST_METHOD"] == "POST") {  
	include 'partials/_dbconnect.php';
	$username = $_POST['username']; 
	$password = $_POST['password']; 
	$cpassword = $_POST['cpassword']; 
	// $exists = false;

	// Check whether this username exists
	$existSql = "SELECT * FROM `admin_user` WHERE username = '$username'";
	$result = mysqli_query($conn, $existSql);
	$numExistRows = mysqli_num_rows($result);
	if ($numExistRows > 0) {
	// $exists = true;
		$showErrors = "Username Already exists";
	}
	else {
	// $exists = false;
		if ($password == $cpassword) {
			$hash = password_hash($password, PASSWORD_DEFAULT);
			$sql = "INSERT INTO `admin_user` (`username`, `password`, `date`) VALUES('$username', '$hash', current_timestamp())";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				$showAlert = true;
			}
		}
		else
		{
			$showErrors = "Passwords do not match";
		}
	}
}
?>
<!-- Signup backend ends here -->

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <style>
    * {
        font-family: 'Poppins', sans-serif;
    }
    </style>
    <title>SignUp</title>
</head>


<body>
    <!-- Header starts here -->
    <?php require 'partials/_nav.php' ?>
    <!-- Header ends here -->

    <!-- Alerts -->
    <?php
	if ($showAlert) {
		echo '
		<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Success!</strong> Your account is now created and you can login
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>';
	}

	if ($showErrors) {
		echo '
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>Sorry! </strong>' . $showErrors.'
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>';
	}
	?>


    <div class="container my-4 col-lg-4 col-md-8 col-12">
        <ul class="nav nav-tabs nav-fill">
            <li class="nav-item">
                <a class="nav-link text-secondary" aria-current="page" href="/project/login.php">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active border-light border-bottom-0 border-2 text-primary"
                    href="/project/signup.php">SignUp</a>
            </li>
        </ul>

        <!-- Signup form starts here -->
        <form action="<?php $_SERVER['REQUEST_URI']; ?>" method="post" class="bg-light p-3 rounded-3">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" maxlength="11" class="form-control" id="username" name="username"
                    aria-describedby="usernameHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword">
                <small id="passwordHelp" class="form-text">Make sure to type the same pasword</small>
            </div>
            <button type="submit" class="btn btn-primary">SignUp</button>
        </form>
        <!-- Signup form ends here -->
    </div>

    <!-- Footer starts here -->
    <?php require 'partials/_footer.php'; ?>
    <!-- Footer end here -->


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