<?php include('server.php') ?>
<link rel="stylesheet" type="text/css" href="login.css" />


     <script>
 function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function login(){
  document.getElementById("signup").style.display="none";
  document.getElementById("signup").disabled=false;
  document.getElementById("login").style.display="block";
  document.getElementById("login").disabled=true;
}
</script>



<div class="blur"></div>
<form id="student_login" class="modal-content animate" action="#" method="post">
    <?php include('error.php'); ?>
      <div class="container">
                                    <label for="student_name"><i class="fa fa-user"></i><b>Student Username</b></label>
                                    <input type="text" placeholder="Enter Your ID" name="student_name" required  value="<?php echo $id; ?>">
                                    <label for="student_password"><b>Password</b></label>
                                    <input type="password" id="password" placeholder="Enter Password" name="password" required>
                                    <label for="Show_Password" class="check_box" ><input type="checkbox" onclick="myFunction()" name="Show_Password" >Show Password</label>
                                   
                                      
                                    <button type="submit" name="student_log"><span class="logbtn">Login</span></button>
                               
                                    <div style="padding:5px"></div>
                                    <a href="temp.html" class="cancelbtn"> Cancel</a>
     </div>
</form>
