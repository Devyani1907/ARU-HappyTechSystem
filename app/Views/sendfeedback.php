<?php
  include_once('header.php');
?>

<div class="content-wrapper">
  <div>
  <br/>
  <p style="text-align: center;">
      <div class="form-group col-md-12" style="text-align: center;">
          <i class="far fa-copy fa-2x"></i>
            Select Feedback Template
      </div>
      <select name="templateName" class="form-control col-md-3 select2" onchange="getTemplate(this);"
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
  <hr/>

  <div id="templateArea" class="card card-warning">
    <div class="card-header" id="tempName">
    </div>
    <div class="card-body">
      <form id="tempDetailformId" method="POST" action="<?php echo base_url() ?>/save-feedback" >
        <div id="tempDetail">
            <div class="row">
              <div id="tempHeader">
              </div>
            </div><br/>
            <div class="row" id="tempBody">
             
            </div>
            <br/>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-8 pl-12" style="padding-left: 257px;">
                      <button type="submit" onclick="feedbackMessage()" class="btn btn-block btn-info btn-lg">Submit</button>
                  </div>
              </div> 
        </div> 
        <input type="hidden" name="feedbackData" id="feedbackData" />      
        <input type="hidden" name="feedbackTitle" id="feedbackTitle" />      
      </form>        
    </div>
  </div>
</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
<script src="../../dist/js/demo.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script> -->
<!-- Bootstrap 4 Autocomplete -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-4-autocomplete/dist/bootstrap-4-autocomplete.min.js" crossorigin="anonymous"></script>

<script>

var allCandidateData = null;
var templateFieldData = null;
var candidateId = null;
var candidateDetail = null;

function feedbackMessage()
{
  $("#feedbackData").val($("#tempBody").html()); 
  $("#feedbackTitle").val($("#tempName").html()); 
  alert("Feedback done Successfully");
}

function CloseFeedbackMssgModal()
{
  $('#feedbackMssgModal').modal('hide');
}


function getTemplate(templateId)
{
  displayTemplateById(templateId.value);
}

function displayTemplateById(templateId)
{
  $("#tempHeader").html("");
  $("#tempBody").html("");
  $.ajax(
    {
      url: "<?php echo base_url() ?>/FeedbackController/GetfeedbackTemplateById/"+templateId,
      type: 'POST',
      dataType: "json", 
      success: function(result)
      {
        let templateName = $("#templateNameId :selected").text();
        var templateHeader = '<h3 class="card-title">' + templateName + '</h3>';
        $("#tempName").html(templateHeader); 
        getTemplateHeader(result.template_fields);
        getTemplateBody(result.template_fields);
      }
    
    }
  );
}

function getTemplateHeader(template_fields)
{
  templateFieldData = template_fields;
  template_fields.forEach(function(item) 
  {
    if(item.SectionType =='header')
    {
      if(item.TemplateLabel == "CandidateName")
      {
          $("#tempHeader").append('<div class="col-sm-6"> <div class="form-group">');
          $("#tempHeader").append('<label>'+ item.TemplateLabel +':</label>');
          $("#tempHeader").append('<select name="candidateId" class="form-control" onchange="getCandidateDetail(this);" style="margin-left: 10px;" id="candidateNameId"><option value="">Select Candidate..</option></select>');
          $("#tempHeader").append('</div></div>');

          $.ajax(
                {
                  url: "<?php echo base_url() ?>/CandidateController/getAllCandidateDetail/",
                  type: 'GET',
                  dataType: "json", 
                  success: function(result)
                  {
                    allCandidateData = result.candidateDetail;
                    result.candidateDetail.forEach(function(candidateItem){
                      console.log(candidateItem);
                         if(candidateItem.IsFeedbackDone == "0")
                         {
                           let name;
                           if(candidateItem.LastName == null)
                           {
                              name = candidateItem.FirstName;
                           }
                           else
                           {
                              name = candidateItem.FirstName +" "+candidateItem.LastName ;
                           }
                          $("#candidateNameId").append('<option value="'+candidateItem.CandidateID+'">'+ name +'</option>')
                        }
                    });
                  }
                }
              );
      }
      else
      {
          $("#tempHeader").append('<div class="col-sm-6"> <div class="form-group">');
          $("#tempHeader").append('<label>'+ item.TemplateLabel +':</label>');
          $("#tempHeader").append( 
              $("<input>", 
                  { type:item.FieldType, 
                    //placeholder:'Keywords', 
                    name:item.TemplateLabelId, 
                    style: 'margin-left: 10px;',
                    id: item.TemplateLabelId,
                    readonly: true,
                    class: "form-control" 
                  }
              )
          );
          $("#tempHeader").append('</div></div>');

      }
    }
    
  });
}

function getTemplateBody(template_fields)
{
  template_fields.forEach(function(item) 
  {
    if(item.SectionType =='body')
    {
        $("#tempBody").append('<div class="col-md-12" id="sectionId'+
                              item.TemplatefieldId+'"><label>'+ item.TemplateLabel +':</label></div>');
        
        $.ajax(
        {
          url: "<?php echo base_url() ?>/FeedbackController/GetCommentsByTemplateFieldsId/"+item.TemplatefieldId,
          type: 'GET',
          dataType: "json", 
          success: function(result)
          {
            console.log(JSON.stringify(result));

            result.commentsDetail.forEach(function(comment){
              $("#sectionId" + item.TemplatefieldId).append(''+
                                    '<div class="col-md-12"><input type="checkbox" id="commentId'+comment.commentid+'" name="commentName'+comment.commentid+'" value="'+comment.commentid+'">'+
                                    '<label class="ml-2" for="commentId'+comment.commentid+'"> '+comment.Comment+'</label></div>');
            });
          }   
        }
        );
    }
  });
}

function getCandidateDetail(candidateObj)
{
  //let candidateHtmlId = candidateObj.id;
  let candidateId = $("#candidateNameId :selected").val();
  allCandidateData.forEach(function(candidateData){
    if(candidateData.CandidateID == candidateId)
    {
      candidateDetail = candidateData;
      if(templateFieldData && templateFieldData.length > 0 )
      {
        templateFieldData.forEach(function(templateField){
        $("#"+templateField.TemplateLabelId).val(candidateDetail[templateField.TemplateLabelId]);

        });
      }
    }
  });

}

$( document ).ready(function() {
        let templateName = $("#templateNameId :selected").text();
        var templateHeader = '<h3 class="card-title">' + templateName + '</h3>';
        $("#tempName").html(templateHeader); 
        let templateId = $("#templateNameId :selected").val();
        displayTemplateById(templateId);

        var modal = document.getElementById("feedbackMssgModal");

        window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
        }
      }
});


</script>
</body>
</html>