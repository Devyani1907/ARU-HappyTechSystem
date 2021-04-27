<?php
  include_once('header.php');
?>

<div class="content-wrapper">
<div>
<h2 align="center">Create/Delete Template</h2><br />
  <div id="templateArea" class="card card-warning">    
    <div class="card-body">
     
        <div id="tempDetail">
          <div class="container">
            
            <div align="right">
              <button type="button" name="addTemplate" id="addTemplate" class="btn btn-info">Add Template</button>
            </div><br />
					<div id="result">
          <div class="table-responsive">
            <table class="table table-bordered table-striped" id="templateData">
            <thead>
              <tr>
                <th>TemplateId</th>
                <th id="sectionName">Template</th>
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
						<form method="post" id="add_template">
							<div class="modal-header">
								<h4 class="modal-title pl-6">Add Template</h4>
								<button type="button" sty class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
								<div class="form-group">
									<input type="text" name="templateName" id="templateName" class="form-control" placeholder="Enter Template Name" />
								</div>
							</div>
							<div class="modal-footer">
								<input type="hidden" name="hidden_id" id="template_id" />
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
var templateTableData = null;
var selectedSectionId = 0;

$('#add_template').on('submit', function(event)
{
    debugger;
        event.preventDefault();
        if($('#templateName').val() == '')
        {
          alert("Enter Template Name");
          return false;
        }

        let templateName = $('#templateName').val();

        if($('#submit').val() == "Edit")
        {
            var tempData = {"templateId": $("#template_id").val(), "templateName":templateName};
            $.ajax({
            url:"<?php echo base_url().'/TemplateController/EditTemplate'; ?>",
            method:"POST",
            data: tempData,
            success:function(data)
            {
               $('#dynamic_field_modal').modal('hide');
               getTemplates();
            }
          });
        }
        else
        {
            $.ajax({
            url:"<?php echo base_url().'/TemplateController/AddTemplate/'; ?>"+templateName,
            method:"POST",
            success:function(data)
            {
               $('#dynamic_field_modal').modal('hide');
               getTemplates();
            }
          });
        }
});

 function getTemplates()
{
  table = $('#templateData').DataTable( {
    retrieve: true,
    paging: false
  } );
  table.destroy();
  getTemplateDatatable();
}



function EditTemplate(index)
{
  var templateData = this.templateTableData.row(index).data();

  var templateId = templateData.TemplateId;
  $('.modal-title').text("Edit Details");
	$('#submit').val("Edit");
    $("#templateName").val(templateData.Name);
    $("#template_id").val(templateId);
	$('#dynamic_field_modal').modal('show');
}

function DeleteTemplate(index)
{
  var templateData = this.templateTableData.row(index).data();
  $.ajax({
            url:"<?php echo base_url().'/TemplateController/DeleteTemplate/'; ?>" + templateData.TemplateId,
            method:"GET",
            success:function(data)
            {
                getTemplates();
            }
          });
}

function getTemplateDatatable()
{
  let templateId = $("#templateNameId :selected").val();
  this.templateTableData  = $('#templateData').DataTable(
      {
        "bProcessing": true,
        "serverSide": true,
        "searchable": true,
        "ajax":{
             url: "<?php echo base_url().'/TemplateController/GetAllTemplateData'; ?>",
             type: "GET"
        },
        "columns":[
              {
                "data": "TemplateId",
                "visible": false,
                "searchable": false
              },
              { "data": "Name",  "searchable": true },
              { "data" : null,
                render: function ( data, type, full, meta ) {
                        return '<button type="button" class="btn btn-success" onclick="EditTemplate('+ meta.row +')" >Edit</button>'+ '  ' +
                        '<button type="button" class="btn btn-danger" onclick="DeleteTemplate('+ meta.row +')">Delete</button>';
                }
              },
        ],
      }
  );


}


$( document ).ready(function() {
      
        $('#addTemplate').click(function()
        {
            $('.modal-title').text('Add Template');
            $('#action').val("insert");
            $('#submit').val('Submit');
            $('#dynamic_field_modal').modal('show');
        });
      
        getTemplateDatatable();  
});
</script>
</body>
</html>