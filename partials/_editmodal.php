<!-- Edit Information Modal -->
<div class="modal fade" id="studentEditModal" aria-labelledby="studentEditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="studentEditModalLabel">Edit Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php $_SERVER['REQUEST_URI']; ?>" method="post">
                    <input class="hidden" name="snoEdit" id="snoEdit" style="display: none;">
                    <div class="row">
                        <div class="col-md-6 pt-4">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="fnameEdit" name="fnameEdit"
                                    placeholder="Firstname">
                                <label for="InputFirstname">Firstname</label>
                            </div>
                        </div>
                        <div class="col-md-6 pt-4">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="lnameEdit" name="lnameEdit"
                                    placeholder="Lastname">
                                <label for="InputLastname">Lastname</label>
                            </div>
                        </div>
                        <div class="col-md-6 pt-4">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="rollEdit" name="rollEdit"
                                    placeholder="Roll No">
                                <label for="InputRoll">Roll No</label>
                            </div>
                        </div>
                        <div class="col-md-6 pt-4">
                            <div class="form-floating mb-2">
                                <select name="genderEdit" class="form-select" aria-label="Default select example">
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
                                <select id="departmentEdit" name="departmentEdit" class="form-select"
                                    aria-label="Default select example">
                                    <option selected>Choose..</option>
                                    <?php
                                    $sql = "SELECT * FROM `department`";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $field = $row['dep_name'];
                                        echo '<option value="'. $field . '">'. $field .'</option>';   
                                    }
                                    ?>
                                </select>
                                <label for="department">Department</label>
                            </div>
                        </div>
                        <div class="col-md-6 pt-4">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="yearEdit" name="yearEdit"
                                    placeholder="Thesis">
                                <label for="InputRoll">Year</label>
                            </div>
                        </div>
                        <div class="col-md-6 pt-4">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="thesisEdit" name="thesisEdit"
                                    placeholder="Thesis">
                                <label for="InputRoll">Thesis Title</label>
                            </div>
                        </div>
                        <div class="col-md-6 pt-4">
                            <div class="form-floating mb-2">
                                <input type="date" class="form-control" id="regdateEdit" name="regdateEdit"
                                    placeholder="Registration Date">
                                <label for="InputDate">Registration Date</label>
                            </div>
                        </div>
                        <div class="col-md-12 py-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>