
 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HappyTech</title>

<?php
  include_once('csslink.php');
?>
</head>
<body  class="hold-transition sidebar-mini layout-fixed">

<!-- Apply Job Modal -->
<div class="modal" role="dialog" id="applyJobModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Apply Job</h5>
        <button type="button" class="close"  aria-label="Close" onclick="CloseCandidateInfoModal()" id="jobModalClose">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- form start -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <!-- left column -->
                <div class="col-md-12">
                  <div class="card card-primary">
                    <form id="candidateForm" method="POST" action="<?php echo base_url() ?>/save-candidate" >
                          <div class="card-body">
                          <div class="form-group">
                              <label for="exampleInputEmail1">Full Name</label>
                              <input type="text" class="form-control"  name="Name" id="Name" placeholder="Enter name">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Email address</label>
                              <input type="email" class="form-control" name="Email" id="Email" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Mobile Number</label>
                              <input type="text" class="form-control"  name="mobileNum" id="mobileNum" placeholder="Enter Mobile Number">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Experience in years</label>
                              <input type="text" class="form-control"  name="exp" id="exp" placeholder="Enter Experience">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Highest Education</label>
                              <input type="text" class="form-control"  name="edu" id="edu" placeholder="Enter Education">
                            </div>
                            <!-- <div class="form-group">
                              <label for="exampleInputFile">File input</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="exampleInputFile">
                                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                  <span class="input-group-text">Upload</span>
                                </div> 
                              </div>
                            </div> -->
                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </form>
                      </div>
                
                
                  </div>
                </div>  
            </div>  
          </div> 
        </section>   
        <!-- form end-->
      </div>
    </div>
  </div>
</div>


<div class="wrapper">
  <aside class="main-sidebar elevation-4">
      <div class="sidebar">
        <div class="card card-widget widget-user-2">
          <div class="widget-user-header bg-warning">
              <a href="/" class="brand-link">
                <div class="widget-user-image">
                    <img class="img-circle elevation-2" src="dist/img/HappyTechLogoCircle.png" alt="User Avatar">
                </div>
                <h3 class="widget-user-username">Happy Tech</h3><br/>
              </a>
              <h5 class="text-center">Available Vacancies</h5>
            </div>
            <div class="card-footer p-0">
              <ul class="nav flex-column" id="departmentListId">
                    <!-- <li class="nav-item">
                      <a href="#" class="nav-link">
                        Accountants <span class="float-right badge bg-primary">31</span>
                      </a>
                    </li> -->
              </ul>
            </div>
          </div>
      </div>
  </aside>
  <div class="content-wrapper">
        <!--  Header Section  -->
    <div class="col-12" style="line-height: -1.5">
      <div class="color-palette-set">
        <div class="bg-gray-dark color-palette">
          <button type="button">
            <span><a href="/" class="">Home</a></span>
              <!-- <button id="myBtn">Open Modal</button> -->
          </button>
        </div>
      </div>
    </div>
	  <!--  End Header Section  -->
    <section class="content pt-2">
        <div class="container-fluid">
            <div class="row" id="jobCardId">
            </div>
         </div>
    </section>      
  </div>
</div>



</body>


<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>

var departmentAndPostData = null;

function loadPosts(departmentId)
{
      $("#jobCardId").html("");
      let posts = departmentAndPostData.posts;
      posts.forEach(function(post){
      if(departmentId == post.departmentId)
      {
        $("#jobCardId").append('<div class="col-md-3">'); 
        $("#jobCardId").append('<div class="card card-success">');
        $("#jobCardId").append('<div class="card-header">');
        $("#jobCardId").append('<br>');
        $("#jobCardId").append('<p><h3 class="" style="padding-top: 15px;padding-left: 105px;"><span class="badge bg-secondary">'+post.PostName+'</span></h3></p>');
        $("#jobCardId").append('<div class="card-tools">');
        $("#jobCardId").append('</div>');
        $("#jobCardId").append('</div>');
        $("#jobCardId").append('<div class="card-body">');
        $("#jobCardId").append('<div class="row">');
        $("#jobCardId").append('<div class="col-12">');
        $("#jobCardId").append('<ul class="nav flex-column"><li class="pt-2 pb-2 nav-item">Experience <span class="badge bg-warning">'+post.ExperienceInYears+' years</span></li>');
        $("#jobCardId").append('<li class="pt-2 pb-2 nav-item">Education <span class="badge bg-warning">'+post.Education+'</span></li>');
        $("#jobCardId").append('<li class="pt-2 pb-2 nav-item">Post opening date  <span class="badge bg-warning">0'+post.PostOpeningDateTime+'</span></li>');
        $("#jobCardId").append('<li class="pt-2 pb-2 nav-item">Post closing date  <span class="badge bg-warning">'+post.PostClosingDateTime+'</span></li>');
        $("#jobCardId").append('<li class="pt-2 pb-2 nav-item">Vacancy Available <span class="badge bg-warning">'+post.VacancyAvail+'</span></li></ul>');
        $("#jobCardId").append('</div>');
        $("#jobCardId").append('<div class="col-12 pt-2">');
        $("#jobCardId").append('<button class="btn btn-block btn-info" onclick="OpenCandidateInfoModal()" id="candidateInfoId">Apply</button>');
        $("#jobCardId").append('</div>');
        $("#jobCardId").append('</div> ');
        $("#jobCardId").append('</div>');
        $("#jobCardId").append('<div class="card-footer p-0">');
        $("#jobCardId").append('</div>');
        $("#jobCardId").append('</div>');
        $("#jobCardId").append('</div>');
      } 
    });
}

function OpenCandidateInfoModal()
{
  $('#applyJobModal').modal('show');
}

function CloseCandidateInfoModal()
{
  $('#applyJobModal').modal('hide');
}



$(document).ready(function() {

  var modal = document.getElementById("applyJobModal");

  // Get the <span> element that closes the modal
  var jobModelCloseBtn = document.getElementsByClassName("close")[0];

  // jobModelCloseBtn.onclick = function() {
  //   modal.style.display = "none";
  // }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
    }
  }

  $.ajax(
    {
      url: "<?php echo base_url() ?>/PostController/GetPostAndDepartment/",
      type: 'GET',
      dataType: "json", 
      success: function(result)
      {
        departmentAndPostData = result;
        result.departments.forEach(function(department){
          $("#departmentListId").append('<li class="nav-item"><a href="#"  onclick="loadPosts('+department.departmentId+')" class="nav-link">'+department.departmentName + '</a></li>');
        });
        loadPosts(result.departments[0].departmentId);
      }
    }
  );
});

</script>
</html>
