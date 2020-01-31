<?php include('server.php'); 
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
  <title>FORM</title>

  
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-fileupload/bootstrap-fileupload.css" />
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-datepicker/css/datepicker.css" />
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-daterangepicker/daterangepicker.css" />
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-timepicker/compiled/timepicker.css" />
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-datetimepicker/datertimepicker.css" />
 
  <link href="css2/style.css" rel="stylesheet">
  <link href="css2/style-responsive.css" rel="stylesheet">


  
</head>

<body style="background-color: grey">
  
     
        <h3 style="color: white;"><i class="fa fa-angle-right"></i>Mentoring Form</h3>
       
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel" style="width: 75%;margin: auto;">
              <h4 class="mb"><i class="fa fa-angle-right"></i>Details</h4>
              <form class="form-horizontal style-form" method="post">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">Student ID</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="rollno">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">First Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="fname">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">Middle Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="mname">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">Last Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="lname">
                  </div>
                </div>
                            <div class="form-group" >
                                <label class="control-label col-md-3" style="font-size: 17px;">Date of Birth</label>
                                  <div class="col-md-3 col-xs-11">
                                    <input class="form-control form-control-inline input-medium default-date-picker" size="16" type="text" value="" data-date-format="yyyy/mm/dd" name="date">
                                    <span class="help-block">Select date</span>
                                  </div>
                            </div>

                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">Address</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" required style="height: 100px" name="address"></textarea>
                  </div>
                </div>
                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" required name="email">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">Phone</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="phone" maxlength="10" pattern="[0-9]{10}">
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">Board Marks</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="bmarks">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">JEE RANK</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="jrank">
                  </div>
                </div>
               <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">Hobbies</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" required style="height: 100px" name="hobby"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">Issues If Any</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" style="height: 100px" name="issue"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label" style="font-size: 17px;">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" placeholder="" name="pass">
                  </div>
                </div>
                <button type="submit" class="btn btn-theme" style="text-align: center;margin:auto;
  display:block;width: 300px;height: 40px;" name="form_submit">Submit</button>
              </form>
            </div>
          </div>
        
        </div>
       
        
  </section>
  </section>
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
 
  <script src="lib/common-scripts.js"></script>
 
  <script src="lib/jquery-ui-1.9.2.custom.min.js"></script>
  <script type="text/javascript" src="lib/bootstrap-fileupload/bootstrap-fileupload.js"></script>
  <script type="text/javascript" src="lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="lib/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
  <script src="lib/advanced-form-components.js"></script>

</body>

</html>
