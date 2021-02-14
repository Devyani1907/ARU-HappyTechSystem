<?php
  include_once('header.php');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">
      <div class="card">
        <div class="card-body row">
          <div class="col-7">
            <div class="form-group">
              <label for="inputName">Name</label>
              <input type="text" id="inputName" class="form-control" />
            </div>
            <div class="form-group">
              <label for="inputEmail">E-Mail</label>
              <input type="email" id="inputEmail" class="form-control" />
            </div>
            <div class="form-group">
              <label for="inputSubject">Subject</label>
              <input type="text" id="inputSubject" class="form-control" />
            </div>
            <div class="form-group">
              <label for="inputMessage">Message</label>
              <textarea id="inputMessage" class="form-control" rows="4"></textarea>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary" value="Send message">
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
<script src="../../dist/js/demo.js"></script>

</body>
</html>
