<!-- register -->
<form action="<?php $_SERVER['REQUEST_URI']; ?>" method="post">
    <div class="row">
        <div class="col-md-6 pt-4">
            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="fname" name="fname" placeholder="Firstname">
                <label for="InputFirstname">Firstname</label>
            </div>
        </div>
        <div class="col-md-6 pt-4">
            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="lname" name="lname" placeholder="Lastname">
                <label for="InputLastname">Lastname</label>
            </div>
        </div>
        <div class="col-md-6 pt-4">
            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="roll" name="roll" placeholder="Roll No">
                <label for="InputRoll">Roll No</label>
            </div>
        </div>
        <div class="col-md-6 pt-4">
            <div class="form-floating mb-2">
                <select name="gender" class="form-select" aria-label="Default select example">
                    <option selected>Choose..</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Prefer not to answer">Prefer not to answer</option>
                </select>
                <label for="Gender">Gender</label>
            </div>
        </div>
        <div class="col-md-6 pt-4">
            <div class="form-floating mb-2">
                <select name="department" class="form-select" aria-label="Default select example">
                    <option selected>Choose..</option>
                    <?php
                    $sql = "SELECT * FROM `department`";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $field = $row['dep_name'];
                        echo '<option value="'. $field .'">'. $field .'</option>';   
                    }
                    ?>                 
                </select>
                <label for="department">Department</label>
            </div>
        </div>
<<<<<<< HEAD
        <div class="col-md-6 py-3">
=======
        <div class="col-md-6 pt-4">
>>>>>>> update2
            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="year" name="year" placeholder="Thesis">
                <label for="InputRoll">Year</label>
            </div>
        </div>
<<<<<<< HEAD
        <div class="col-md-6 py-3">
=======
        <div class="col-md-6 pt-4">
>>>>>>> update2
            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="thesis" name="thesis" placeholder="Thesis">
                <label for="InputRoll">Thesis Title</label>
            </div>
        </div>
        <div class="col-md-6 pt-4">
            <div class="form-floating mb-2">
                <input type="date" class="form-control" id="regdate" name="regdate" placeholder="Registration Date">
                <label for="InputDate">Registration Date</label>
            </div>
        </div>
        <div class="col-md-12 py-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>