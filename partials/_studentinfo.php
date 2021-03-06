<?php if(isset($_GET['id'])){$id=$_GET['id'];$sql="SELECT * FROM `students` WHERE `student_id` = $id";$result=mysqli_query($conn,$sql);if(mysqli_num_rows($result)==0){echo '
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>
            <div>
                <strong>Sorry! </strong>Student doesn\'t exist
            </div>
        </div>
    ';exit();}}else{exit();} ?><div class="card mb-4 mt-1">
    <div class="card-header pb-2 py-3"><strong>Student Information</strong></div>
    <div class="card-body">
        <div class="profile-pic"><?php $row=mysqli_fetch_assoc($result);if($row['student_gender']=='Male'){echo '
                <img src="images/male.png" alt="img" class="img-fluid rounded-circle d-block">
                ';}elseif($row['student_gender']=='Female'){echo '
                <img src="images/female.png" alt="img" class="img-fluid rounded-circle d-block">
                ';} ?></div>
        <div class="container-fluid mt-4"><?php echo '
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-6"><strong>Firstname</strong></div>
                    <div class="col-md-3 col-sm-6 col-6">'.e($row['student_fname']).'</div>
                    <div class="col-md-3 col-sm-6 col-6"><strong>Lastname</strong></div>
                    <div class="col-md-3 col-sm-6 col-6">'.e($row['student_lname']).'</div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-6"><strong>Roll No.</strong></div>
                    <div class="col-md-3 col-sm-6 col-6">'.e($row['student_roll']).'</div>
                    <div class="col-md-3 col-sm-6 col-6"><strong>Gender</strong></div>
                    <div class="col-md-3 col-sm-6 col-6">'.e($row['student_gender']).'</div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-6"><strong>Student Year</strong></div>
                    <div class="col-md-3 col-sm-6 col-6">'.e($row['student_year']).'</div>
                    <div class="col-md-3 col-sm-6 col-6"><strong>Department</strong></div>
                    <div class="col-md-3 col-sm-6 col-6">'.e($row['student_dep']).'</div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-6"><strong>Thesis Title</strong></div>
                    <div class="col-md-3 col-sm-6 col-6">'.e($row['student_thesis']).'</div>
                    <div class="col-md-3 col-sm-6 col-6"><strong>Marks Details</strong></div>
                    <div class="col-md-3 col-sm-6 col-6">
                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#marksDetailsModal">
                        <i class="fa fa-info-circle fa-lg" style="color: #ffffff !important;"></i>
                    </button>
                </div>'; ?></div>
    </div>
</div>
<div class="fade modal" aria-hidden="true" aria-labelledby="marksDetailsModalLabel" id="marksDetailsModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="marksDetailsModalLabel"><strong>Marks
                        Details<?php echo ' ('.e($row['student_fname']). ' ' .e($row['student_lname']).')'?></strong>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped" id="marks-list" style="width:100%">
                        <colgroup>
                            <col span="1" style="width:30%">
                            <col span="1" style="width:25%">
                            <col span="1" style="width:25%">
                            <col span="1" style="width:20%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th></th>
                                <th>Mid</th>
                                <th>Final</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody><?php $std_id=$_GET['id'];$sql="SELECT * FROM `total_marks` WHERE `tm_student_id`='$std_id'";$result=mysqli_query($conn,$sql);$student_marks=mysqli_fetch_assoc($result);echo '
                            <tr>
                                <th>Supervisor</th>
                                <td>'.e($student_marks['tm_mid_sup']).'</td>
                                <td>'.e($student_marks['tm_final_sup']).'</td>
                                <td><strong>'.e($student_marks['tm_mid_sup'])+e($student_marks['tm_final_sup']).'</strong></td>
                            </tr>
                            <tr>
                                <th>Committee</th>
                                <td>'.e($student_marks['tm_mid_com']).'</td>
                                <td>'.e($student_marks['tm_final_com']).'</td>
                                <td><strong>'.e($student_marks['tm_mid_com'])+e($student_marks['tm_final_com']).'</strong></td>
                            </tr>
                            <tr>
                                <th>External</th>
                                <td>'.e($student_marks['tm_mid_ext']).'</td>
                                <td>'.e($student_marks['tm_final_ext']).'</td>
                                <td><strong>'.e($student_marks['tm_mid_ext'])+e($student_marks['tm_final_ext']).'</strong></td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Total</th>
                                <td><strong>'.e($student_marks['tm_mid_sup'])+e($student_marks['tm_mid_com'])+e($student_marks['tm_mid_ext']).'</strong></td>
                                <td><strong>'.e($student_marks['tm_final_sup'])+e($student_marks['tm_final_com'])+e($student_marks['tm_final_ext']).'</strong></td>
                                <td><strong>'.e($student_marks['tm_mid_sup'])+e($student_marks['tm_mid_com'])+e($student_marks['tm_mid_ext'])+e($student_marks['tm_final_sup'])+e($student_marks['tm_final_com'])+e($student_marks['tm_final_ext']).'</strong></td>
                            </tr>
                            </tfoot>'; ?>
                    </table>
                </div>
            </div>
            <div class="modal-footer"><button class="btn btn-secondary" data-bs-dismiss="modal"
                    type="button">Close</button></div>
        </div>
    </div>
</div>