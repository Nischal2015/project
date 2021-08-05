<div class="card mb-4 mt-1">
    <div class="card-header py-3 pb-2">
        <strong>Student Information</strong>
    </div>
    <div class="card-body">
        <div class="profile-pic">
            <img src="images/profile.png" alt="img" class="img-fluid rounded-circle d-block">
        </div>
        <div class="container mt-4">
            <div class="row">
                <?php
                $id = $_GET['id'];
                $sql = "SELECT * FROM `students` WHERE `student_id` = $id";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                echo '
                <div class="col-md-2">
                    <div><strong>Firstname</strong></div>
                    <div><strong>Roll No.</strong></div>
                    <div><strong>Student Year</strong></div>
                </div>
                <div class="col-md-4">
                    <div>'.$row['student_fname'].'</div>
                    <div>'.$row['student_roll'].'</div>
                    <div>'.$row['student_year'].'</div>
                </div>
                <div class="col-md-2">
                    <div><strong>Lastname</strong></div>
                    <div><strong>Gender</strong></div>
                    <div><strong>Department</strong></div>
                </div>
                <div class="col-md-4">
                    <div>'.$row['student_lname'].'</div>
                    <div>'.$row['student_gender'].'</div>
                    <div>'.$row['student_dep'].'</div>
                </div>
                <div class="col-md-2">
                    <div><strong>Thesis Title</strong></div>
                </div>
                <div class="col-md-6">
                    <div>'. strtoupper($row['student_thesis']) .'</div>
                </div>';
                ?>
            </div>
        </div>
    </div>
</div>