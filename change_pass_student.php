<?php include"server.php";
  
  if(!isset($_SESSION["SID"]))
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

  
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  
  <link href="css2/style.css" rel="stylesheet">
  <link href="css2/style-responsive.css" rel="stylesheet">
  <script src="lib/chart-master/Chart.js"></script>

  
</head>

<body>
  <section id="container">
   
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
     
      <a href="student_home.php" class="logo"><b>DASH<span>BOARD</span></b></a>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="logout.php">Logout</a></li>
        </ul>
      </div>
    </header>
    
    <aside>
      <div id="sidebar" class="nav-collapse ">
        
        <ul class="sidebar-menu" id="nav-accordion">
          <h5 class="centered">Welcome</h5>
          <h5 class="centered"><?php echo $_SESSION['SNAME'];?></h5>
          <li class="mt">
            <a href="student_home.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="sub">
            <a href="edit_details.php">
              <i class="fa fa-pencil"></i>
              <span>Edit Details</span>
              </a>
          </li>
          <?php
              if(isset($_SESSION['SID']))
              {
                $id=$_SESSION['SID'];
                $query = "SELECT * FROM student WHERE SID='$id'";
                $results = mysqli_query($db, $query);
                $ro=$results->fetch_assoc();
                if($ro['FACTION']==0)
                {
            ?>
            <li class="sub">
            <a href="new_mform.php">
              <i class="fa fa-book"></i>
              <span>Fill Mentoring Form</span>
              </a>
          </li>
          <?php
        }
              }?>
              <?php
                if ($ro['FACTION']==2) 
                {
                  
                ?>
                <li class="sub">
                <a href="update_mform.php">
                <i class="fa fa-book"></i>
                <span>Update Mentoring Form</span>
              </a>
          </li>
                <?php
                }
              ?>
              <li class="sub">
            <a href="student_mess.php">
              <i class="fa fa-comments-o"></i>
              <span>Messages</span>
              <span class="label label-theme pull-right mail-info">
                <?php
                    $id=$_SESSION['SID'];
                    $query = "SELECT * FROM messages WHERE receiver_id='$id'";
                    $run = mysqli_query($db,$query);
                    $n = mysqli_num_rows($run);
                    echo $n;
                ?>
              </span>
              </a>
          </li>
          <li class="sub">
            <a class="active" href="change_pass_student.php">
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
       
      </div>
    </aside>
     <section id="main-content">
      <section class="wrapper site-min-height">
        <div class="row mt">
              <div class="col-lg-12">
                <div class="form-panel" style="width: 65%;margin: auto;">
                  <h4 class="mb" align="center">Change Password</h4>
                  <form class="form-horizontal style-form" method="post">
                      <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">Old Password</label>
                          <div class="col-sm-10">
                            <input type="password" class="form-control" required name="old_pass">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">New Password</label>
                          <div class="col-sm-10">
                            <input type="password" class="form-control" required name="new_pass">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">Confirm Password</label>
                          <div class="col-sm-10">
                            <input type="password" class="form-control" required name="confirm_pass">
                          </div>
                        </div>
                        <button type="btn" class="btn btn-theme" style="text-align: center;margin:auto;
  display:block;width: 100px;height: 40px;" name="change">Change</button>
                    <?php
                      if(isset($_POST['change']))
                      {
                          $old_pass = mysqli_real_escape_string($db, $_POST['old_pass']);
                          $new_pass = mysqli_real_escape_string($db, $_POST['new_pass']);
                          $confirm_pass = mysqli_real_escape_string($db, $_POST['confirm_pass']);
                          $id=$_SESSION['SID'];
                          $query = "SELECT * FROM student WHERE SID='$id'";
                          $run = mysqli_query($db, $query);
                          $ro = $run->fetch_assoc();
                          if($new_pass!=$confirm_pass)
                          {
                            echo "Enter Correctly";
                          }
                          if($old_pass==$ro['SPASS'])
                          {
                              if($new_pass==$confirm_pass)
                              {
                                  $q = "UPDATE student SET SPASS='$new_pass' WHERE SID='$id'";
                                  mysqli_query($db, $q);
                              }
                          }
                      }

                  ?>
                  </form>
                </div>
              </div>
            </div>
          </section>
        </section>
            
    <footer class="site-footer">
      <div class="text-center">
        
    </footer>
   
  </section>
  
  <script src="lib/jquery/jquery.min.js"></script>

  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="lib/jquery.sparkline.js"></script>
 
  <script src="lib/common-scripts.js"></script>
  <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="lib/gritter-conf.js"></script>
</body>

</html>
