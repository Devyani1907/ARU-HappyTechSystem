<?php
  include_once('header.php');
?>

<div class="content-wrapper">
<div>
<h2 align="center">HappyTech Feedback Template</h2><br />
  <p style="text-align: center;">
        <div class="form-group col-md-12" style="text-align: center;">
            <i class="far fa-copy fa-2x"></i>
              Select Feedback Template
        </div>
        <select name="templateName" class="form-control col-md-3 select2" onchange="getComments();"
        style="margin-left: 388px;" id="templateNameId">
            <?php 
                if($template_name)
                {
                    foreach($template_name as $name)
                    {
                      echo '<option value="'.$name['TemplateId'].'">'.$name['Name'].'</option>';
                    }
                }
            ?>
        </select>
        </div>
  </p>
  <div id="templateArea" class="card card-warning">    
    <div class="card-body">
     
        <div id="tempDetail">
          <div class="container">
            
            <div align="right">
              <button type="button" name="add" id="add" class="btn btn-info">Add Section</button>
            </div><br />
					<div id="result">
          <div class="table-responsive">
            <table class="table table-bordered table-striped" id="commentData">
            <thead>
              <tr>
                <th>SectionId</th>
                <th id="sectionName">Sections</th>
                <th>Comments</th>
                <th>Action</th>
              </tr>
            </table>
            </thead>
            <tbody>
            </tfoot>
          </div>
          </div>
					</div>
            </div><br/>
			
				<div id="dynamic_field_modal" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<form method="post" id="add_sections">
							<div class="modal-header">
								<h4 class="modal-title pl-6">Add Sections/Comments</h4>
								<button type="button" sty class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
								<div class="form-group">
									<input type="text" name="sections" id="sections" class="form-control" placeholder="Enter Section Name" />
								</div>
								<div class="table-responsive">
									<table class="table" id="dynamic_field">
									</table>
								</div>
							</div>
							<div class="modal-footer">
								<input type="hidden" name="hidden_id" id="hidden_id" />
								<input type="hidden" name="action" id="action" value="insert" />
								<input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
							</div>
						</form>
					</div>
				</div>
				</div>
           
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
<script src="../../dist/js/demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-4-autocomplete/dist/bootstrap-4-autocomplete.min.js" crossorigin="anonymous"></script>

<script>

var allCandidateData = null;
var templateFieldData = null;
var candidateId = null;
var candidateDetail = null;
var button = '';
var count = 1;
var commentTableData = null;
var selectedSectionId = 0;

function add_dynamic_input_field(count, comment = undefined)
{
		
		if(count > 1)
		{
			button = '<button type="button" name="remove" id="'+count+'" class="btn btn-danger btn-xs remove">x</button>';
		}
		else
		{
			button = '<button type="button" name="add_more" id="add_more" class="btn btn-success btn-xs">+</button>';
		}

    let commentVal = comment? comment : '';

		output = '<tr id="row'+count+'">';
		output += '<td><input type="text" name="comments" placeholder="Add Comments" value= "'+ commentVal  +'" class="form-control sections_list" /></td>';
		output += '<td align="center">'+button+'</td></tr>';
		$('#dynamic_field').append(output);
	
}

$(document).on('click', '#add_more', function(){
		count = count + 1;
		add_dynamic_input_field(count);
});

$(document).on('click', '.remove', function(){
		var row_id = $(this).attr("id");
		$('#row'+row_id).remove();
});

//  $('#commentData').on('search.dt', function() {
//     var value = $('.dataTables_filter input').val();
//     console.log(value);
//     commentTableData.column(2).search(value).draw(); // <-- the value
// });

$('#add_sections').on('submit', function(event)
{
        event.preventDefault();
        if($('#sections').val() == '')
        {
          alert("Enter Section Name");
          return false;
        }
        var total_comments = 0;
        $('.sections_list').each(function(){
          if($(this).val() != '')
          {
            total_comments = total_comments + 1;
          }
        });

        if(total_comments > 0)
        { 
          if($("#submit").val() === "Edit")
          {
            ModifyComments(selectedSectionId);
          }
          else
          {
            ModifyComments();
          }
        }
        else
        {
          alert("Please Enter at least one comment");
        }
 }
 );

function ModifyComments(sectionId = 0)
{
          let comments = $("#dynamic_field").find('input').serializeArray();
          let sectionAndComments = {"section" : $("input[name=sections]").val(), 
                                    "comments" : comments,
                                    "templateId" : $("#templateNameId :selected").val(),
                                    "action" :  $('#submit').val(),
                                    "sectionId" : sectionId};
          $.ajax({
            url:"<?php echo base_url().'/TemplateController/SaveSectionWithComments'; ?>",
            method:"POST",
            data:sectionAndComments,
            success:function(data)
            {
               $('#dynamic_field_modal').modal('hide');
               getComments();
            }
          });
 } 

 function getComments()
{
  table = $('#commentData').DataTable( {
    retrieve: true,
    paging: false
  } );
  table.destroy();
  getCommentDatatable();
}



function EditSection(index)
{
  var sectionData = this.commentTableData.row(index).data()
  $('#sections').val(sectionData.section);
  $("#dynamic_field").html("");
  let commentArry =  sectionData.comments.split(',');
  let idx =1;

  commentArry.forEach(function(comment) {
    add_dynamic_input_field(idx++, comment.trim());
  });

  selectedSectionId = sectionData.sectionId;
  $('.modal-title').text("Edit Details");
	$('#submit').val("Edit");
	$('#dynamic_field_modal').modal('show');
}

function DeleteSection(index)
{
  var sectionData = this.commentTableData.row(index).data();
  $.ajax({
            url:"<?php echo base_url().'/TemplateController/DeleteSectionWithComments/'; ?>" + sectionData.sectionId,
            method:"GET",
            success:function(data)
            {
               getComments();
            }
          });
}

function getCommentDatatable()
{
  let templateId = $("#templateNameId :selected").val();
  this.commentTableData  = $('#commentData').DataTable(
      {
        "bProcessing": true,
        "serverSide": true,
        "searchable": true,
        "ajax":{
             url: "<?php echo base_url().'/TemplateController/GetSectionWithComments/'; ?>" +templateId,
             type: "GET"
        },
        "columns":[
              {
                "data": "sectionId",
                "visible": false,
                "searchable": false
              },
              { "data": "section",  "searchable": true },
              { "data": "comments"},
              { "data" : null,
                render: function ( data, type, full, meta ) {
                        return '<button type="button" class="btn btn-success" onclick="EditSection('+ meta.row +')" >Edit</button>'+ '  ' +
                        '<button type="button" class="btn btn-danger" onclick="DeleteSection('+ meta.row +')">Delete</button>';
                }
              },
        ],
      }
  );


}


$( document ).ready(function() {
      
        $('#add').click(function()
        {
            $('#dynamic_field').html('');
            add_dynamic_input_field(1);
            $('.modal-title').text('Add Details');
            $('#action').val("insert");
            $('#submit').val('Submit');
            $('#add_sections').trigger('reset');
            $('#dynamic_field_modal').modal('show');
        });
      
        getCommentDatatable();  
});
</script>
</body>
</html>