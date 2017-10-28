<?php
	session_start();
	include "include/db.php";

	if (isset($_POST['username']) && isset($_POST['password']) ) {
		
		$username = $_POST['username'];
	    $password = $_POST['password'];


	   

	    	$sql = "select * from user where user_id = '$username' and password = '$password';";
	    	$run = mysqli_query($conn,$sql);
	    	if ($run && $row = mysqli_fetch_assoc($run)) {
	    		
	    		$_SESSION['loggedin'] = true;
	            $_SESSION['name'] = $username;
	            echo $_SESSION['name'];
	            header('Location: user.php');
	    	}
	    	else{
	    		//error

                         
	    	$sql = "select * from admin where admin_id = '$username' and passwd = '$password';";
	    	$run = mysqli_query($conn,$sql);
	    	if ($run && $row = mysqli_fetch_assoc($run)) {
	    		
	    		$_SESSION['loggedin'] = true;
	            $_SESSION['name'] = $row['name'];
	            $_SESSION['user'] = $row['admin_id'];
	            header('Location: admin.php');
	    	}
	    	else{
	    		//error
	    		$errmsg = "Sorry ; Username/Password does not match ";
	    	}

	    	
	    	}
	  
	    	
	    
	     
	}
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  .modal-header, h4, .close {
      background-color: #5cb85c;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #f9f9f9;
  }
  </style>
</head>
<body>

<div class="container">
 
  <div role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" action="login.php" method="POST">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" class="form-control" id="usrname" name="username" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" id="psw" name="password" placeholder="Enter password">
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="" >Show Password</label>
            </div>
              <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form>
        </div>
        <div class="modal-footer">
          
          <p> <a href="#">Forgot Password?</a></p>
        </div>
      </div>
      
    </div>
  </div> 
</div>
 
<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>

</body>
</html>
