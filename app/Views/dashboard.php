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
                    <th>Email</th>
                    <th>FeedBack Status</th>
                  </tr>
                  </thead>
                  <tbody>
                  </tfoot>
                </table>
              </div>
  </div>
  
  <?php
include_once('footer.php');
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>

<script type = "text/javascript" language="javascript">
  $(document).ready(function() {

    var datatable  = $('#candidateOverview').DataTable(
      {
        "bProcessing": true,
        "serverSide": true,
        ordering: true,
        searching: true,
        "ajax":{
             url: "<?php echo base_url().'/get-candidate-detail'; ?>",
             type: "GET"
        },
        "columns":[
              { "data": "Name" },
              { "data": "PostName"},
              { "data": "Experience" },
              { "data": "Email" },
              { "data" : null,
                render: function ( data, type, row ) {
                      if(data.IsFeedbackDone == 1)
                        return '<button type="button" class="btn btn-success">Done</button>';
                      else  
                        return '<button type="button" class="btn btn-danger">Pending</button>';
                }
              }
        ],
      }
    );

    $('.dataTables_filter input').unbind().keyup(function(e) {
      debugger;
    var value = $(this).val();
    if (value.length>3) {
        alert(value);
        datatable .column( 1 ) .search( value ) .draw();
    } else {     
        //optional, reset the search if the phrase 
        //is less then 3 characters long
        datatable.search('').draw();
    }        
  });

  // datatable.columns().eq( 0 ).each( function ( colIdx ) {
  //   $( 'input', datatable.column( 1 ).footer().on( 'keyup change', function () 
  //                            { datatable .column( 1 ) .search( this.value ) .draw(); }));
 
  // });

    // $.ajax(
    //             {
    //               url: "<?php echo base_url() ?>/get-candidate-detail/",
    //               type: 'GET',
    //               dataType: "json", 
    //               success: function(result)
    //               {
    //                 console.log(JSON.stringify(result));
    //               }
    //             }
    //           );
} );
</script>
  