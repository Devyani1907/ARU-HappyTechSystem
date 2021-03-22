
  <?php
  include_once('header.php');
?>
<div class="content-wrapper">
<div class="card-body">
      <div class="color-palette-set">
                  <div class="bg-info color-palette"><h4 class="text-center">Candidates Overview</h4></div>
                  </div>
      </div>
                <table id="candidateOverview" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Candidate Name</th>
                    <th>POST Applied</th>
                    <th>Experience</th>
                    <th>Applied Date</th>
                    <th>FeedBack Status</th>
                  </tr>
                  </thead>
                  <tbody>
                  <!-- <tr>
                    <td>Devyani</td>
                    <td>Software Developer
                    </td>
                    <td><span class=" badge bg-info">2</span></td>
                    <td>01-01-21</td>
                    <td><span class="badge bg-warning">Send</span></td>
                  </tr>
                  <tr>
                    <td>Devyani</td>
                    <td>Software Developer
                    </td>
                    <td><span class=" badge bg-info">2</span></td>
                    <td>01-01-21</td>
                    <td> <a href="/sendfeedback"><span class="badge bg-danger">Not Send</span></a></td>
                  </tr>
                  <tr>
                    <td>Devyani</td>
                    <td>Software Developer
                    </td>
                    <td><span class=" badge bg-info">2</span></td>
                    <td>01-01-21</td>
                    <td> <a href="/sendfeedback"><span class="badge bg-danger">Not Send</span></a></td>
                  </tr>
                  <tr>
                  <td>Devyani</td>
                    <td>Software Developer
                    </td>
                    <td><span class=" badge bg-info">2</span></td>
                    <td>01-01-21</td>
                    <td><span class="badge bg-warning">Send</span></td>
                  </tr> -->
                  </tfoot>
                </table>
              </div>
  </div>
  
  <?php
include_once('footer.php');
?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<script type = "text/javascript" language="javascript">
  $(document).ready(function() {
    var datatable  = $('#candidateOverview').DataTable(
      {
        // "processing": true,
        // "serverSide": true,
        // "order": [],
        // "ajax":{
        //     //  url: <?php echo base_url().'/UserController/get_candidate_detail'; ?>,
        //     //  type: "POST"
        // },
        // "columnDefs":[
        //   {
        //       "target": [0,1,2,3,4],
        //       "orderable": false
        //   }
        // ]

      }
    );
} );
</script>
  