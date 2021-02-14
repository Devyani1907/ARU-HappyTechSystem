<?php
  include_once('header.php');
?>
<div class="content-wrapper">

<div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Feedback Form</h3>
                </div>
              <div class="card-body">
                <form>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Candidate Name</label>
                        <input type="text" class="form-control" value="Devyani Pandey" >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Candidate Email</label>
                        <input type="text" class="form-control" value="abc@gmail.com" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Job Designation</label>
                        <input type="text" class="form-control" value="Senior Software Developer" >
                      </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Applied Date</label>
                            <input type="text" class="form-control" value="02-02-2021" >
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">View Candidate CV</button>
                        </div>
                    </div>
                  </div>
                  
                  <hr/>
                <!-- BODY CONTENT -->
                <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Candidate Status</h3>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Candidate Selected/Not Selected</label>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="radio1">
                          <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="radio1">
                          <label class="form-check-label">No</label>
                        </div>
                    </div>
                    <hr/>
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Please find reasons below....</h3>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Education/Training</label>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="radio1">
                          <label class="form-check-label">N/A</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="radio1">
                          <label class="form-check-label">1</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="radio1">
                          <label class="form-check-label">2</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="radio1">
                          <label class="form-check-label">3</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="radio1">
                          <label class="form-check-label">4</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="radio1">
                          <label class="form-check-label">5</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Comments on above remark</label>
                        <textarea class="form-control" rows="3" placeholder=""></textarea><br/>
                            <button type="submit" class="btn btn-info">Select Comment</button>
                    </div>
                    <div class="form-group">
                        <label>Work Experience</label>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="radio1">
                          <label class="form-check-label">N/A</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="radio1">
                          <label class="form-check-label">1</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="radio1">
                          <label class="form-check-label">2</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="radio1">
                          <label class="form-check-label">3</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="radio1">
                          <label class="form-check-label">4</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="radio1">
                          <label class="form-check-label">5</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Comments on above remark</label>
                        <textarea class="form-control" rows="3" placeholder=""></textarea><br/>
                            <button type="submit" class="btn btn-info">Select Comment</button>
                    </div>
                    <div class="form-group">
                        <label>Overall impression and Recommendation</label>
                        <textarea class="form-control" rows="3" placeholder="Please provide any final comment and your recommendations."></textarea><br/>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-block btn-secondary btn-lg">Preview</button>
                            </div>
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-block btn-info btn-lg">Submit</button>
                            </div>
                    </div>
             </div>
            </div>
</div>

<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
<script src="../../dist/js/demo.js"></script>
</body>
</html>