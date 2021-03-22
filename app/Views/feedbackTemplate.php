<?php
  include_once('header.php');
?>

<div class="content-wrapper">
  <div>

    <!-- <?php  
      //echo json_encode($template_name);
    ?> -->
<br/>
  <p style="text-align: center;">
      <div class="form-group col-md-12" style="text-align: center;">
          <i class="far fa-copy fa-2x"></i>
            Select Feedback Template
      </div>
      <select name="templateName" class="form-control col-md-3 select2" onchange="getTemplate(this);" style="margin-left: 388px;" id="templateNameId">
          <?php 
              if($template_name)
              {
                  foreach($template_name as $name)
                  {
                    echo '<option value="'.$name['TemplateId'].'" id="'.$name['TemplateId'].'">'.$name['Name'].'</option>';
                  }
              }
          ?>
      </select>
      </div>
  </p>
  <hr/>

  <!-- Auto complete code -->
  <!-- <div class="container">
      <div id="parent" class="form-group">
        <label for="myAutocomplete">Bootstrap 4 Autocomplete</label>
        <input type="text" id="myAutocomplete" class="form-control" />
      </div>
      <div id="output"></div>
    </div> -->

  <!-- Auto complete code end -->

  <div id="templateArea" class="card card-warning">
    <div class="card-header" id="tempName">
    </div>
    <div class="card-body">
      <form id="tempDetailformId">
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
                    <div class="col-sm-6">
                      <button type="button" class="btn btn-block btn-secondary btn-lg">Preview</button>
                    </div>
                    <div class="col-sm-6">
                      <button type="button" class="btn btn-block btn-info btn-lg">Submit</button>
                  </div>
              </div> 
        </div>       
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

// var src = {
//   "Bootstrap 4 Autocomplete example": 1,
//   "Best example in the world": 2,
//   "Bootstrap 4 Autocomplete is very nice": 3,
//   "It contains neatly arranged example items": 4,
//   "With many autocomplete values": 5,
//   "And it uses default Bootstrap 4 components": 6,
//   "You can use this example to test": 7,
// }

// function onSelectItem(item, element) {
//   $('#output').html(
//     'Element <b>' + $(element).attr('id') + '</b> was selected<br/>' +
//     '<b>Value:</b> ' + item.value + ' - <b>Label:</b> ' + item.label
//   );
// }

// $('#myAutocomplete').autocomplete({
//   source: src,
//   onSelectItem: onSelectItem,
//   highlightClass: 'text-danger',
//   treshold: 2,
// });


var allCandidateData = null;
var templateFieldData = null;
var candidateId = null;

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
        debugger;
        //alert(JSON.stringify(result));
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
  temptemplateFieldData = template_fields;
  template_fields.forEach(function(item) 
  {
    if(item.SectionType =='header')
    {
      debugger;
      if(item.TemplateLabel == "CandidateName")
        {
          $("#tempHeader").append('<div class="col-sm-6"> <div class="form-group">');
          $("#tempHeader").append('<label>'+ item.TemplateLabel +':</label>');
          $("#tempHeader").append('<select name="'+ item.TemplateLabel +'" class="form-control" onchange="getCandidateDetail(this);" style="margin-left: 10px;" id="'+ item.TemplateLabelId +'"><option value="">Select Candidate..</option></select>');
          $("#tempHeader").append('</div></div>');

          $.ajax(
                {
                  url: "<?php echo base_url() ?>/CandidateController/getAllCandidateDetail/",
                  type: 'GET',
                  dataType: "json", 
                  success: function(result)
                  {
                    allCandidateData = result.candidateDetail;
                    console.log(JSON.stringify(result));
                    result.candidateDetail.forEach(function(candidateItem){
                        $("#"+ item.TemplateLabelId).append('<option value="'+candidateItem.CandidateID+'">'+ candidateItem.FirstName +' '+ candidateItem.LastName+'</option>')
                    });

                    // $("#"+ item.TemplateLabelId).change(function()
                    //   {
                    //       candidateId = $("#" + item.TemplateLabelId + " :selected").val();
                    //   }
                    // );
                    // $("#"+ item.TemplateLabelId).autocomplete();
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
                    name:item.TemplateLabel, 
                    style: 'margin-left: 10px;',
                    id: item.TemplateLabelId,
                    disabled: true,
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
        $("#tempBody").append('<label>'+ item.TemplateLabel +':</label>');
        $("#tempBody").append('<textarea class="form-control" rows="3" placeholder="" name="'+ item.TemplateLabel +'"  id="'+item.TemplateLabelId+'"></textarea><br/>');
        $("#tempBody").append('</div><br/>');
    }
  });
}

function getCandidateDetail(candidateObj)
{
  debugger;
  let candidateDetail ;
  let candidateHtmlId = candidateObj.id;
  let candidateId = $("#"+ candidateHtmlId +" :selected").val();
  allCandidateData.forEach(function(candidateData){
    debugger;
    if(candidateData.CandidateID == candidateId)
    {
      candidateDetail = candidateData;
    }

  });

  templateFieldData.forEach(function(templateField){
    debugger;
    if(templateField.TemplateLabel != candidateObj.name && templateField.SectionType == "header")
    {
      //$("#"+ templateField.TemplateDetailID).val(candidateDetail.);
    }

  });

}

$( document ).ready(function() {
        let templateName = $("#templateNameId :selected").text();
        var templateHeader = '<h3 class="card-title">' + templateName + '</h3>';
        $("#tempName").html(templateHeader); 
        let templateId = $("#templateNameId :selected").val();
        displayTemplateById(templateId);
});


</script>
</body>
</html>