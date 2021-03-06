<div class="fade modal" aria-hidden="true" aria-labelledby="studentEditModalLabel" id="studentEditModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="studentEditModalLabel">Edit Information</h5><button class="btn-close"
                    type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="allstudents.php" method="post"><input class="hidden" id="snoEdit" name="snoEdit"
                        style="display:none">
                    <div class="row">
                        <div class="col-md-6 pt-4">
                            <div class="form-floating mb-2"><input class="form-control" id="fnameEdit" name="fnameEdit"
                                    placeholder="Firstname" required> <label for="fnameEdit">Firstname</label></div>
                        </div>
                        <div class="col-md-6 pt-4">
                            <div class="form-floating mb-2"><input class="form-control" id="lnameEdit" name="lnameEdit"
                                    placeholder="Lastname" required> <label for="lnameEdit">Lastname</label></div>
                        </div>
                        <div class="col-md-6 pt-4">
                            <div class="form-floating mb-2"><input class="form-control" id="rollEdit" name="rollEdit"
                                    placeholder="Roll No" required> <label for="rollEdit">Roll No</label></div>
                        </div>
                        <div class="col-md-6 pt-4">
                            <div class="form-floating mb-2"><select aria-label="Default select example"
                                    class="form-select" name="genderEdit">
                                    <option selected>Choose..</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Prefer not to answer">Prefer not to answer</option>
                                </select> <label for="Gender">Gender</label></div>
                        </div>
                        <div class="col-md-6 pt-4">
                            <div class="form-floating mb-2"><select aria-label="Default select example"
                                    class="form-select" name="departmentEdit" id="departmentEdit" required>
                                    <option selected>Choose..</option>
                                    <?php $sql="SELECT * FROM `department`";$result=mysqli_query($conn,$sql);while($row=mysqli_fetch_assoc($result)){$field=e($row['dep_name']);echo '<option value="'.$field.'">'.$field.'</option>';} ?>
                                </select> <label for="departmentEdit">Department</label></div>
                        </div>
                        <div class="col-md-6 pt-4">
                            <div class="form-floating mb-2"><input class="form-control" id="yearEdit" name="yearEdit"
                                    placeholder="Thesis" required> <label for="InputRoll">Year</label></div>
                        </div>
                        <div class="col-md-6 pt-4">
                            <div class="form-floating mb-2"><input class="form-control" id="thesisEdit"
                                    name="thesisEdit" placeholder="Thesis" required> <label for="InputRoll">Thesis Title</label>
                            </div>
                        </div>
                        <div class="col-md-6 pt-4">
                            <div class="form-floating mb-2"><input class="form-control" id="regdateEdit"
                                    name="regdateEdit" placeholder="Registration Date" type="date" required> <label
                                    for="InputDate">Registration Date</label></div>
                        </div>
                        <div class="col-md-12 py-3"><button class="btn btn-primary" type="submit">Update</button></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer"><button class="btn btn-secondary" type="button"
                    data-bs-dismiss="modal">Close</button></div>
        </div>
    </div>
</div>