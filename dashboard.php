<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>eps32 Dashboard</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <!-- Datatables -->
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.css" rel="stylesheet">
    <style type="text/css">
      .table thead tr th {
        text-align: center;
      }
       .table tbody tr td {
        text-align: center;
      }
    </style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="dashboard.php" class="site_title text-center"> <span>eps32</span></a>
            </div>

            <div class="clearfix"></div>



          <?php include('layout/sidebar.php');?> 


          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <?php echo $_SESSION['name'];?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">

                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>

            <div class="row">

                                 <?php 
          if(isset($_SESSION["success"])){ ?>
          <p class="message" style="color: green;font-size: 16px;font-weight: bold;"><?php echo $_SESSION["success"];?></p>
        <?php 
        unset($_SESSION["success"]);
      }
          if(isset($_SESSION["error"])){ ?>
          <p class="message" style="color: red;font-size: 16px;font-weight: bold;"><?php echo $_SESSION["error"];?></p>
        <?php  
unset($_SESSION["error"]);
      }
          ?>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>ESP32 DHT11 Sensor Database</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   
					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                           <th>ID</th>
                    <th>Date and Time</th>
                    <th>Temperature</th>
                    <th>Humidity</th>
                    <th>PPM</th>
                        </tr>
                      </thead>
                      <tbody>
                  <?php
                  include('connection.php');
                  $result = mysqli_query($con,'SELECT * FROM data ORDER BY id DESC');
                  while($row = mysqli_fetch_array($result))
                  { 
                    if(mysqli_num_rows($result)>=1){
                    ?>
                    <tr>
                      <td><?php echo $row['id'];?></td>
                      <td><?php echo $row['event'];?></td>
                      <?php if($row['temperature']>30){?>
                      <td style="background: #DC3545;color: #fff;"><?php echo $row['temperature'];?></td>
                  <?php   }else { ?>
                    <td><?php echo $row['temperature'];?></td>
                <?php  }?>
                   <?php if($row['humidity']>8){?>
                      <td style="background: #DC3545;color: #fff;"><?php echo $row['humidity'];?></td>
                  <?php   }else { ?>
                    <td><?php echo $row['humidity'];?></td>
                <?php  }?>
                      <?php if($row['ppm']>300){?>
                      <td style="background: #DC3545;color: #fff;"><?php echo $row['ppm'];?></td>
                  <?php   }else { ?>
                    <td><?php echo $row['ppm'];?></td>
                <?php  }?>
                     

                    </tr>

                    <?php } else {?>
                    <tr>
                      <td colspan="6">No Records Found.</td>

                    </tr>

                    <?php } }
                    ?>
                    
                      </tbody>
                    </table>
					
					
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>

    <!-- Datatables -->
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
   
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>

  </body>
</html>