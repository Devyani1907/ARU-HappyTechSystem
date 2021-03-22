
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
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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


<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>

<script>

var departmentAndPostData = null;

function loadPosts(departmentId)
{
      $("#jobCardId").html("");
      let posts = departmentAndPostData.posts;
      posts.forEach(function(post){
      console.log(JSON.stringify(post));  
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
        $("#jobCardId").append('<button type="button" class="btn btn-block btn-info" data-toggle="modal" data-target="#applyJobModal" >Apply</button>');
        $("#jobCardId").append('</div>');
        $("#jobCardId").append('</div> ');
        $("#jobCardId").append('</div>');
        $("#jobCardId").append('<div class="card-footer p-0">');
        $("#jobCardId").append('</div>');
        $("#jobCardId").append('</div>');
        $("#jobCardId").append('</div>');

        //$("#jobCardId").load("jobcard.php"); 
        // $.ajax({
        // url: '/JobController/jobCard',
        // success: function(html) {
        //   $("#jobCardId").append(html);
        // }
        // });

      } 
    });
}

$(document).ready(function() {
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
