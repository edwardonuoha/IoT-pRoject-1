            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $_SESSION['name'];?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

<!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="dashboard.php"><i class="fa fa-home"></i> Sensor Records </a>
                  </li>
                    <?php if($_SESSION['role']=='1'){ ?>
                  <li><a><i class="fa fa-users"></i> User <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="add_user.php">Add User</a></li>
                      <li><a href="user_list.php">User List</a></li>
                    </ul>
                  </li>
                   <li><a href="add_greenhouse.php"><i class="fa fa-home"></i> Add Building</a></li>
                   <li><a href="assign.php"><i class="fa fa-building"></i> Assign User to Building</a></li>
                  <?php } ?> 
                                    <li><a><i class="fa fa-user"></i> Building <span class="fa fa-chevron-down"></span></a>
               
                    <ul class="nav child_menu">
                           <?php 
                  
                        include('connection.php');
                        if($_SESSION['role']==2){
                     $result = mysqli_query($con,'SELECT * FROM assign_building
INNER JOIN building ON assign_building.building_id=building.id WHERE assign_building.user_id='.$_SESSION['id']);
                   while($row = mysqli_fetch_array($result))
                  { 
                              
                  
                  ?>
                      <li><a href="greenhouse_record.php?building_id=<?php echo $row['building_id'];?>"><?php echo $row['name'];?></a></li>
                      <?php
                       } 
                        }else { 
                              $result = mysqli_query($con,'SELECT * FROM building'); 
 while($row = mysqli_fetch_array($result))
                  {?>
    <li><a href="greenhouse_record.php?building_id=<?php echo $row['id'];?>"><?php echo $row['name'];?></a></li>

                      <?php  } } ?>
              

                    </ul>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->
                        <!-- /menu footer buttons -->
 <!--            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div> -->
            <!-- /menu footer buttons -->