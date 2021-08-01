<!-- Information Modal -->
<div class="modal fade" id="studentEditModal" aria-labelledby="studentEditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="studentEditModalLabel">Edit Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php $_SERVER['REQUEST_URI']; ?>" method="post">
                    <div class="row">
                        <div class="col-md-6 pt-4">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="fnameEdit" name="fnameEdit" placeholder="Firstname">
                                <label for="fnameEdit">Firstname</label>
                            </div>
                        </div>
                        <div class="col-md-6 pt-4">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="lnameEdit" name="lnameEdit" placeholder="Lastname">
                                <label for="lnameEdit">Lastname</label>
                            </div>
                        </div>
                        <div class="col-md-6 pt-4">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="rollEdit" name="rollEdit" placeholder="Roll No">
                                <label for="rollEdit">Roll No</label>
                            </div>
                        </div>
                        <div class="col-md-6 pt-4">
                            <div class="form-floating mb-2">
                                <input type="email" class="form-control" id="emailidEdit" name="emailidEdit"
                                    placeholder="Email">
                                <label for="emailidEdit">Email</label>
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
                                <label for="genderEdit">Gender</label>
                            </div>
                        </div>
                        <div class="col-md-6 pt-4">
                            <div class="form-floating mb-2">
                                <input type="date" class="form-control" id="regdateEdit" name="regdateEdit"
                                    placeholder="Registration Date">
                                <label for="regdateEdit">Registration Date</label>
                            </div>
                        </div>
                        <div class="col-md-12 py-3">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="thesisEdit" name="thesisEdit" placeholder="Thesis">
                                <label for="thesisEdit">Thesis Title</label>
                            </div>
                        </div>
                        <div class="col-md-12 py-3">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
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