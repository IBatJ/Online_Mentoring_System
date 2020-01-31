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
                <a class="active" href="update_mform.php">
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



<script type="text/javascript">
        function showHide(checked)
        {
          if(checked==true)
          {
            $("#poorpd").fadeIn();
          }
          else
          {
            $("#poorpd").fadeOut();
          }
        }
        function showHide1(checked)
        {
          if(checked==true)
          {
            $("#attendancerd").fadeIn();
          }
          else
          {
            $("#attendancerd").fadeOut();
          }
        }
        function showHide2(checked)
        {
          if(checked==true)
          {
            $("#subjectdd").fadeIn();
          }
          else
          {
            $("#subjectdd").fadeOut();
          }
        }
        function showHide3(checked)
        {
          if(checked==true)
          {
            $("#studyd").fadeIn();
          }
          else
          {
            $("#studyd").fadeOut();
          }
        }
        function showHide4(checked)
        {
          if(checked==true)
          {
            $("#communicationd").fadeIn();
          }
          else
          {
            $("#communicationd").fadeOut();
          }
        }
        function showHide5(checked)
        {
          if(checked==true)
          {
            $("#behaved").fadeIn();
          }
          else
          {
            $("#behaved").fadeOut();
          }
        }
        function showHide6(checked)
        {
          if(checked==true)
          {
            $("#ufmd").fadeIn();
          }
          else
          {
            $("#ufmd").fadeOut();
          }
        }
        function showHide7(checked)
        {
          if(checked==true)
          {
            $("#careerd").fadeIn();
          }
          else
          {
            $("#careerd").fadeOut();
          }
        }
        function showHide8(checked)
        {
          if(checked==true)
          {
            $("#personald").fadeIn();
          }
          else
          {
            $("#personald").fadeOut();
          }
        }
        <?php
          if(isset($_SESSION['SID']))
          {

            ?>
    </script>


      <?php
        $id = $_SESSION['SID'];
          $query = "SELECT * FROM mentoring_details WHERE SID='$id'";
      $results = mysqli_query($db, $query);
      $ro=$results->fetch_assoc();
        $poorp =$ro['POORP'];
        $attendancer = $ro['ATTENDANCER']; 
         $subjectd = $ro['SUBJECTD'];
         $study = $ro['STUDY']; 
         $communication = $ro['COMMUNICATION']; 
         $behave = $ro['BEHAVE']; 
         $personal = $ro['PERSONAL'];   
         $career = $ro['CAREER']; 
         $ufm =$ro['UFM']; 

      ?>
    <section id="main-content">
      <section class="wrapper site-min-height">
    <h3><i class="fa fa-angle-right"></i>Update Mentoring Form</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel" style="width: 75%;margin: auto;">
              <h4 class="mb"><i class="fa fa-angle-right"></i>Update Difficulties Faced</h4>
              <form class="form-horizontal style-form" method="post">
                <div class="checkbox" style="font-size: 17px;">
                <label>
                  <input type="checkbox"  value="" id="poorp" onchange="showHide(this.checked)">
                  Poor Performance in Exam
                  </label>
              </div>
              <div class="form-group" style="display: none;" id="poorpd">
                  <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">Your Issue</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" style="height: 250px;" name="poorp"><?php echo $poorp?></textarea>
                  </div>
                </div>
                <div class="checkbox" style="font-size: 17px;">
                <label>
                  <input type="checkbox"  value="" id="attendancer" onchange="showHide1(this.checked)">
                  Attendance Related Problem
                  </label>
              </div>
              <div class="form-group" style="display: none;" id="attendancerd">
                  <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">Your Issue</label>
                  <div class="col-sm-10">
                    <textarea class="form-control"  name="attendancer" style="height: 250px;"><?php echo $attendancer?></textarea>
                  </div>
                </div>
                <div class="checkbox" style="font-size: 17px;">
                <label>
                  <input type="checkbox"  value="" id="subjectd" onchange="showHide2(this.checked)">
                 Subject Related Difficulty
                  </label>
              </div>
              <div class="form-group" style="display: none;" id="subjectdd">
                  <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">Your Issue</label>
                  <div class="col-sm-10">
                    <textarea class="form-control"  name="subjectd" style="height: 250px;"><?php echo $subjectd?></textarea>
                  </div>
                </div>
                <div class="checkbox" style="font-size: 17px;">
                <label>
                  <input type="checkbox"  value="" id="study" onchange="showHide3(this.checked)">
                  Study (Assignments/Tutorials/Lab)
                  </label>
              </div>
              <div class="form-group" style="display: none;" id="studyd">
                  <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">Your Issue</label>
                  <div class="col-sm-10">
                    <textarea class="form-control"  name="study" style="height: 250px;"><?php echo $study?></textarea>
                  </div>
                </div>
                <div class="checkbox" style="font-size: 17px;">
                <label>
                  <input type="checkbox"  value="" id="communication" onchange="showHide4(this.checked)">
                  Communication
                  </label>
              </div>
              <div class="form-group" style="display: none;" id="communicationd">
                  <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">Your Issue</label>
                  <div class="col-sm-10">
                    <textarea class="form-control"  name="communication" style="height: 250px;"><?php echo $communication?></textarea>
                  </div>
                </div>
                <div class="checkbox" style="font-size: 17px;">
                <label>
                  <input type="checkbox"  value="" id="behave" onchange="showHide5(this.checked)">
                  Behaviour
                  </label>
              </div>
              <div class="form-group" style="display: none;" id="behaved">
                  <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">Your Issue</label>
                  <div class="col-sm-10">
                    <textarea class="form-control"  name="behave" style="height: 250px;"><?php echo $behave?></textarea>
                  </div>
                </div>
                <div class="checkbox" style="font-size: 17px;">
                <label>
                  <input type="checkbox"  value="" id="ufm" onchange="showHide6(this.checked)">
                 Exam UFM
                  </label>
              </div>
              <div class="form-group" style="display: none;" id="ufmd">
                  <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">Your Issue</label>
                  <div class="col-sm-10">
                    <textarea class="form-control"  name="ufm" style="height: 250px;"><?php echo $ufm?></textarea>
                  </div>
                </div>
                <div class="checkbox" style="font-size: 17px;">
                <label>
                  <input type="checkbox"  value="" id="career" onchange="showHide7(this.checked)">
                  About Career (Placement/Competitive Exam)
                  </label>
              </div>
              <div class="form-group" style="display: none;" id="careerd">
                  <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">Your Issue</label>
                  <div class="col-sm-10">
                    <textarea class="form-control"  name="career" style="height:250px; "><?php echo $career?></textarea>
                  </div>
                </div>
                <div class="checkbox" style="font-size: 17px;">
                <label>
                  <input type="checkbox"  value="" id="personal" onchange="showHide8(this.checked)">
                  Personal(Stress/Depression/Health/Friendship/Peer Pressure/Competition/Home Sickness/etc.)
                  </label>
              </div>
              <div class="form-group" style="display: none;" id="personald">
                  <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">Your Issue</label>
                  <div class="col-sm-10">
                    <textarea class="form-control"  name="personal" style="height:250px; "><?php echo $personal?></textarea>
                  </div>
                </div>
                <br>
                <button type="submit" class="btn btn-theme" style="text-align: center;margin:auto;
  display:block;width: 100px;height: 30px;" name="update_mentoring_form">Update</button>
              </form>
            </div>
          </div>
         
        </div>
      </section>
      
    </section>
    <?php
  }?>


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
