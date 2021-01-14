<!--
=========================================================
Material Dashboard - v2.1.2
=========================================================

Product Page: https://www.creative-tim.com/product/material-dashboard
Copyright 2020 Creative Tim (https://www.creative-tim.com)
Coded by Creative Tim

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <!-- <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets/img/apple-icon.png'); ?>"> -->
  <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/logo.png'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Student Forms
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?php echo base_url('assets/css/material-dashboard.css?v=2.1.2'); ?>" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo base_url('assets/demo/demo.css'); ?>" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper">
    <?php $this->load->view('partials/_sidebar'); ?>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:void(0);"></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <?php $this->load->view('partials/_header'); ?>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content" id="main_content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h2 class="card-title">ONLINE GRADE VIEWER</h2>
                  <h4 class="card-category">Disclaimer: This is not an official document. It cannot be used in any transactions. The purpose of this information is for viewing only.This document is strictly private, confidential and personal to its recipients and should not be copied,
distributed or reproduced in whole or in part, nor passed to any third party. </h4>
                </div>
                <div class="card-body">
                  <h4>
                    <div class="row">
                      <div class="col-sm-2 col-md-2 col-lg-2">
                        Name
                      </div>
                      <div class="col-md-5 font-weight-bold text-dark">
                        <?php echo $_SESSION['firstname']." ".$_SESSION['lastname']; ?>
                      </div>
                    </div>
                  </h4>
                  <h4> 
                    <div class="row">
                      <div class="col-sm-2 col-md-2 col-lg-2">
                        Course
                      </div>
                      <div class="col-md-5 font-weight-bold text-dark">
                        <?php echo $_SESSION['course']; ?>
                      </div>
                    </div>
                  </h4>
                  <h4> 
                    <div class="row">
                      <div class="col-sm-2 col-md-2 col-lg-2">
                        Section
                      </div>
                      <div class="col-md-5 font-weight-bold text-dark">
                        <?php echo $_SESSION['section']; ?>
                      </div>
                    </div>
                  </h4>
                  <h4> 
                    <div class="row">
                      <div class="col-sm-2 col-md-2 col-lg-2">
                        Semester
                      </div>
                      <div class="col-md-5 font-weight-bold text-dark">
                        <?php echo $_SESSION['semester']; ?>
                      </div>
                    </div>
                  </h4>
                  <h4>
                    <div class="row">
                      <div class="col-sm-2 col-md-2 col-lg-2">
                        Status
                      </div>
                      <div class="col-md-5">
                        <p class="font-weight-bold text-primary">N/A</p>
                        <!-- <?php  
                          $average_fail = 0;
                          $drop_units = 0;
                          $total_units = 0;
                          $count_fail = 0;

                          foreach ($grades as $grade) {
                            if ($grade->weight > 0) {
                              if ($grade->grade == 'D' || $grade->grade == 'FD' || $grade->grade == 'C') {
                                $drop_units += intval($grade->unit);
                              }else if ($grade->grade == 'NG' || $grade->grade == 'INC.' || $grade->grade == '4'){
                                //GRADE is NO GRADE OR INCOMPLETE
                                if ($grade->reexam == '') {
                                  $count_fail += intval($grade->unit);
                                }
                              }else if($grade->grade == '5'){
                                $count_fail += intval($grade->unit);
                              }
                              $total_units += intval($grade->unit);
                            }
                          }

                          if ($count_fail == $total_units) {
                            if ($total_units == 0) {
                              echo '<p class="font-weight-bold text-primary">NO GRADE</p>';
                            }else{
                              echo '<p class="font-weight-bold text-danger">PERMANENT DISQUALIFICATION FROM THE UNIVERSITY</p>';
                              echo '<p class="font-weight-bold text-danger">NOT ALLOWED TO ENROLL IN THE UNIVERSITY</p>';
                            }
                          }else{
                            $average_fail = 100 - (((($total_units - $drop_units) - $count_fail) / $total_units) * 100);
                            if ($average_fail >= 0 && $average_fail < 25) {
                              echo '<p class="font-weight-bold text-success">REGULAR</p>';
                              echo '<p class="font-weight-bold text-success">NORMAL LOAD</p>';
                            }else if($average_fail >= 25 && $average_fail < 50){
                              echo '<p class="font-weight-bold text-warning">WARNING</p>';
                              echo '<p class="font-weight-bold text-warning">LESS 3 UNITS FROM NORMAL LOAD</p>';
                            }else if ($average_fail >= 50 && $average_fail < 76) {
                              echo '<p class="font-weight-bold text-secondary">PROBATION</p>';
                              echo '<p class="font-weight-bold text-secondary">15 UNITS ONLY</p>';
                            }else if ($average_fail >= 76 && $average_fail < 100) {
                              echo '<p class="font-weight-bold text-danger">PERMANENT DISQUALIFICATION FROM THE UNIVERSITY</p>';
                              echo '<p class="font-weight-bold text-danger">NOT ALLOWED TO ENROLL IN THE UNIVERSITY</p>';
                            }
                          }
                        ?> -->
                      </div>
                    </div>
                  </h4>
                  <p class="card-category">For more question you can email <a href="#">gerald.valdez@clsu.edu.ph</a>. Office hours is from <strong class="font-weight-bold text-info">MONDAY - FRIDAY</strong>. We're  happy to accomodate your question, expect atleast 72 hours for our response. Thank you for your patience.</p>
                  <div class="table-responsive" style="overflow-x: auto;">
                    <table class="table">
                      <thead class="text-primary">
                        <tr>
                            <th>NO</th>
                            <th>SUBJECTS</th>
                            <th>UNITS</th>
                            <th>GRADE</th>
                            <th>REMARKS</th>
                        </tr>
                      </thead>
                      <tbody class="font-weight-bold">
                        <?php 
                        $ctr = 1;
                          foreach ($grades as $grade) {
                            echo "<tr>";
                              echo "<td>".$ctr++."</td>";
                              echo "<td>".$grade->subject."</td>";
                              if ($grade->weight > 0) {
                                echo "<td>".intval($grade->unit)."</td>";
                              }else{
                                echo "<td>".$grade->unit."</td>";
                              }

                              if ($grade->reexam == 0) {
                                echo "<td>".$grade->grade."</td>";
                                echo "<td>".$grade->remarks."</td>";
                              }else{
                                echo "<td>".$grade->reexam."</td>";
                                echo "<td>".$grade->grade." - ".$grade->remarks."</td>";
                              }


                              
                            echo "</tr>";
                          }
                        ?>
                        <tr>
                            <td></td>
                            <td>nothing follows</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                      </tbody>
                      <tfoot class=" text-primary">
                        <tr>
                            <th></th>
                            <th>TOTAL</th>
                            <th>
                              <?php  
                                $ctr = 0;
                                $drop_units = 0;
                                foreach ($grades as $grade) {
                                  if ($grade->weight == 1 && $grade->unit != '-') {
                                    if ($grade->grade == 'D' || $grade->grade == 'FD') {
                                      $drop_units += intval($grade->unit);
                                    }
                                    $ctr += intval($grade->unit);
                                  }
                                }

                                echo $ctr - $drop_units;
                              ?>
                            </th>
                            <th>
                              <?php  
                                $ctr = 0;
                                $drop_units = 0;
                                $sub_total = 0;//grade * unit
                                $total = 0;//sum of all subtotal
                                $average = 0;//sum of all subtotal / total units
                                $no_gpa = false;
                                foreach ($grades as $grade) {
                                  if ($grade->weight > 0 && $grade->unit != '-') {
                                    if ($grade->grade == 'D' || $grade->grade == 'FD' || $grade->grade == 'C') {
                                      $drop_units += intval($grade->unit);
                                    }else if ($grade->grade == 'NG' || $grade->grade == 'INC.' || $grade->grade == '4'){
                                      //GRADE is NO GRADE OR INCOMPLETE
                                      if ($grade->reexam == '') {
                                        $subtotal = 5 * intval($grade->unit);
                                        $total += $subtotal;
                                      }else{
                                        $subtotal = floatval($grade->reexam) * intval($grade->unit);
                                        $total += $subtotal;
                                      }
                                      $no_gpa = true;
                                    }else{
                                      $subtotal = floatval($grade->grade) * intval($grade->unit);
                                      $total += $subtotal;
                                    }

                                    if (($grade->grade == 'IP' && $grade->reexam == '') || ($grade->grade == 'D' || $grade->grade == 'FD' || $grade->grade == 'C')) {
                                      $no_gpa = true;
                                      $subtotal = 5 * intval($grade->unit);
                                      $total += $subtotal;
                                    }else{
                                      $subtotal = floatval($grade->reexam) * intval($grade->unit);
                                      $total += $subtotal;
                                    }
                                  }
                                }

                                if ($no_gpa != true && count($grades) > 0) {
                                  $average = ($total / ($total_units - $drop_units));
                                  echo round($average, 2);
                                }else{
                                  echo "N/A";
                                }
                              ?>
                            </th>
                            <th>GPA</th>
                        </tr>
                      </tfoot>
                    </table>
                    <h3 class="card-category">Disclaimer: This is not an official document. It cannot be used in any transactions. The purpose of this information is for viewing only.This document is strictly private, confidential and personal to its recipients and should not be copied,
distributed or reproduced in whole or in part, nor passed to any third party. </h3>
                    
                    <img style="position: absolute; top: 0; left: 0;" src="<?php echo base_url('assets/img/watermark.png'); ?>">
                    <img style="position: absolute; top: 50%; left: 0;" src="<?php echo base_url('assets/img/watermark.png'); ?>">
                    <img style="position: absolute; top: 0; right: 0;" src="<?php echo base_url('assets/img/watermark.png'); ?>">
                    <img style="position: absolute; top: 50%; right: 0;" src="<?php echo base_url('assets/img/watermark.png'); ?>">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- 
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
              <li>
                <a href="https://creative-tim.com/presentation">
                  About Us
                </a>
              </li>
              <li>
                <a href="http://blog.creative-tim.com">
                  Blog
                </a>
              </li>
              <li>
                <a href="https://www.creative-tim.com/license">
                  Licenses
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, OFFICE OF ADMISSIONS
          </div>
        </div>
      </footer> -->
    </div>
  </div>
  <!-- <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title"> Sidebar Filters</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger active-color">
            <div class="badge-colors ml-auto mr-auto">
              <span class="badge filter badge-purple" data-color="purple"></span>
              <span class="badge filter badge-azure" data-color="azure"></span>
              <span class="badge filter badge-green active" data-color="green"></span>
              <span class="badge filter badge-warning" data-color="orange"></span>
              <span class="badge filter badge-danger" data-color="danger"></span>
              <span class="badge filter badge-rose" data-color="rose"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="header-title">Images</li>
        <li class="active">
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="<?php echo base_url('assets/img/sidebar-1.jpg'); ?>" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="<?php echo base_url('assets/img/sidebar-2.jpg'); ?>" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="<?php echo base_url('assets/img/sidebar-3.jpg'); ?>" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="<?php echo base_url('assets/img/sidebar-4.jpg'); ?>" alt="">
          </a>
        </li>
      </ul>
    </div>
  </div> -->

  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">ONE-TIME PIN</h5>
        </div>
        <div class="modal-body">
          <form method="POST" action="gr-change-password">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group bmd-form-group">
                  <label class="bmd-label-floating">NEW PASSWORD</label>
                  <input type="password" class="form-control" name="new_password" id="new_password" required>
                </div>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-3">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" value="" onclick="show_pass()">
                    <span class="form-check-sign">
                      <span class="check"></span>
                    </span>
                    <p>SHOW/HIDE</p>
                  </label>
                </div>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">CHANGE PASSWORD</button>
        </div>

          </form>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="<?php echo base_url('assets/js/core/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/core/popper.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/core/bootstrap-material-design.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/plugins/perfect-scrollbar.jquery.min.js'); ?>"></script>
  <!-- Plugin for the momentJs  -->
  <script src="<?php echo base_url('assets/js/plugins/moment.min.js'); ?>"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="<?php echo base_url('assets/js/plugins/sweetalert2.js'); ?>"></script>
  <!-- Forms Validations Plugin -->
  <script src="<?php echo base_url('assets/js/plugins/jquery.validate.min.js'); ?>"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="<?php echo base_url('assets/js/plugins/jquery.bootstrap-wizard.js'); ?>"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="<?php echo base_url('assets/js/plugins/bootstrap-selectpicker.js'); ?>"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="<?php echo base_url('assets/js/plugins/bootstrap-datetimepicker.min.js'); ?>"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="<?php echo base_url('assets/js/plugins/jquery.dataTables.min.js'); ?>"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="<?php echo base_url('assets/js/plugins/bootstrap-tagsinput.js'); ?>"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="<?php echo base_url('assets/js/plugins/jasny-bootstrap.min.js'); ?>"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="<?php echo base_url('assets/js/plugins/fullcalendar.min.js'); ?>"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="<?php echo base_url('assets/js/plugins/jquery-jvectormap.js'); ?>"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="<?php echo base_url('assets/js/plugins/nouislider.min.js'); ?>"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="<?php echo base_url('assets/js/plugins/arrive.min.js'); ?>"></script>

  <!-- Chartist JS -->
  <script src="<?php echo base_url('assets/js/plugins/chartist.min.js'); ?>"></script>
  <!--  Notifications Plugin    -->
  <script src="<?php echo base_url('assets/js/plugins/bootstrap-notify.js'); ?>"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url('assets/js/material-dashboard.js?v=2.1.2'); ?>" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?php echo base_url('assets/demo/demo.js'); ?>"></script>
  <script>

    <?php 
      if ($otp[0]->otp == strtoupper($otp[0]->password)){
        echo "$(document).ready(function(){
                $('#staticBackdrop').modal('show');
                $('#main_content').css('display', 'none');
              });";
      }else{
        echo "$(document).ready(function(){
                $('#main_content').css('display', 'block');
              });";
      }
    ?>
    function show_pass() {
      var x = document.getElementById("new_password");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
    $(document).ready(function() {
      
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script><!-- 
  <script type="text/javascript">
    Swal.fire(
      'Good job!',
      'You clicked the button!',
      'success'
    )
  </script> -->
</body>

</html>