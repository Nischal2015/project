    <!-- This is the modal for final term -->
    <!-- Committee Modal -->
    <?php
$server="remotemysql.com";
$username="GfYJT7egTF";
$password="lW1UnyRWzL";
$database="GfYJT7egTF";

$server="localhost";
$username="root";
$password="";
$database="thes_db";

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {
	die("Error " . mysqli_connect_error());
}

?>
    <div class="modal fade" id="committee_marking" aria-labelledby="committee_markingLabel" aria-hidden="true">
        <?php
        // if (isset($_POST['teacherID'])) {
        //     $top = $_POST['teacherID'];
        // //     $clicked_teacher = $top;
        // //     echo "<script>console.log('ajax')</script>";
        // // }
        // // else{
        // //     echo "<script>console.log('shrestha')</script>";
        // // }
        // // //echo "The id is: " . $_POST['teacherID'];
        // $top = NULL;
        if( $_SERVER['REQUEST_METHOD']=='POST' && isset( $_POST['teacherID'] ) ){
            ob_clean();

            /* other code presumably to do something with POSTed data */

            /* send some sort of response */
            echo "<script>console.log('received')</script>";
            //echo $_POST['teacherID'];
            $clicked_teacher = $_POST['teacherID'];
            $top = $clicked_teacher;
            echo $top;

            exit();
        }
        $clicked_teacher = 5;
            $sql = "SELECT * FROM `final_committee` WHERE `st_te_assigned_id`='$clicked_teacher'";
            //echo "MIlan".$clicked_teacher;
            $result=mysqli_query($conn, $sql);
            
            $row=mysqli_fetch_assoc($result);
            //echo var_dump($row);
            $vr1 = NULL;
            $vr2 = NULL;
            $vr3 = NULL;
            $vr4 = NULL;
            $vr5 = NULL;
            $vr6 = NULL;
            $vr7 = NULL;
            $vr8 = NULL;
            $vr9 = NULL;
            $vr10 = NULL;
            $tt1 = NULL;
            if($row != NULL){
                $vr1 = $row['par1'] ?? "";
                $vr2 = $row['par2'] ?? "";
                $vr3 = $row['par3'] ?? "";
                $vr4 = $row['par4'] ?? "";
                $vr5 = $row['par5'] ?? "";
                $vr6 = $row['par6'] ?? "";
                $vr7 = $row['par7'] ?? "";
                $vr8 = $row['par8'] ?? "";
                $vr9 = $row['par9'] ?? "";
                $vr10 = $row['par10'] ?? "";
                $tt1 = $row['total'] ?? "";
            }

        ?>
        <div class="modal-dialog modal-dialog-scrollable modal-lg output">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="committee_markingLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="finalstudentdetails.php?id=<?php echo $student_id;?>" method="post">
                        <input class="comhidden" name="committee_assigned_id" id="committee_assigned_id">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover committee-marks-table" style="width: 100%";>
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
                                                name="quality_of_presentation" type="number" value= "<?php echo $vr1;?>" >
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Problem Formulation / identification / conceptualization</td>
                                        <td>10</td>
                                        <td>
                                            <input class="form-control" id="problem_identification"
                                                name="problem_identification" type="number" value= "<?php echo $vr2;?>" >
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Methodology/Approach</td>
                                        <td>10</td>
                                        <td>
                                            <input class="form-control" id="methodology" name="methodology"
                                                type="number" value= "<?php echo $vr3;?>" >
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>Literature review</td>
                                        <td>10</td>
                                        <td>
                                            <input class="form-control" id="literature_review" name="literature_review"
                                                type="number" value= "<?php echo $vr4;?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">5</th>
                                        <td>Understanding of thesis work and related theory</td>
                                        <td>10</td>
                                        <td>
                                            <input class="form-control" id="understanding" name="understanding"
                                                type="number" value= "<?php echo $vr5;?>" >
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">6</th>
                                        <td>Answering to questions</td>
                                        <td>10</td>
                                        <td>
                                            <input class="form-control" id="answers" name="answers" type="number" value= "<?php echo $vr6;?>" >
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">7</th>
                                        <td>Completeness of thesis work</td>
                                        <td>10</td>
                                        <td>
                                            <input class="form-control" id="completeness" name="completeness"
                                                type="number" value= "<?php echo $vr7;?>" >
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">8</th>
                                        <td>Planning of organization of thesis work</td>
                                        <td>10</td>
                                        <td>
                                            <input class="form-control" id="planning" name="planning" type="number" value= "<?php echo $vr8;?>" >
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">9</th>
                                        <td>Originality of research & Scholar's contribution</td>
                                        <td>10</td>
                                        <td>
                                            <input class="form-control" id="originality" name="originality"
                                                type="number" value= "<?php echo $vr9;?>" >
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">10</th>
                                        <td>Conclusion, Suggestions and Recommendation</td>
                                        <td>10</td>
                                        <td>
                                            <input class="form-control" id="consugrec" name="consugrec" type="number" value= "<?php echo $vr10;?>" >
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
                                <td id="com_disp_total"><?php echo $clicked_teacher?></td>
                            </tr>
                        </thead>
                    </table>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <!-- External Modal -->
    <div class="modal fade" id="external_marking" aria-labelledby="external_markingLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="external_markingLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="finalstudentdetails.php?id=<?php echo $student_id; ?>" method="post">
                        <input class="comhidden" name="external_assigned_id" id="external_assigned_id"
                            style="display:none;">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover external-marks-table" style="width: 100%" ;>
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
                                        <td>Standard of technical language, expression and format</td>
                                        <td>10</td>
                                        <td>
                                            <input class="form-control" id="standard" name="standard" type="number" value= "<?php echo $var1;?>" >
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Problem formulation, research identification and formulation of research
                                            topic</td>
                                        <td>10</td>
                                        <td>
                                            <input class="form-control" id="research_identification"
                                                name="research_identification" type="number" value= "<?php echo $var2;?>" >
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Selection of research methodology(research method and tools)</td>
                                        <td>10</td>
                                        <td>
                                            <input class="form-control" id="research_methodology"
                                                name="research_methodology" type="number" value= "<?php echo $var3;?>" >
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>Quality of data processing and result interpretation</td>
                                        <td>10</td>
                                        <td>
                                            <input class="form-control" id="data_processing" name="data_processing"
                                                type="number" value= "<?php echo $var4;?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">5</th>
                                        <td>Matching and finding with objectives</td>
                                        <td>10</td>
                                        <td>
                                            <input class="form-control" id="objectives" name="objectives" type="number" value= "<?php echo $var5;?>" >
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">6</th>
                                        <td>Logic reasoning, conclusions and interpretation</td>
                                        <td>10</td>
                                        <td>
                                            <input class="form-control" id="logic_reason" name="logic_reason"
                                                type="number" value= "<?php echo $var6;?>" >
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">7</th>
                                        <td>Quality of abstract</td>
                                        <td>10</td>
                                        <td>
                                            <input class="form-control" id="qua_abstract" name="qua_abstract"
                                                type="number" value= "<?php echo $var7;?>" >
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">8</th>
                                        <td>Originality of research</td>
                                        <td>10</td>
                                        <td>
                                            <input class="form-control" id="originality_research"
                                                name="originality_research" type="number" value= "<?php echo $var8;?>" >
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">9</th>
                                        <td>Scope of research</td>
                                        <td>10</td>
                                        <td>
                                            <input class="form-control" id="scope_research" name="scope_research"
                                                type="number" value= "<?php echo $var9;?>" >
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">10</th>
                                        <td>Answer to the examiner's question</td>
                                        <td>10</td>
                                        <td>
                                            <input class="form-control" id="ans_examiner" name="ans_examiner"
                                                type="number" value= "<?php echo $var10;?>" >
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                </div>
                <div class="modal-footer">
                    <table class="table table-striped table-hover external-marks-table" style="width: 100%" ;>
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
                                <td id="ext_disp_total"><?php echo $tot1;?></td>
                            </tr>
                        </thead>
                    </table>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!--Supervisor Modal -->
    <div class="modal fade" id="supervisor_marking" aria-labelledby="supervisor_markingLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="supervisor_markingLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="finalstudentdetails.php?id=<?php echo $student_id; ?>" method="post">
                        <input class="hidden" name="supervisor_assigned_id" id="supervisor_assigned_id"
                            style="display: none;">
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
                                            <input class="form-control" name="regularity" id="regularity"
                                                type="number" value= "<?php echo $v1;?>" />
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
                                                id="completeness_degree" type="number" value= "<?php echo $v2;?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Understanding thesis work and related theory
                                        </td>
                                        <td>20</td>
                                        <td>
                                            <input class="form-control" name="understanding_thesis"
                                                id="understanding_thesis" type="number" value= "<?php echo $v3;?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>Student effort and performance
                                        </td>
                                        <td>20</td>
                                        <td>
                                            <input class="form-control" name="effort" id="effort" type="number" value= "<?php echo $v4;?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">5</th>
                                        <td>Organization of study</td>
                                        <td>20</td>
                                        <td>
                                            <input class="form-control" name="organization" id="organization"
                                                type="number" value= "<?php echo $v5;?>" />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                </div>
                <div class="modal-footer">
                    <table class="table table-striped table-hover supervisor-marks-table">
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
                </form>
            </div>
        </div>
    </div>