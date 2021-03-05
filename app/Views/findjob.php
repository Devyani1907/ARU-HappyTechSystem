
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
<div class="wrapper">
<aside class="main-sidebar elevation-4">
    <div class="sidebar">
    <div class="card card-widget widget-user-2">
              <!-- Add the bg color to the header using any of the bg-* classes -->
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
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Accountants <span class="float-right badge bg-primary">31</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Manager <span class="float-right badge bg-info">5</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Assistant Manager <span class="float-right badge bg-success">12</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Sales Person <span class="float-right badge bg-danger">2</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Business Analyst <span class="float-right badge bg-danger">4</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Project Manager <span class="float-right badge bg-success">2</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      QA <span class="float-right badge bg-danger">6</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
    </div>
</aside>
        <div class="content-wrapper">
        <!--  Header Section  -->
        <div class="col-12" style="line-height: 5.5">
                <div class="color-palette-set">
                  <div class="bg-gray-dark color-palette"><span><a href="/" class="">Home</a></span></div>
                </div>
              </div>
	<!--  End Header Section  -->
        <section class="content pt-2">
        <div class="container-fluid">
			<div class="row">
            <?php
                for ($x = 0; $x < 4; $x++)
                {
                    include('jobcard.php');
                }
            ?>
            </div>
        </div>
        </section>      
        </div>
    
  </div>
</body>


<?php
include_once('footer.php');
?>

</html>
