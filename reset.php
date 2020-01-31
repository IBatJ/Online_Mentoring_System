<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["AID"]))
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
      
      <a href="admin_home.php" class="logo"><b>DASH<span>BOARD</span></b></a>
      
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="logout.php">Logout</a></li>
        </ul>
      </div>
    </header>
   
    <aside>
      <div id="sidebar" class="nav-collapse ">
        
        <ul class="sidebar-menu" id="nav-accordion">
          
          <h5 class="centered"><?php echo $_SESSION['ANAME'];?></h5>
          <li class="mt">
            <a href="admin_home.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-users"></i>
              <span>Mentor Allocation</span>
              </a>
            <ul class="sub">
              <li><a href="select_mentor.php">Group Allocation</a></li>
              <li><a href="individual_select.php">Allocate Individually</a></li>
            </ul>
          </li>
           <li class="sub-menu">
            <a class="active" href="reset.php">
              <i class="fa fa-rotate-right"></i>
              <span>Reset Contraints</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="view_blacklist.php">
              <i class="fa fa-times-circle"></i>
              <span>View Blacklist</span>
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
            <div class="form-panel" style="width: 80%;margin: auto;">
              <h2 class="mb" align="center">NOTE</h2>
              <form class="form-horizontal style-form" method="post">
                <div class="form-group">
                        <p style="margin: auto;text-align: center;font-size: 20px;">This is to notify Admin that on clicking the below button the semester of all the students</p>
                        <p style="margin: auto;text-align: center;font-size: 20px;">will change. And clicking on it once there is no method of reverting back. All the data of </p><p style="margin: auto;text-align: center;font-size: 20px;">the current semester will be wiped off. All the respected assigned mentors will be unas</p><p style="margin-left:135px;font-size: 20px;">-signed. And all the students will be allocated new semester.</p>
                      </div>
                        <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">Pasword</label>
                          <div class="col-sm-10">
                            <input type="password" class="form-control" required name="pass">
                          </div>
                        </div>
                        <button type="submit" class="btn btn-theme" style="text-align: center;margin:auto;
  display:block;width: 150px;height: 40px;" name="reset">Add New Semester</button>
                  <?php
                        if(isset($_POST['reset']))
                        {
                            $id = $_SESSION['AID'];
                            $q = "SELECT * FROM admin WHERE AID = '$id'";
                            $run = mysqli_query($db,$q);
                            $ro = $run->fetch_assoc();
                            $password = mysqli_real_escape_string($db, $_POST['pass']);
                            if($ro['APASS']==$password)
                            {

                            $query = "SELECT * FROM student_details";
                            $res = mysqli_query($db , $query);
                            $n = mysqli_num_rows($res);

                            for($i=0;$i<$n;$i++)
                            {
                                $row = mysqli_fetch_array($res);
                                $cl1 = $row['SID'];
                                $cl2 = $row['SEMESTER'];
                                $cl3 = $row['MID'];
                                $cl4 = $row['FNAME'];
                                $cl5 = $row['MINAME'];
                                $cl6 = $row['LNAME'];
                                $cl7 = $row['DOB'];
                                $cl8 = $row['ADDRESS'];
                                $cl9 = $row['EMAIL'];
                                $cl10 = $row['BMARK'];
                                $cl11 = $row['JRANK'];
                                $cl12 = $row['HOBBY'];
                                $cl13 = $row['ISSUE'];
                                $cl14 = $row['PHONE'];
                                $sql = "INSERT INTO previous_student_details(SID,SEMESTER,MID,FNAME,MINAME,LNAME,DOB,ADDRESS,EMAIL,BMARK,JRANK,HOBBY,ISSUE,PHONE) values('$cl1','$cl2','$cl3','$cl4','$cl5','$cl6','$cl7','$cl8','$cl9','$cl10','$cl11','$cl12','$cl13','$cl14')";
                                mysqli_query($db , $sql);
                            }
                            $query = "SELECT * FROM mentoring_details";
                            $res = mysqli_query($db , $query);
                            $n = mysqli_num_rows($res);

                            for($i=0;$i<$n;$i++)
                            {
                              $row = mysqli_fetch_array($res);
                                $cl1 = $row['POORP'];
                                $cl2 = $row['ATTENDANCER'];
                                $cl3 = $row['SUBJECTD'];
                                $cl4 = $row['STUDY'];
                                $cl5 = $row['COMMUNICATION'];
                                $cl6 = $row['BEHAVE'];
                                $cl7 = $row['UFM'];
                                $cl8 = $row['CAREER'];
                                $cl9 = $row['PERSONAL'];
                                $cl10 = $row['SID'];
                                $cl11 = $row['MID'];
                                $cl12 = $row['SEMESTER'];
                                $sql = "INSERT INTO previous_mentoring_details(SID,SEMESTER,MID,POORP,ATTENDANCER,SUBJECTD,STUDY,COMMUNICATION,BEHAVE,UFM,CAREER,PERSONAL) values('$cl10','$cl11','$cl12','$cl1','$cl2','$cl3','$cl4','$cl5','$cl6','$cl7','$cl8','$cl9')";
                                mysqli_query($db , $sql);
                            }
                            $query = "DELETE FROM student_details WHERE 1";
                            $res = mysqli_query($db , $query);
                            
                            $query = "DELETE FROM mentoring_details WHERE 1";
                            $res = mysqli_query($db , $query);

                            $query = "SELECT * FROM student";
                            $res = mysqli_query($db , $query);
                            $n = mysqli_num_rows($res);

                            for($i=0;$i<$n;$i++)
                            {
                                $row = mysqli_fetch_array($res);
                                $id = $row['SID'];
                                $SEM = $row['SEMESTER'];
                                $SEM = $SEM + 1;
                                $nquery = "UPDATE student SET FLAG='0',MID='0',SEMESTER='$SEM',FACTION='0',ASSIGNED='0' WHERE SID = '$id'";
                                mysqli_query($db , $nquery);
                            }
                            $query = "UPDATE mentor SET ASSIGNED='0' WHERE 1";
                            $res = mysqli_query($db , $query);
                            
                            }
                            $query = "DELETE FROM messages WHERE 1";
                            $res = mysqli_query($db , $query);
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
