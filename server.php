<?php
session_start();

// initializing variables
$uname = "";
$email    = "";
$errors = array(); 
$rollno ="";
$name="";
$id="";
$fname="";
$lname="";
$mname="";
$dob="";
$address="";
$password="";
$issue="";
$bmarks="";
$jrank="";
$hobby="";
$phone="";


$poorp="";
$attendancer="";
$subjectd="";
$study="";
$communication="";
$behave="";
$personal="";
$career="";
$ufm="";
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'mentor');

// LOGIN USER
if (isset($_POST['admin_log'])) {
  $uname = mysqli_real_escape_string($db, $_POST['admin_name']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($uname)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$query = "SELECT * FROM admin WHERE ANAME='$uname' AND APASS='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) 
    {
      $ro=$results->fetch_assoc();
  	  $_SESSION['ANAME'] = $uname;
      $_SESSION['AID']=$ro["AID"];
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: admin_home.php');
  	}
    else {
  		array_push($errors, "Invalid username/password Try Again !");
  	}
  }
}
if(isset($_POST['student_log']))
{
  $id = mysqli_real_escape_string($db, $_POST['student_name']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  if (empty($id)) {
    array_push($errors, "ID is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }
  if (count($errors) == 0) {
    $query = "SELECT * FROM student WHERE SID ='$id' AND SPASS='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) 
    {
      $ro=$results->fetch_assoc();
      $name = $ro['SNAME'];
      if($ro["FLAG"]==0)
      {
          $_SESSION['SID']=$id;
          header('location: form.php');
      }
      else
      {
        $_SESSION['SID']=$id;
        $_SESSION['SNAME']=$name;
        $_SESSION['success'] = "You are now logged in";
        header('location: student_home.php');
      }
    }
    else {
      array_push($errors, "Invalid username/password Try Again !");
    }
  }
}
if(isset($_POST['mentee_reg']))
{
  $id = mysqli_real_escape_string($db, $_POST['rollno']);
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['pass']);

  if (empty($name)) {
    array_push($errors, "Username is required");
  }
  if (empty($id)) {
    array_push($errors, "Rollno is required");
  }
  if (empty($email)) {
    array_push($errors, "Email is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) 
  {
      $sql = "INSERT INTO student_details(rollno,SNAME,email) VALUES ('$id','$name','$email')";
      mysqli_query($db , $sql);
      $query = "SELECT * FROM student WHERE SID='$id' AND SPASS='$password'";
      $results = mysqli_query($db, $query);
      $ro=$results->fetch_assoc();
      $sql="";
      $sql = "UPDATE student SET FLAG = '1' WHERE SID='$id'";
      mysqli_query($db , $sql);
      $results="";
      $query = "SELECT * FROM student WHERE SID='$id' AND SPASS='$password'";
      $results = mysqli_query($db, $query);
     if (mysqli_num_rows($results) == 1) 
      {
        $ro=$results->fetch_assoc();
        $_SESSION['SID'] = $id;
        $_SESSION['SNAME'] = $name;
        $_SESSION['success'] = "You are now logged in";
        header('location: student_home.php');
      }
    else {
      array_push($errors, "Invalid username/password Try Again !");
    }
  }
}
if(isset($_POST['mentor_log']))
{
  $email = mysqli_real_escape_string($db, $_POST['uname']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  if (empty($email)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }
  if (count($errors) == 0) {
    $query = "SELECT * FROM mentor WHERE EMAIL='$email' AND MPASS='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) 
    {
        $ro=$results->fetch_assoc();
        $_SESSION['EMAIL'] = $email;
        $_SESSION['MNAME'] = $ro['MNAME'];
        $_SESSION['MID']=$ro['MID'];
        $_SESSION['success'] = "You are now logged in";
        header('location: mentor_home.php');
    }
    else {
      array_push($errors, "Invalid username/password Try Again !");
    }
  }
}
if(isset($_POST['form_submit']))
{
      $id = mysqli_real_escape_string($db, $_POST['rollno']);
      $fname = mysqli_real_escape_string($db, $_POST['fname']);
      $mname = mysqli_real_escape_string($db, $_POST['mname']);
      $lname = mysqli_real_escape_string($db, $_POST['lname']);
      $dob = mysqli_real_escape_string($db, $_POST['date']);
      $address = mysqli_real_escape_string($db, $_POST['address']);
      $email = mysqli_real_escape_string($db, $_POST['email']);
      $phone = mysqli_real_escape_string($db, $_POST['phone']);
      $bmarks = mysqli_real_escape_string($db, $_POST['bmarks']);
      $jrank = mysqli_real_escape_string($db, $_POST['jrank']);
      $hobby = mysqli_real_escape_string($db, $_POST['hobby']);
      $issue = mysqli_real_escape_string($db, $_POST['issue']);
      $password = mysqli_real_escape_string($db, $_POST['pass']);

  if (empty($fname)) {
    array_push($errors, "Name is required");
  }
  if (empty($lname)) {
    array_push($errors, "Name is required");
  }
  if (empty($mname)) {
    array_push($errors, "Name is required");
  }
  if (empty($dob)) {
    array_push($errors, "Name is required");
  }
  if (empty($address)) {
    array_push($errors, "Name is required");
  }
  if (empty($bmarks)) {
    array_push($errors, "Name is required");
  }
  if (empty($jrank)) {
    array_push($errors, "Name is required");
  }
  if (empty($hobby)) {
    array_push($errors, "Name is required");
  }
  if (empty($issue)) {
    array_push($errors, "Name is required");
  }
  if (empty($id)) {
    array_push($errors, "ID is required");
  }
  if (empty($email)) {
    array_push($errors, "Email is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) 
  {
      $rquery = "SELECT * FROM student WHERE SID='$id'";
      $run = mysqli_query($db , $rquery);
      $ro =  $run->fetch_assoc();
      $MID = $ro['MID'];
      $SEM = $ro['SEMESTER'];
      $sql = "INSERT INTO student_details(SID,SEMESTER,FNAME,MINAME,LNAME,DOB,ADDRESS,EMAIL,BMARK,JRANK,HOBBY,ISSUE,PHONE,MID) VALUES ('$id','$SEM','$fname','$mname','$lname','$dob','$address','$email','$bmarks','$jrank','$hobby','$issue','$phone','$MID')";
      mysqli_query($db , $sql);
      $query = "SELECT * FROM student WHERE SID='$id' AND SPASS='$password'";
      $results = mysqli_query($db, $query);
      $ro=$results->fetch_assoc();
      $sql="";
      $sql = "UPDATE student SET FLAG = '1' WHERE SID='$id'";
      mysqli_query($db , $sql);
      $results="";
      $query = "SELECT * FROM student WHERE SID='$id' AND SPASS='$password'";
      $results = mysqli_query($db, $query);
     if (mysqli_num_rows($results) == 1) 
      {
        $ro=$results->fetch_assoc();
        $_SESSION['SID'] = $id;
        $_SESSION['SNAME'] = $name;
        $_SESSION['success'] = "You are now logged in";
        header('location: student_home.php');
      }
    else {
      array_push($errors, "Invalid username/password Try Again !");
    }
  }
}
if(isset($_POST['update_detail']))
{
      $address = mysqli_real_escape_string($db, $_POST['address']);
      $email = mysqli_real_escape_string($db, $_POST['email']);
      $phone = mysqli_real_escape_string($db, $_POST['phone']);
      $hobby = mysqli_real_escape_string($db, $_POST['hobby']);
      $issue = mysqli_real_escape_string($db, $_POST['issue']);
  if (empty($address)) {
    array_push($errors, "Name is required");
  }
  if (empty($hobby)) {
    array_push($errors, "Name is required");
  }
  if (empty($issue)) {
    array_push($errors, "Name is required");
  }
  if (empty($phone)) {
    array_push($errors, "Name is required");
  }
  if (empty($email)) {
    array_push($errors, "Name is required");
  }

  if (count($errors) == 0) 
  {
    $id=$_SESSION['SID'];
     $sql = "UPDATE student_details SET ADDRESS='$address',EMAIL='$email',HOBBY='$hobby',ISSUE='$issue',PHONE='$phone' WHERE SID='$id' ";
      mysqli_query($db , $sql);
  }
  else
  {
    echo "Some Error";
  }
}


if(isset($_POST['new_mentor_form']))
{
     $poorp = mysqli_real_escape_string($db, $_POST['poorp']);
     $attendancer = mysqli_real_escape_string($db, $_POST['attendancer']); 
     $subjectd = mysqli_real_escape_string($db, $_POST['subjectd']);
     $study = mysqli_real_escape_string($db, $_POST['study']); 
     $communication = mysqli_real_escape_string($db, $_POST['communication']); 
     $behave = mysqli_real_escape_string($db, $_POST['behave']); 
     $personal = mysqli_real_escape_string($db, $_POST['personal']);   
     $career = mysqli_real_escape_string($db, $_POST['career']); 
     $ufm = mysqli_real_escape_string($db, $_POST['ufm']); 


    if (empty($poorp)) 
    {
        $poorp="NONE" ;
    }
    if (empty($attendancer)) 
    {
        $attendancer="NONE" ;
    }
    if (empty($subjectd)) 
    {
        $subjectd="NONE" ;
    }
    if (empty($study)) 
    {
        $study="NONE" ;
    }
    if (empty($communication)) 
    {
        $communication="NONE" ;
    }
    if (empty($behave)) 
    {
        $behave="NONE" ;
    }
    if (empty($personal)) 
    {
        $personal="NONE" ;
    }
    if (empty($career)) 
    {
        $career="NONE" ;
    }
    if (empty($ufm)) 
    {
        $ufm="NONE" ;
    }
    $id = $_SESSION['SID'];
    $rquery = "SELECT * FROM student WHERE SID = '$id'";
    $run = mysqli_query($db , $rquery);
    $ro = $run->fetch_assoc();
    $MID=$ro['MID'];
    $SEM = $ro['SEMESTER'];
     $sql = "INSERT INTO mentoring_details(POORP,ATTENDANCER,SUBJECTD,STUDY,COMMUNICATION,BEHAVE,UFM,CAREER,PERSONAL,SID,MID,SEMESTER) VALUES ('$poorp','$attendancer','$subjectd','$study','$communication','$behave','$ufm','$career','$personal','$id','$MID','$SEM')";
      mysqli_query($db , $sql);
      $query = "UPDATE student SET FACTION='2' WHERE SID='$id' ";
      mysqli_query($db , $query);
      header('location: student_home.php');
}

if(isset($_POST['update_mentoring_form']))
{
    $poorp = mysqli_real_escape_string($db, $_POST['poorp']);
     $attendancer = mysqli_real_escape_string($db, $_POST['attendancer']); 
     $subjectd = mysqli_real_escape_string($db, $_POST['subjectd']);
     $study = mysqli_real_escape_string($db, $_POST['study']); 
     $communication = mysqli_real_escape_string($db, $_POST['communication']); 
     $behave = mysqli_real_escape_string($db, $_POST['behave']); 
     $personal = mysqli_real_escape_string($db, $_POST['personal']);   
     $career = mysqli_real_escape_string($db, $_POST['career']); 
     $ufm = mysqli_real_escape_string($db, $_POST['ufm']); 

      $id = $_SESSION['SID'];

      $sql = "UPDATE mentoring_details SET POORP='$poorp',ATTENDANCER='$attendancer',SUBJECTD='$subjectd',STUDY='$study',COMMUNICATION='$communication',BEHAVE='$behave',UFM='$ufm',CAREER='$career',PERSONAL='$personal' WHERE SID='$id' ";
      mysqli_query($db , $sql);
       header('location: student_home.php');
}





?>