    <!-- Committee Modal -->
    <div class="modal fade" id="committee_marking" aria-labelledby="committee_markingLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="committee_markingLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
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
                                            name="quality_of_presentation" type="number" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>
                                        Problem Formulation / identification / conceptualization
                                    </td>
                                    <td>20</td>
                                    <td>
                                        <input class="form-control" id="problem_identification"
                                            name="problem_identification" type="number" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Methodology/Approach</td>
                                    <td>10</td>
                                    <td>
                                        <input class="form-control" id="methodology" name="methodology" type="number" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Literature review</td>
                                    <td>10</td>
                                    <td>
                                        <input class="form-control" id="literature_review" name="literature_review"
                                            type="number" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>Understanding of thesis work and related theory</td>
                                    <td>10</td>
                                    <td>
                                        <input class="form-control" id="understanding" name="understanding"
                                            type="number" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td>Answering to questions</td>
                                    <td>10</td>
                                    <td>
                                        <input class="form-control" id="answers" name="answers" type="number" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">7</th>
                                    <td>
                                        Completeness of thesis work Planning of organization of
                                        thesis work
                                    </td>
                                    <td>20</td>
                                    <td>
                                        <input class="form-control" id="completeness" name="completeness" type="number" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">8</th>
                                    <td>Planning of organization of thesis work</td>
                                    <td>10</td>
                                    <td>
                                        <input class="form-control" id="planning" name="planning" type="number" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"></th>
                                    <td>Total</td>
                                    <td>100</td>
                                    <td>
                                        disp_total
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!--Supervisor Modal -->
    <div class="modal fade" id="supervisor_marking" aria-labelledby="supervisor_markingLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="supervisor_markingLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
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
                                    <input class="form-control" id="regularity" type="number" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>
                                    Degree of Completeness of thesis
                                </td>
                                <td>20</td>
                                <td>
                                    <input class="form-control" id="completeness_degree" type="number" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Understanding thesis work and related theory
                                </td>
                                <td>20</td>
                                <td>
                                    <input class="form-control" id="understanding_thesis" type="number" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>Student effort and performance
                                </td>
                                <td>20</td>
                                <td>
                                    <input class="form-control" id="effort" type="number" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>Organization of study</td>
                                <td>20</td>
                                <td>
                                    <input class="form-control" id="organization" type="number" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td>Total</td>
                                <td>100</td>
                                <td>
                                    disp_total
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>