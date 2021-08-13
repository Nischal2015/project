<?php $delete=false;session_start();if(!isset($_SESSION['loggedin'])||$_SESSION['loggedin']!=true){header("location: /");exit;} ?>
<!doctypehtml>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width,initial-scale=1" name="viewport">
        <meta content="Displays the student detail of mid term thesis defense" name="description">
        <script crossorigin="anonymous" src="https://kit.fontawesome.com/0212f0c4e4.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            crossorigin="anonymous" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC">
        <title>Details</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="styles/style.css" rel="stylesheet">
    </head>

    <body>
        <header><?php include 'partials/_nav2.php'; ?>
            <?php include 'partials/_dbconnect.php'; ?>
        </header>
        <aside>
            <?php include 'partials/_sidebar.php'; ?>
        </aside>
        <?php require 'partials/_function.php';?>
            <main class="mt-1 p-2" style="min-height:800px">
            <?php $student_id=$_GET['id'];
            function marks_calc_com($sql,$conn,$student_id)
            {
                $portion_avg="SELECT AVG(total) FROM mid_committee WHERE st_te_assigned_id IN ( SELECT assigned_id FROM mid_committee_assigned WHERE assigned_s_id = '$student_id')";
                mysqli_query($conn,$sql);
                $result_avg=mysqli_query($conn,$portion_avg);
                $row_avg=mysqli_fetch_assoc($result_avg);
                $portion=$row_avg['AVG(total)']/100*10;
                $marks_portion="UPDATE `total_marks` SET `tm_mid_com` = '$portion'  WHERE `tm_student_id` = '$student_id'";
                mysqli_query($conn,$marks_portion);
            }
            function marks_calc_ext($sql,$conn,$student_id,$portion)
            {
                $marks_portion="UPDATE `total_marks` SET `tm_mid_ext` = '$portion'  WHERE `tm_student_id` = '$student_id'";
                mysqli_query($conn,$sql);
                mysqli_query($conn,$marks_portion);
            }
        if(isset($_GET['sdelete'])){
            $assigned_id_1=e($_GET['sdelete']);
            $sql="DELETE FROM `mid_supervisor_assigned` WHERE `assigned_id` = '$assigned_id_1'";
            $sql1="UPDATE `total_marks` SET `tm_mid_sup` = '0'  WHERE `tm_student_id` = '$student_id'";
            mysqli_query($conn,$sql);
            mysqli_query($conn,$sql1);
            $delete=true;
        }
        elseif(isset($_GET['edelete'])){
            $assigned_id_1=e($_GET['edelete']);
            $sql="DELETE FROM `mid_external_assigned` WHERE `assigned_id` = '$assigned_id_1'";
            $sql1="UPDATE `total_marks` SET `tm_mid_ext` = '0'  WHERE `tm_student_id` = '$student_id'";
            mysqli_query($conn,$sql);
            mysqli_query($conn,$sql1);
            $delete=true;
        }
        elseif(isset($_GET['cdelete'])){
            $assigned_id_1=e($_GET['cdelete']);
            $sql="DELETE FROM `mid_committee_assigned` WHERE `assigned_id` = '$assigned_id_1'";
            mysqli_query($conn,$sql);
            $portion_avg="SELECT AVG(total) FROM mid_committee WHERE st_te_assigned_id IN ( SELECT assigned_id FROM mid_committee_assigned WHERE assigned_s_id = '$student_id')";
            $result_avg=mysqli_query($conn,$portion_avg);
            $row_avg=mysqli_fetch_assoc($result_avg);
            $portion=$row_avg['AVG(total)']/100*10;
            $marks_portion="UPDATE `total_marks` SET `tm_mid_com` = '$portion'  WHERE `tm_student_id` = '$student_id'";
            mysqli_query($conn,$marks_portion);
            $delete=true;
        }
        if($_SERVER['REQUEST_METHOD']=='POST'){
            if(!empty($_POST['committee'])){
                foreach($_POST['committee']as $selected)
                {
                    $sql="INSERT INTO `mid_committee_assigned` (`assigned_s_id`, `assigned_teacher_id`) SELECT student_id, (SELECT teacher_id FROM teacher WHERE teacher_id = '$selected') FROM students WHERE student_id='$student_id'";
                    mysqli_query($conn,$sql);
                }
            }
            if(isset($_POST['supervisor']))
            {
                $supervisor_id=$_POST['supervisor'];
                $sql="INSERT INTO `mid_supervisor_assigned` (`assigned_s_id`, `assigned_teacher_id`) SELECT student_id, (SELECT teacher_id FROM teacher WHERE teacher_id = '$supervisor_id') FROM students WHERE student_id='$student_id'";
                mysqli_query($conn,$sql);
            }
            if(isset($_POST['external']))
            {
                $external_id=$_POST['external'];
                    $sql="INSERT INTO `mid_external_assigned` (`assigned_s_id`, `assigned_ext_id`) SELECT student_id, (SELECT external_id FROM ext_teacher WHERE external_id = '$external_id') FROM students WHERE student_id='$student_id'";
                mysqli_query($conn,$sql);
            }
            if(isset($_POST['supervisor_assigned_id']))
            {
                $identity=$_POST['supervisor_assigned_id'];
                $action=substr($identity,0,2);
                $sno=substr($identity,2);
                $par1=mysqli_real_escape_string($conn,$_POST['regularity']);
                $par2=mysqli_real_escape_string($conn,$_POST['completeness_degree']);
                $par3=mysqli_real_escape_string($conn,$_POST['understanding_thesis']);
                $par4=mysqli_real_escape_string($conn,$_POST['effort']);
                $par5=mysqli_real_escape_string($conn,$_POST['organization']);
                $sum=$par1+$par2+$par3+$par4+$par5;
                $portion=$sum/100*20;
                if($action=="sa"){$sql="INSERT INTO `mid_supervisor` (`st_te_assigned_id`, `par1`, `par2`, `par3`, `par4`, `par5`, `total`) VALUES ('$sno', '$par1', '$par2', '$par3', '$par4', '$par5', '$sum')";
        }elseif($action=="se"){$sql="UPDATE `mid_supervisor` SET `par1` = '$par1', `par2` = '$par2', `par3` = '$par3', `par4` = '$par4', `par5` = '$par5', `total` = '$sum' WHERE `st_te_assigned_id` = '$sno'";
        }$marks_portion="UPDATE `total_marks` SET `tm_mid_sup` = '$portion'  WHERE `tm_student_id` = '$student_id'";
            mysqli_query($conn,$sql);
            mysqli_query($conn,$marks_portion);
        }if(isset($_POST['assigned_id'])){$identity=$_POST['assigned_id'];
                $action=substr($identity,0,2);
                $sno=substr($identity,2);
                $par1=mysqli_real_escape_string($conn,$_POST['quality_of_presentation']);
                $par2=mysqli_real_escape_string($conn,$_POST['problem_identification']);
                $par3=mysqli_real_escape_string($conn,$_POST['methodology']);
                $par4=mysqli_real_escape_string($conn,$_POST['literature_review']);
                $par5=mysqli_real_escape_string($conn,$_POST['understanding']);
                $par6=mysqli_real_escape_string($conn,$_POST['answers']);
                $par7=mysqli_real_escape_string($conn,$_POST['completeness']);
                $par8=mysqli_real_escape_string($conn,$_POST['planning']);
                $sum=$par1+$par2+$par3+$par4+$par5+$par6+$par7+$par8;
                $portion=$sum/100*10;
                if($action=="ea"){$sql="INSERT INTO `mid_external` (`st_te_assigned_id`, `par1`, `par2`, `par3`, `par4`, `par5`, `par6`, `par7`, `par8`, `total`) VALUES ('$sno', '$par1', '$par2', '$par3', '$par4', '$par5', '$par6', '$par7', '$par8', '$sum')";
            marks_calc_ext($sql,$conn,$student_id,$portion);
        }elseif($action=="ee"){$sql="UPDATE `mid_external` SET `par1` = '$par1', `par2` = '$par2', `par3` = '$par3', `par4` = '$par4', `par5` = '$par5', `par6` = '$par6', `par7` = '$par7', `par8` = '$par8', `total` = '$sum' WHERE `st_te_assigned_id` = '$sno'";
            marks_calc_ext($sql,$conn,$student_id,$portion);
        }elseif($action=="ca"){$sql="INSERT INTO `mid_committee` (`st_te_assigned_id`, `par1`, `par2`, `par3`, `par4`, `par5`, `par6`, `par7`, `par8`, `total`) VALUES ('$sno', '$par1', '$par2', '$par3', '$par4', '$par5', '$par6', '$par7', '$par8', '$sum')";
            marks_calc_com($sql,$conn,$student_id);
        }elseif($action=="ce"){$sql="UPDATE `mid_committee` SET `par1` = '$par1', `par2` = '$par2', `par3` = '$par3', `par4` = '$par4', `par5` = '$par5', `par6` = '$par6', `par7` = '$par7', `par8` = '$par8', `total` = '$sum' WHERE `st_te_assigned_id` = '$sno'";
            marks_calc_com($sql,$conn,$student_id);
        }}} ?>
            <div class="container-fluid page-header"><?php if($delete){echo '            
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> You have unassigned the teacher successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
</div>';} ?>
                <div class="row">
                    <div class="col-md-6 py-3">
                        <h4 class="text-muted fw-bold">Student Details</h4>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end text-muted">
                        <nav aria-label="breadcrumb"
                            style="--bs-breadcrumb-divider:url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;)">
                            <ol class="p-2 bg-light breadcrumb px-3 rounded-pill">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item">Students</li>
                                <li class="breadcrumb-item"><a href="allstudents.php">All Students</a></li>
                                <li class="breadcrumb-item">Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12"><?php include 'partials/_studentinfo.php'; ?></div>
                </div>
                <form action="studentdetails.php?id=<?php echo $student_id; ?>" method="post">
                    <div class="mb-4 row">
                        <div class="text-muted d-flex justify-content-end col-md-7">
                            <div class="btn-group" aria-label="Basic example" role="group">
                                <a href="studentdetails.php?id=<?php echo $student_id; ?>" class="btn btn-primary"
                                    role="button" active>MidTerm</a>
                                <a href="finalstudentdetails.php?id=<?php echo $student_id; ?>"
                                    class="border border-1 btn border-primary btn-outline-primary"
                                    role="button">FinalTerm</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-4 col-md-3">
                            <div class="input-group mb-3"><select aria-label="Default select example"
                                    class="border border-1 border-secondary form-select" name="supervisor">
                                    <option disabled selected value="">Select supervisor</option><?php $sql="SELECT * from `teacher`";$result=mysqli_query($conn,$sql);while($row=mysqli_fetch_assoc($result)){$teacher=$row['teacher_post'].' '.$row['teacher_fname'].' '.$row['teacher_mname'].' '.e($row['teacher_lname']);echo '
<option value="'.e($row['teacher_id']).'">'.e($teacher).'</option>';} ?>
                                </select></div>
                        </div>
                        <div class="mb-4 col-md-4">
                            <div class="dropdown">
                                <div class="btn-group" style="width:100%"><button
                                        class="border border-1 border-secondary btn dropdown-toggle"
                                        aria-expanded="false" data-bs-auto-close="outside" data-bs-toggle="dropdown"
                                        id="dropdownMenuClickableInside" style="background-color:#fff!important">Select
                                        committee members</button>
                                    <ul aria-labelledby="dropdownMenuClickableInside" class="dropdown-menu"><?php $sql="SELECT * FROM `teacher`";$result=mysqli_query($conn,$sql);while($row=mysqli_fetch_assoc($result)){$id=e($row['teacher_id']);$post=e($row['teacher_post']);$fname=e($row['teacher_fname']);$mname=e($row['teacher_mname']);$lname=e($row['teacher_lname']);echo '
    <li class="dropdown-item">
    <div class="col">
    <input type="checkbox" name="committee[]" id=c'.$id.' value='.$id.'>
    <label for=c'.$id.'>'.$post.' '.$fname.' '.$mname.' '.$lname.'</label>
    </div>
    </li>';} ?></ul>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4 col-md-3">
                            <div class="input-group mb-3"><select aria-label="Default select example"
                                    class="border border-1 border-secondary form-select" name="external">
                                    <option disabled selected value="">Select external</option><?php $sql="SELECT * from `ext_teacher`";$result=mysqli_query($conn,$sql);while($row=mysqli_fetch_assoc($result)){$external=$row['external_post'].' '.$row['external_fname'].' '.$row['external_mname'].' '.$row['external_lname'];echo '
<option value="'.e($row['external_id']).'">'.e($external).'</option>';} ?>
                                </select></div>
                        </div>
                        <div class="col-md-2"><button class="btn btn-primary" type="submit">Add</button></div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-4 card mt-1">
                            <div class="card-header"><strong>Supervisor</strong></div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped" id="student-marks"
                                        style="width:100%">
                                        <colgroup>
                                            <col span="1" style="width:4%">
                                            <col span="1" style="width:60%">
                                            <col span="1" style="width:26%">
                                            <col span="1" style="width:10%">
                                        </colgroup>
                                        <thead>
                                            <tr>
                                                <th>S.N.</th>
                                                <th>Supervisor</th>
                                                <th>Actions</th>
                                                <th>Marks</th>
                                            </tr>
                                        </thead>
                                        <tbody><?php $student_id=e($_GET['id']);$sql="SELECT ta.assigned_id, t.teacher_id, t.teacher_post, t.teacher_fname, t.teacher_mname, t.teacher_lname
FROM teacher t
INNER JOIN mid_supervisor_assigned ta
ON t.teacher_id = ta.assigned_teacher_id
WHERE ta.assigned_s_id = '$student_id'";$result=mysqli_query($conn,$sql);$sno=1;while($row=mysqli_fetch_assoc($result)){$assigned_id=e($row['assigned_id']);$sql1="SELECT `total` FROM `mid_supervisor` WHERE `st_te_assigned_id`='$assigned_id'";$result1=mysqli_query($conn,$sql1);$row1=mysqli_fetch_assoc($result1);echo'
<tr>
    <td>'.$sno.'</td>
    <td>'.e($row['teacher_post']).' '.e($row['teacher_fname']).' '.e($row['teacher_mname']).' '.e($row['teacher_lname']).'</td>
    <td>';if(mysqli_num_rows($result1)>0){echo '
        <button type="button" id=se'.$assigned_id.' class="btn btn-secondary btn-sm supaddEd" data-bs-toggle="modal" data-bs-target="#supervisor_marking"><i class="fa fa-pencil fa-xs"></i></button>
        <button type="button" id=sd'.$assigned_id.' class="delete btn btn-danger btn-sm"><i class="fa fa-trash-o fa-xs"></i></button>
        </td>
        <td><strong>'.e($row1['total']).'</strong></td>';}else{echo '
        <button type="button" id=sa'.$assigned_id.' class="btn btn-primary btn-sm supaddEd" data-bs-toggle="modal" data-bs-target="#supervisor_marking"><i class="fa fa-plus fa-xs"></i></button>
        <button type="button" id=sd'.$assigned_id.' class="delete btn btn-danger btn-sm"><i class="fa fa-trash-o fa-xs"></i></button>
    </td>
    <td>---</td>';}echo '</tr>
    ';$sno+=1;} ?></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4 card mt-1">
                            <div class="card-header"><strong>External</strong></div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped" id="student-marks"
                                        style="width:100%">
                                        <colgroup>
                                            <col span="1" style="width:4%">
                                            <col span="1" style="width:60%">
                                            <col span="1" style="width:26%">
                                            <col span="1" style="width:10%">
                                        </colgroup>
                                        <thead>
                                            <tr>
                                                <th>S.N.</th>
                                                <th>External</th>
                                                <th>Actions</th>
                                                <th>Marks</th>
                                            </tr>
                                        </thead>
                                        <tbody><?php $student_id=$_GET['id'];$sql="SELECT ta.assigned_id, t.external_id, t.external_post, t.external_fname, t.external_mname, t.external_lname
FROM ext_teacher t
INNER JOIN mid_external_assigned ta
ON t.external_id = ta.assigned_ext_id
WHERE ta.assigned_s_id = '$student_id'";$result=mysqli_query($conn,$sql);$sno=1;while($row=mysqli_fetch_assoc($result)){$assigned_id=e($row['assigned_id']);$sql2="SELECT `total` FROM `mid_external` WHERE `st_te_assigned_id`='$assigned_id'";$result2=mysqli_query($conn,$sql2);$row2=mysqli_fetch_assoc($result2);echo'
    <tr>
        <td>'.$sno.'</td>
        <td>'.e($row['external_post']).' '.e($row['external_fname']).' '.e($row['external_mname']).' '.e($row['external_lname']).'</td>
        <td>';if(mysqli_num_rows($result2)>0){echo '
            <button type="button" id=ee'.$assigned_id.' class="btn btn-secondary btn-sm addEd" data-bs-toggle="modal" data-bs-target="#committee_marking"><i class="fa fa-pencil fa-xs"></i></button>
            <button type="button" id=ed'.$assigned_id.' class="delete btn btn-danger btn-sm"><i class="fa fa-trash-o fa-xs"></i></button>
        </td>
        <td><strong>'.e($row2['total']).'</strong></td>';}else{echo '
            <button type="button" id=ea'.$assigned_id.' class="btn btn-primary btn-sm addEd" data-bs-toggle="modal" data-bs-target="#committee_marking"><i class="fa fa-plus fa-xs"></i></button>
            <button type="button" id=ed'.$assigned_id.' class="delete btn btn-danger btn-sm"><i class="fa fa-trash-o fa-xs"></i></button>
        </td>
        <td>---</td>';}echo '</tr>
    ';$sno+=1;} ?></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-4 card mt-1">
                            <div class="card-header"><strong>Committee</strong></div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped" id="student-marks"
                                        style="width:100%">
                                        <colgroup>
                                            <col span="1" style="width:4%">
                                            <col span="1" style="width:60%">
                                            <col span="1" style="width:26%">
                                            <col span="1" style="width:10%">
                                        </colgroup>
                                        <thead>
                                            <tr>
                                                <th>S.N.</th>
                                                <th>Committee Member</th>
                                                <th>Actions</th>
                                                <th>Marks</th>
                                            </tr>
                                        </thead>
                                        <tbody><?php $student_id=$_GET['id'];$sql="SELECT ta.assigned_id, t.teacher_id, t.teacher_post, t.teacher_fname, t.teacher_mname, t.teacher_lname
FROM teacher t
INNER JOIN mid_committee_assigned ta
ON t.teacher_id = ta.assigned_teacher_id
WHERE ta.assigned_s_id = '$student_id'";$result=mysqli_query($conn,$sql);$sno=1;while($row=mysqli_fetch_assoc($result)){$assigned_id=e($row['assigned_id']);$sql1="SELECT `total` FROM `mid_committee` WHERE `st_te_assigned_id`='$assigned_id'";$result1=mysqli_query($conn,$sql1);$row1=mysqli_fetch_assoc($result1);echo'
    <tr>
        <td>'.$sno.'</td>
        <td>'.e($row['teacher_post']).' '.e($row['teacher_fname']).' '.e($row['teacher_mname']).' '.e($row['teacher_lname']).'</td>
        <td>';if(mysqli_num_rows($result1)>0){echo '<button type="button" id=ce'.$assigned_id.' class="btn btn-secondary btn-sm addEd" data-bs-toggle="modal" data-bs-target="#committee_marking"><i class="fa fa-pencil fa-xs"></i></button>
            <button type="button" id=cd'.$assigned_id.' class="delete btn btn-danger btn-sm"><i class="fa fa-trash-o fa-xs"></i></button>
        </td>
        <td><strong>'.e($row1['total']).'</strong></td>';}else{echo '<button type="button" id=ca'.$assigned_id.' class="btn btn-primary btn-sm addEd" data-bs-toggle="modal" data-bs-target="#committee_marking"><i class="fa fa-plus fa-xs"></i></button>
            <button type="button" id=cd'.$assigned_id.' class="delete btn btn-danger btn-sm"><i class="fa fa-trash-o fa-xs"></i></button>
        </td>
        <td>---</td>';}echo '</tr>
    ';$sno+=1;} ?></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer><?php include 'partials/_footer.php'; ?></footer><?php include 'partials/_marks_modal.php'; ?><script
            crossorigin="anonymous" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"></script>
        <script>
        function convNum(e) {
            return e = e || 0
        }

        function tot_marks(e, t) {
            input = Array.from(document.querySelectorAll("#" + e + " input")), fil_input = input.slice(1, input.length),
                fil_input.forEach(e => {
                    e.addEventListener("input", e => {
                        sum = 0;
                        for (let e = 0; e < input.length; e++) sum += convNum(parseInt(input[e].value));
                        document.getElementById(t).innerText = sum
                    })
                })
        }
        addEdits = document.getElementsByClassName("addEd"), Array.from(addEdits).forEach(e => {
            e.addEventListener("click", e => {
                supervisor_assigned_id.value = null, assigned_id.value = null, tr = e.currentTarget
                    .parentNode.parentNode, name = tr.getElementsByTagName("td")[1].innerText, document
                    .getElementById("committee_markingLabel").innerText = name, element_id = e
                    .currentTarget.id, assigned_id.value = element_id, tot_marks("committee_marking",
                        "disp_total")
            })
        }), supaddEdits = document.getElementsByClassName("supaddEd"), Array.from(supaddEdits).forEach(e => {
            e.addEventListener("click", e => {
                document.querySelectorAll(".comhidden")[0].setAttribute("name", "assigned_id"),
                    supervisor_assigned_id.value = null, assigned_id.value = null, tr = e.currentTarget
                    .parentNode.parentNode, name = tr.getElementsByTagName("td")[1].innerText, document
                    .getElementById("supervisor_markingLabel").innerText = name, element_id = e
                    .currentTarget.id, supervisor_assigned_id.value = element_id, tot_marks(
                        "supervisor_marking", "sup_disp_total")
            })
        }), deletes = document.getElementsByClassName("delete"), Array.from(deletes).forEach(e => {
            e.addEventListener("click", e => {
                action = e.currentTarget.id.substr(0, 2), element_id = e.currentTarget.id.substr(2),
                    console.log(window.location.search.split("&")[0]), console.log(element_id), "sd" ==
                    action ? confirm("Are you sure you want to delete the record?") && (window
                        .location =
                        `./studentdetails.php${window.location.search.split("&")[0]}&sdelete=${element_id}`
                    ) : "ed" === action ? confirm("Are you sure you want to delete the record?") &&
                    (window.location =
                        `./studentdetails.php${window.location.search.split("&")[0]}&edelete=${element_id}`
                    ) : "cd" === action && confirm("Are you sure you want to delete the record?") &&
                    (window.location =
                        `./studentdetails.php${window.location.search.split("&")[0]}&cdelete=${element_id}`
                    )
            })
        });
        </script>
    </body>

    </html>