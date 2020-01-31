<?php include"server.php";
  
  if(!isset($_SESSION["MID"]))
  {
    echo"<script>window.open('home.php?mes=Access Denied..','_self');</script>";
    
  } 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title></title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="css2/style.css" rel="stylesheet">
  <link href="css2/style-responsive.css" rel="stylesheet">
  <script src="lib/chart-master/Chart.js"></script>

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="mentor_home.php" class="logo"><b>DASH<span>BOARD</span></b></a>
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="logout.php">Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          
          <h5 class="centered"><?php echo $_SESSION['MNAME'];?></h5>
          <li class="mt">
            <a href="mentor_home.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
         <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-tasks"></i>
              <span>View Mentee Forms</span>
              </a>
            <ul class="sub">
              <li><a href="view_mentee.php">Personal Details</a></li>
              <li><a href="view_mentee_form.php">Mentoring Form</a></li>
              <li><a href="view_not_filled.php">View Not Filled</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a class="active"href="javascript:;">
              <span style="font-size: 1.05rem;"><i class="fa fa-tasks"></i>View Previous Semester's Forms</span>
              </a>
            <ul class="sub">
              <li class="active"><a href="view_previous_sem.php">Previous Personal Details</a></li>
              <li><a href="view_previous_mentoring.php">Previous Mentoring Form</a></li>
            </ul>
          </li>
          <li class="sub">
            <a href="mentor_mess.php">
              <i class="fa fa-comments-o"></i>
              <span>Messages</span>
              <span class="label label-theme pull-right mail-info">
                <?php
                    $id=$_SESSION['MID'];
                    $query = "SELECT * FROM messages WHERE receiver_id='$id' AND rflag='0'";
                    $run = mysqli_query($db,$query);
                    $n = mysqli_num_rows($run);
                    echo $n;
                ?>
              </span>
              </a>
          </li>
          <li class="sub">
            <a href="change_pass.php">
              <i class="fa fa-gear"></i>
              <span>Change Password</span>
              </a>
          </li>
          <li class="sub">
            <a href="faq.html">
              <i class="fa fa-question"></i>
              <span>FAQ</span>
              </a>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>





    <section id="main-content">
      <section class="wrapper site-min-height">
        <br>
        <br>
    <?php  if (isset($_SESSION['MID'])) { 
        $id="";
        ?>
      <!--<p>Welcome Mentor <strong><?php echo $_SESSION['MID']; ?></strong></p>
      <?php  ?>-->
      <?php 
          $MID=$_SESSION['MID'];
            $query = "SELECT * FROM student WHERE MID='$MID'";
            $results = mysqli_query($db, $query);
            $n = mysqli_num_rows($results);
        ?>
        <form action="#" method="POST">
       <select class="form-control" name="student" style="width: 200px;margin-left: 300px;">
                  <option>Choose Mentee to View</option>
        <?php
            for($i=1;$i<=$n;$i++)
            {
              $row = mysqli_fetch_array($results);
              $id = $row["SID"];
        ?>
        <option><?php echo $id?></option>
        <?php
            } 
      ?>

    </select>
    <select class="form-control" name="semester" style="width: 210px;margin-left: 800px;margin-top: -30px;">
                <option>Choose Semester to View</option>
                <?php

                      $query = "SELECT * FROM student WHERE MID='$MID'";
                      $results = mysqli_query($db, $query);
                      $ro = $results->fetch_assoc();
                      $id = $ro['SID'];
                      $sem = $ro['SEMESTER'];
                      $query = "SELECT * FROM previous_student_details WHERE SID='$id' AND SEMESTER < '$sem'";
                      $results = mysqli_query($db, $query);
                      $n = mysqli_num_rows($results);

                      for($i=0;$i<$n;$i++)
                      {
                          $row = mysqli_fetch_array($results);
                ?><option><?php echo $row['SEMESTER']; ?></option>
                <?php
                      }
                ?>
    </select>
    <br>
       <button type="submit" class="btn btn-theme" style="text-align: center;margin:auto;
  display:block;width: 150px;height: 40px;" name="submit">Submit</button>
    <?php
      $name="";
      $email="";
      if(isset($_POST['submit']))
      {
        $id = mysqli_real_escape_string($db, $_POST['student']);
        $sem = mysqli_real_escape_string($db, $_POST['semester']);
        $query = "SELECT * FROM previous_student_details WHERE SID='$id' AND SEMESTER='$sem'";
        $results = mysqli_query($db, $query);
        $ro = $results->fetch_assoc();
        $MID = $ro['MID'];
        $nq = "SELECT * FROM mentor WHERE MID='$MID'";
        $run = mysqli_query($db, $nq);
        $re = $run->fetch_assoc();
    ?>
    </form>
    <h3><i class="fa fa-angle-right"></i>Mentoring Form</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel" style="width: 75%;margin: auto;">
              <h4 class="mb"><i class="fa fa-angle-right"></i>Details</h4>
              <form class="form-horizontal style-form" method="post">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">Semester</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="rollno" value="<?php echo $ro['SEMESTER']?>" disabled>
                  </div>
                </div>
                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">Mentor's Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="rollno" value="<?php echo $re['MNAME'];?>" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">Student ID</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="rollno" value="<?php echo $ro['SID']?>" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">First Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="fname" value="<?php echo $ro['FNAME']?>" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">Middle Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="mname" value="<?php echo $ro['MINAME']?>" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">Last Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="lname" value="<?php echo $ro['LNAME']?>" disabled>
                  </div>
                </div>
                            <div class="form-group" >
                                <label class="control-label col-md-3" style="font-size: 17px;">Date of Birth</label>
                                  <div class="col-md-3 col-xs-11">
                                    <input class="form-control form-control-inline input-medium default-date-picker" size="16" type="text" value="" data-date-format="yyyy/mm/dd" name="date" placeholder="<?php echo $ro['DOB']?>" disabled>
                                    <span class="help-block">Select date</span>
                                  </div>
                            </div>

                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">Address</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" required style="height: 100px" name="address" placeholder="<?php echo $ro['ADDRESS']?>" disabled></textarea>
                  </div>
                </div>
                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" required name="email" value="<?php echo $ro['EMAIL']?>" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">Phone</label>
                  <div class="col-sm-10">
                    <input type="text"  maxlength="10" class="form-control" required name="phone" value="<?php echo $ro['PHONE']?>" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">Board Marks</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="bmarks" value="<?php echo $ro['BMARK']?>" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">JEE RANK</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="jrank" value="<?php echo $ro['JRANK']?>" disabled>
                  </div>
                </div>
               <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">Hobbies</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" required style="height: 100px" name="hobby" placeholder="<?php echo $ro['HOBBY']?>" disabled></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">Issues If Any</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" style="height: 100px" name="issue" placeholder="<?php echo $ro['ISSUE']?>" disabled></textarea>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- col-lg-12-->
        </div>
    <?php 
    }
    }?>
      </section>
      <!-- /wrapper -->
    </section>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
   
            <!--new earning end-->
            
    <footer class="site-footer">
      <div class="text-center">
        
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>

  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="lib/gritter-conf.js"></script>
</body>

</html>
