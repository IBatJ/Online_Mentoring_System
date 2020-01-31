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
            <a class="active" href="student_mess.php">
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
                    
            ?>
    <section id="main-content">
      <section class="wrapper site-min-height">

        <h2><i class="fa fa-comments-o"></i> Mentoring Message System</h2>
        <div class="row mt">
          <div class="col-lg-12">
            
          <br>
          <br>

         <div class="form-panel" style="width: 65%;margin: auto;border-radius: 10px;height: 80vh;">
              <form class="form-horizontal style-form" method="post">
                <div style="display: grid;align-content: center;align-items: center; background: #4ECDC4;width: 843px;height: 70px;margin-left: -10px;margin-top: -10px;border-radius: 10px 10px 0 0;text-align: center;font-weight: bold;font-size: 2rem;color: #f2f2f2">
        <?php
                $id = $_SESSION['SID'];
                $query = "SELECT * FROM student WHERE SID = '$id'";
                $run = mysqli_query($db,$query);
                $ro = $run->fetch_assoc();
                $MID = $ro['MID'];
                $query = "SELECT * FROM mentor WHERE MID ='$MID'";
                $run = mysqli_query($db,$query);
                $ro = $run->fetch_assoc();
        ?>      <span><?php echo $ro['MNAME'];?></span>
                </div>
                <style type="text/css">
                  ::-webkit-scrollbar
                    {
                      display: none;
                    }
                </style>
                <div style="display: flex;flex-direction: column;padding: 0 20px;overflow-y: scroll;height: 450px;background: #f2f2f2;width: 843px;margin-left: -10px;">

                   <?php
                          $query = "SELECT * FROM messages";
                          $run = mysqli_query($db,$query);
                          $n = mysqli_num_rows($run);
                          for($i=0;$i<$n;$i++)
                          {
                            $row = (mysqli_fetch_array($run));
                            if($row['sender_id']==$_SESSION['SID'] OR $row['receiver_id']==$_SESSION['SID'])
                            {
                              if($row['receiver_id']==$MID AND $row['sender_id']==$_SESSION['SID'])
                              {

                ?>
                        <div class="message-row you-message" style="display: grid;margin-bottom: 20px;justify-content: end;justify-items:end;">
                          <div class="message-content" style="display: grid;justify-items:end;">
                            <div class="message-text" style="padding: 9px 14px;font-size: 1.6rem;margin-bottom: 5px;margin-top:5px;background: #4ECDC4;color: #f2f2f2;border :1px solid #4ECDC4;border-radius: 14px 14px 0 14px;"><?php echo $row['message'];?></div>
                            </div>
                            <div style="font-size: .75rem;"><?php echo $row['dat'];?></div>
                            <div style="font-size: .75rem;"><?php echo $row['tim'];?></div>
                            <div style="font-size:1.1rem"><?php if($row['rflag']==0){?><i class="fa fa-check"></i><?php } else { ?><i class="fa fa-check-circle"></i><?php }?></div>
                          </div>  
                          <?php

                              }
                          ?>
                          <?php

                            if($row['receiver_id']==$_SESSION['SID'] AND $row['sender_id']==$MID)
                            {
                                $id = $_SESSION['SID'];
                                $query = "UPDATE messages SET rflag='1' WHERE sender_id='$MID' AND receiver_id='$id'";
                                mysqli_query($db,$query);
                              ?>
                    <div class="message-row other-message" style="display: grid;margin-bottom: 20px;justify-content: start;justify-items:start;">
                        <div class="message-content" style="display: grid;justify-content: start;justify-items:start;">
                          <div class="message-text" style="margin-top: 5px;padding: 9px 14px;font-size: 1.6rem;margin-bottom: 5px;background: #d1d1d1;color: black;border :1px solid #e1e1e1;border-radius: 14px 14px 14px 0px;"><?php echo $row['message'];?></div>
                            <div style="font-size: .75rem;"><?php echo $row['dat'];?></div>
                            <div style="font-size: .75rem;"><?php echo $row['tim'];?></div>
                        </div>
                      </div>
                      <?php

                            }
                          }
                        }
                        ?>

                </div>
                <div id="chat-form" style="display: grid;background: #4ECDC4;height: 84px;width:843px;margin-left: -10px;border-radius: 0 0 10px 10px;">
                  
                    <input type="text" name="smessage" style="width: 700px;height: 50px;margin: auto;margin-top:15px;background: #f2f2f2;border-radius: 30px 30px 30px 30px;border:transparent;margin-left: 35px;text-align: center;font-weight: bold;font-size: 1.5rem;color: black" placeholder="Type a message...">

                    <button name="send" class="send" style="width:50px;height: 45px;margin-top: -57px;margin-left: 760px;background: #f2f2f2;border:transparent;border-radius: 15px;font-size: 25px;text-align: center;"><i class="fa fa-location-arrow"></i></button>
                  
                
                </div>

                <?php

                      if(isset($_POST['send']))
                      {
                          $message = mysqli_real_escape_string($db, $_POST['smessage']);
                          $id = $_SESSION['SID'];
                          $dat = date("d-m-Y");
                          $tim = date("H:i");
                          if(!empty($message))
                          {
                              $query = "INSERT INTO messages(message_id,sender_id,message,receiver_id,dat,tim,rflag)
                                VALUES ('','$id','$message','$MID','$dat','$tim','0')";
                              mysqli_query($db,$query);
                              
                              ?>
                              <script> location.replace("student_mess.php"); </script>
                          <?php
                          }
                      }
                ?>

        <?php

          }

        ?>
              </form>
            </div>
          </div>
        </div>
      </section>
    </section>
            
   
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
