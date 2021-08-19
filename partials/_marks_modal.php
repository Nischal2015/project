<form action="studentdetails.php?id=<?php echo $student_id; ?>" method="post">
    <div class="modal fade" id="committee_marking" aria-labelledby="committee_markingLabel" aria-hidden="true">
        <?php
            $p1="";
            $p2="";
            $p3="";
            $p4="";
            $p5="";
            $p6="";
            $p7="";
            $p8=""; 
            $tot=0;       
            if (isset($_GET['id']) && isset($_GET['tid'])) {
                $sid = $_GET['id']; // student_id
                $identity = $_GET['tid'];
                $action=substr($identity, 0,2);
                $tid = substr($identity,2); // teacher_assigned_id
                if($action=="ce") {
                    $sql = "SELECT * FROM `mid_committee` WHERE `st_te_assigned_id`='$tid'";
                }
                else if ($action=="ee") {
                    $sql = "SELECT * FROM `mid_external` WHERE `st_te_assigned_id`='$tid'";
                }
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result)==1) {
                    $row = mysqli_fetch_assoc($result);
                    $p1=$row['par1'];
                    $p2=$row['par2'];
                    $p3=$row['par3'];
                    $p4=$row['par4'];
                    $p5=$row['par5'];
                    $p6=$row['par6'];
                    $p7=$row['par7'];
                    $p8=$row['par8'];
                    $tot=$row['total'];
                }                
            }
        ?>
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="committee_markingLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input class="comhidden" name="assigned_id" id="assigned_id" style="display:none;">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover committee-marks-table" style="width: 100%" ;>
                            <colgroup>
                                <col span="1" style="width: 10%;">
                                <col span="1" style="width: 50%;">
                                <col span="1" style="width: 15%;">
                                <col span="1" style="width: 25%;">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th scope="col">S.N.</th>
                                    <th scope="col">Marking Parameter</th>
                                    <th scope="col">Full Marks</th>
                                    <th scope="col">Obtained Marks</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Quality of presentation</td>
                                    <td>10</td>
                                    <td>
                                        <input class="form-control" id="quality_of_presentation"
                                            name="quality_of_presentation" type="number" value=<?php echo $p1;?>>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Problem Formulation / identification / conceptualization</td>
                                    <td>20</td>
                                    <td>
                                        <input class="form-control" id="problem_identification"
                                            name="problem_identification" type="number" value=<?php echo $p2;?>>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Methodology/Approach</td>
                                    <td>10</td>
                                    <td>
                                        <input class="form-control" id="methodology" name="methodology" type="number"
                                            value=<?php echo $p3;?>>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Literature review</td>
                                    <td>10</td>
                                    <td>
                                        <input class="form-control" id="literature_review" name="literature_review"
                                            type="number" value=<?php echo $p4;?>>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>Understanding of thesis work and related theory</td>
                                    <td>10</td>
                                    <td>
                                        <input class="form-control" id="understanding" name="understanding"
                                            type="number" value=<?php echo $p5;?>>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td>Answering to questions</td>
                                    <td>10</td>
                                    <td>
                                        <input class="form-control" id="answers" name="answers" type="number"
                                            value=<?php echo $p6;?>>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">7</th>
                                    <td>Completeness of thesis work</td>
                                    <td>20</td>
                                    <td>
                                        <input class="form-control" id="completeness" name="completeness" type="number"
                                            value=<?php echo $p7;?>>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">8</th>
                                    <td>Planning of organization of thesis work</td>
                                    <td>10</td>
                                    <td>
                                        <input class="form-control" id="planning" name="planning" type="number"
                                            value=<?php echo $p8;?>>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <table class="table table-striped table-hover committee-marks-table" style="width: 100%">
                        <colgroup>
                            <col span="1" style="width: 10%;">
                            <col span="1" style="width: 48%;">
                            <col span="1" style="width: 17%;">
                            <col span="1" style="width: 25%;">
                        </colgroup>
                        <thead>
                            <tr>
                                <th scope="row"></th>
                                <td>Total</td>
                                <td>100</td>
                                <td id="disp_total"><?php echo $tot;?></td>
                            </tr>
                        </thead>
                    </table>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!--Supervisor Modal -->
<form action="studentdetails.php?id=<?php echo $student_id; ?>" method="post">
    <div class="modal fade" id="supervisor_marking" aria-labelledby="supervisor_markingLabel" aria-hidden="true">
        <?php
        $p1="";
        $p2="";
        $p3="";
        $p4="";
        $p5=""; 
        $tot=0;       
        if (isset($_GET['id']) && isset($_GET['sid'])) {
            $sid = $_GET['id']; // student_id
            $identity = $_GET['sid'];
            $action=substr($identity, 0,2);
            $sid = substr($identity,2); // teacher_assigned_id               
            $sql = "SELECT * FROM `mid_supervisor` WHERE `st_te_assigned_id`='$sid'";                
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result)==1) {
                $row = mysqli_fetch_assoc($result);
                $p1=$row['par1'];
                $p2=$row['par2'];
                $p3=$row['par3'];
                $p4=$row['par4'];
                $p5=$row['par5'];
                $tot=$row['total'];
            }                
        }
    ?>
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="supervisor_markingLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="studentdetails.php?id=<?php echo $student_id; ?>" method="post">
                        <input class="hidden" name="supervisor_assigned_id" id="supervisor_assigned_id"
                            style="display:none;">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover supervisor-marks-table">
                                <colgroup>
                                    <col span="1" style="width: 10%;">
                                    <col span="1" style="width: 50%;">
                                    <col span="1" style="width: 15%;">
                                    <col span="1" style="width: 25%;">
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th scope="col">SN</th>
                                        <th scope="col">Marking Parameter</th>
                                        <th scope="col">Full Marks</th>
                                        <th scope="col">Obtained Marks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Regularity of works</td>
                                        <td>20</td>
                                        <td>
                                            <input class="form-control" name="regularity" id="regularity" type="number"
                                                value=<?php echo $p1;?>>
                                        </td>

                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>
                                            Degree of Completeness of thesis
                                        </td>
                                        <td>20</td>
                                        <td>
                                            <input class="form-control" name="completeness_degree"
                                                id="completeness_degree" type="number" value=<?php echo $p2;?>>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Understanding thesis work and related theory
                                        </td>
                                        <td>20</td>
                                        <td>
                                            <input class="form-control" name="understanding_thesis"
                                                id="understanding_thesis" type="number" value=<?php echo $p3;?>>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>Student effort and performance
                                        </td>
                                        <td>20</td>
                                        <td>
                                            <input class="form-control" name="effort" id="effort" type="number"
                                                value=<?php echo $p4;?>>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">5</th>
                                        <td>Organization of study</td>
                                        <td>20</td>
                                        <td>
                                            <input class="form-control" name="organization" id="organization"
                                                type="number" value=<?php echo $p5;?>>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                </div>
                <div class="modal-footer">
                    <table class="table table-striped table-hover supervisor-marks-table" style="width: 100%">
                        <colgroup>
                            <col span="1" style="width: 10%;">
                            <col span="1" style="width: 48%;">
                            <col span="1" style="width: 17%;">
                            <col span="1" style="width: 25%;">
                        </colgroup>
                        <thead>
                            <tr>
                                <th scope="row"></th>
                                <td>Total</td>
                                <td>100</td>
                                <td id="sup_disp_total">
                                    <?php echo $tot;?>
                                </td>
                            </tr>
                        </thead>
                    </table>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>