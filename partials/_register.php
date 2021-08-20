<form action="<?php $_SERVER['REQUEST_URI']; ?>" method="post">
    <div class="row">
        <div class="col-md-6 pt-4">
            <div class="form-floating mb-2"><input class="form-control" id="fname" name="fname" placeholder="Firstname" autocomplete="off" required>
                <label for="InputFirstname">Firstname</label></div>
        </div>
        <div class="col-md-6 pt-4">
            <div class="form-floating mb-2"><input class="form-control" id="lname" name="lname" placeholder="Lastname" autocomplete="off" required>
                <label for="InputLastname">Lastname</label></div>
        </div>
        <div class="col-md-6 pt-4">
            <div class="form-floating mb-2"><input class="form-control" id="roll" name="roll" placeholder="Roll No" autocomplete="off" required>
                <label for="InputRoll">Roll No</label></div>
        </div>
        <div class="col-md-6 pt-4">
            <div class="form-floating mb-2"><select aria-label="Default select example" class="form-select"
                    name="gender">
                    <option selected>Choose..</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Prefer not to answer">Prefer not to answer</option>
                </select> <label for="gender">Gender</label></div>
        </div>
        <div class="col-md-6 pt-4">
            <div class="form-floating mb-2"><select aria-label="Default select example" class="form-select"
                    name="department" id="departmentadd" required>
                    <option selected>Choose..</option>
                    <?php $sql="SELECT * FROM `department`";$result=mysqli_query($conn,$sql);while($row=mysqli_fetch_assoc($result)){$field=e($row['dep_name']);echo '<option value="'.$field.'">'.$field.'</option>';} ?>
                </select> <label for="departmentadd">Department</label></div>
        </div>
        <div class="col-md-6 pt-4">
            <div class="form-floating mb-2"><input class="form-control" id="year" name="year" placeholder="Thesis" autocomplete="off" required>
                <label for="year">Year</label></div>
        </div>
        <div class="col-md-6 pt-4">
            <div class="form-floating mb-2"><input class="form-control" id="thesis" name="thesis" placeholder="Thesis" autocomplete="off" required>
                <label for="thesis">Thesis Title</label></div>
        </div>
        <div class="col-md-6 pt-4">
            <div class="form-floating mb-2"><input class="form-control" id="regdate" name="regdate"
                    placeholder="Registration Date" type="date" autocomplete="off" required> <label for="regdate">Registration Date</label></div>
        </div>
        <div class="col-md-12 py-3"><button class="btn btn-primary" type="submit">Submit</button></div>
    </div>
</form>