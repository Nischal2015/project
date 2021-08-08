<!-- This page displays the information of the student -->
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `students` WHERE `student_id` = $id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result)==0) {
        echo '
        <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </svg>
        <div>
        <strong>Sorry! </strong>Student doesn\'t exist
    </div>
    </div>
    ';
    exit();
    }
}
else{
    exit();
}
?>
<div class="card mb-4 mt-1">
    <div class="card-header py-3 pb-2">
        <strong>Student Information</strong>
    </div>
    <div class="card-body">
        <div class="profile-pic">
            <?php
            $row = mysqli_fetch_assoc($result);
            if ($row['student_gender']=='Male') {
                echo '
                <img src="images/male.png" alt="img" class="img-fluid rounded-circle d-block">
                ';
            }
            elseif($row['student_gender']=='Female') {
                echo '
                <img src="images/female.png" alt="img" class="img-fluid rounded-circle d-block">
                ';
            }
            ?>
        </div>
        <div class="container mt-4">
            <div class="row">
                <?php
                
                
                echo '
                <div class="col-md-2">
                    <div><strong>Firstname</strong></div>
                    <div><strong>Roll No.</strong></div>
                    <div><strong>Student Year</strong></div>
                    <div><strong>Thesis Title</strong></div>
                </div>
                <div class="col-md-4">
                    <div>'.$row['student_fname'].'</div>
                    <div>'.$row['student_roll'].'</div>
                    <div>'.$row['student_year'].'</div>
                    <div>'. strtoupper($row['student_thesis']) .'</div>
                </div>
                <div class="col-md-2">
                    <div><strong>Lastname</strong></div>
                    <div><strong>Gender</strong></div>
                    <div><strong>Department</strong></div>
                    <div><strong>Marks Details</strong></div>
                </div>
                <div class="col-md-4">
                    <div>'.$row['student_lname'].'</div>
                    <div>'.$row['student_gender'].'</div>
                    <div>'.$row['student_dep'].'</div>
                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#marksDetailsModal">
                    <i class="fa fa-info-circle fa-lg" style="color: #ffffff !important;"></i>
                    </button>
                </div>';
                ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="marksDetailsModal" aria-labelledby="marksDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="marksDetailsModalLabel"><strong>Marks Details<?php echo ' ('.$row['student_fname']. ' ' .$row['student_lname'].')'?></strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="marks-list" class="table table-striped table-hover" style="width:100%">
                        <colgroup>
                            <col span="1" style="width: 30%;">
                            <col span="1" style="width: 25%;">
                            <col span="1" style="width: 25%;">
                            <col span="1" style="width: 20%;">
                        </colgroup>
                        <thead>
                            <tr>
                                <th></th>
                                <th>Mid</th>
                                <th>Final</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $std_id = $_GET['id'];
                            $sql = "SELECT * FROM `total_marks` WHERE `tm_student_id`='$std_id'";
                            $result = mysqli_query($conn, $sql);
                            $student_marks = mysqli_fetch_assoc($result);
                            echo '
                            <tr>
                                <th>Supervisor</th>
                                <td>'.$student_marks['tm_mid_sup'].'</td>
                                <td>'.$student_marks['tm_final_sup'].'</td>
                                <td><strong>'.$student_marks['tm_mid_sup']+$student_marks['tm_final_sup'].'</strong></td>
                            </tr>
                            <tr>
                                <th>Committee</th>
                                <td>'.$student_marks['tm_mid_com'].'</td>
                                <td>'.$student_marks['tm_final_com'].'</td>
                                <td><strong>'.$student_marks['tm_mid_com']+$student_marks['tm_final_com'].'</strong></td>
                            </tr>
                            <tr>
                                <th>External</th>
                                <td>'.$student_marks['tm_mid_ext'].'</td>
                                <td>'.$student_marks['tm_final_ext'].'</td>
                                <td><strong>'.$student_marks['tm_mid_ext']+$student_marks['tm_final_ext'].'</strong></td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Total</th>
                                <td><strong>'.$student_marks['tm_mid_sup']+$student_marks['tm_mid_com']+$student_marks['tm_mid_ext'].'</strong></td>
                                <td><strong>'.$student_marks['tm_final_sup']+$student_marks['tm_final_com']+$student_marks['tm_final_ext'].'</strong></td>
                                <td><strong>'.$student_marks['tm_mid_sup']+$student_marks['tm_mid_com']+$student_marks['tm_mid_ext']+$student_marks['tm_final_sup']+$student_marks['tm_final_com']+$student_marks['tm_final_ext'].'</strong></td>
                            </tr>
                            </tfoot><strong>';
                            ?>
                        
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>