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

  
</head>

<body>
  <section id="container">
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="student_home.php" class="logo"><b>DASH<span>BOARD</span></b></a>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="logout.php">Logout</a></li>
        </ul>
      </div>
    </header>
    
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <h5 class="centered"><?php echo $_SESSION['SNAME'];?></h5>
          <li class="mt">
            <a href="student_home.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="sub">
            <a class="active" href="edit_details.php">
              <i class="fa fa-pencil"></i>
              <span>Edit Personal Details</span>
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
            <a href="change_pass_student.php">
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
    <?php
      if(isset($_SESSION['SID']))
      {
        $id = $_SESSION['SID'];
        $query = "SELECT * FROM student_details WHERE SID='$id'";
        $results = mysqli_query($db, $query);
        $ro=$results->fetch_assoc();
        $address=$ro['ADDRESS'];
        $email=$ro['EMAIL'];
        $phone=$ro['PHONE'];
        $hobby=$ro['HOBBY'];
        $issue=$ro['ISSUE'];
      }
    ?>
     <section id="main-content">
      <section class="wrapper site-min-height">
    <h3><i class="fa fa-angle-right"></i>Mentoring Form</h3>
       
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel" style="width: 75%;margin: auto;">
              <h4 class="mb"><i class="fa fa-angle-right"></i>Details</h4>
              <form class="form-horizontal style-form" method="post">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">Student ID</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="rollno" value="<?php echo $ro['SID'] ?>" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label"  style="font-size: 17px;">First Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="fname" value="<?php echo $ro['FNAME'] ?>" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">Middle Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="mname" value="<?php echo $ro['MINAME'] ?>" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">Last Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="lname" value="<?php echo $ro['LNAME'] ?>" disabled>
                  </div>
                </div>
                            <div class="form-group" >
                                <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">Date of Birth</label>
                                  <div class="col-md-3 col-xs-11">
                                    <input class="form-control form-control-inline input-medium default-date-picker" size="16" type="text" value="" data-date-format="yyyy/mm/dd" name="date" placeholder="<?php echo $ro['DOB'] ?>" disabled>
                    
                                  </div>
                            </div>

                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">Address</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" required style="height: 100px" name="address" ><?php echo $address?></textarea>
                  </div>
                </div>
                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">E-mail</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" required name="email" value="<?php echo $email?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">Phone</label>
                  <div class="col-sm-10">
                    <input type="text"  maxlength="10" class="form-control" required name="phone" value="<?php echo $phone ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">Board Marks</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="bmarks" value="<?php echo $ro['BMARK'] ?>" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">JEE RANK</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="jrank" value="<?php echo $ro['JRANK'] ?>" disabled>
                  </div>
                </div>
               <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">Hobbies</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" required style="height: 100px" name="hobby"><?php echo $hobby ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">Issues If Any</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" style="height: 100px" name="issue" ><?php echo $issue ?></textarea>
                  </div>
                </div>
                <button type="submit" class="btn btn-theme" style="text-align: center;margin:auto;
  display:block;width: 300px;height: 40px;" name="update_detail">Submit</button>
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
