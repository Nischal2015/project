<?php 
$login = false;
$showErrors = false;
if($_SERVER["REQUEST_METHOD"] == "POST") {  
	include 'partials/_dbconnect.php';
	$username = mysqli_real_escape_string($conn, $_POST['username']); 
	$password = mysqli_real_escape_string($conn, $_POST['password']); 

	// $sql = "SELECT * FROM `users` WHERE username='$username' AND password='$password'";    
	$sql = "SELECT * FROM `admin_user` WHERE username='$username'";    
	$result = mysqli_query($conn, $sql);
	$num = mysqli_num_rows($result);

	if ($num == 1) {
		while($row = mysqli_fetch_assoc($result)) {
			if (password_verify($password, $row['password'])) {
				$login = true;
				session_start();
				$_SESSION['loggedin'] = true;
				$_SESSION['username'] = $username;
				header("location: dashboard.php");
			}
			else
			{
				$showErrors = "Either the username or password do not match";
			}
		}
	}
	else
	{
		$showErrors = "Username doesn't exist";
	}
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Landing page of the website">

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
    * {
        margin: 0;
        padding: 0;
    }
    .big-text {
        font-size: 52px;
        margin: 20px 0;
        color: darkorange;
    }

    .btn-first {
        margin: 30px 10px;
        width: 150px;
        padding: 10px;
        border-radius: 20px;
    }

    .btn-first {
        background-color: darkorange;
        color: #fff;
    }

    .btn-first:hover {
        background: darkorange;
        border: none;
        color: #fff;
        box-shadow: 5px 5px 10px #999;
        transition: 0.3s;
    }

    .banner-info {
    margin: 100px 0;
    }

    .banner-image {
    margin: 30px 0;
    }
    .tu_logo {
    height: 400px;
    width: 380px;
    margin: 60px 0;
    }

    </style>
    <title>Homepage</title>
</head>

<body>
    <header>
        <?php require 'partials/_nav.php'; ?>
    </header>
    <?php
	session_start();
	if ($login) {
		echo '
		<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Success!</strong> You are logged in
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

	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {
		header("location: dashboard.php");
	}

	?>


    <div class="container">
        <div class="row contents">
          <div class="col-sm-6 banner-info">
            <h1>Institute of Engineering, TU</h1>
            <p class="big-text">MSc Thesis Evaluation System</p>

            <!-- Button trigger modal -->
            <button
              type="button"
              class="btn btn-first"
              data-bs-toggle="modal"
              data-bs-target="#login-button"
            >
              LOGIN
            </button>

            <!-- Modal -->
            <div
              class="modal fade"
              id="login-button"
              tabindex="-1"
              aria-labelledby="login-buttonLabel"
              aria-hidden="true"
            >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="login-buttonLabel">
                      LOGIN
                    </h5>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>
                  <div class="modal-body">
                        <form action="index.php" method="post" class="bg-light p-3 rounded-3">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 banner-image">
            <img src="images/tu-logo.png" class="img-responsive tu_logo" />
          </div>
        </div>
      </div>

      
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