<?php
include('dbconfig.php');
	if(isset($_POST['submit']))
	{
        $username = $_POST['username'];
        $password = $_POST['password'];
        
		$user_first = $_POST['first_name'];
		$user_last = $_POST['last_name'];
        $phone = $_POST['phone'];
		$user_email = $_POST['user_email'];
        
		$joining_date =date('Y-m-d H:i:s');
        
		try
		{	
			$stmt = $db_con->prepare("SELECT * FROM membership WHERE mem_email=:mem_email");
			$stmt->execute(array(":mem_email"=>$user_email));
			$count = $stmt->rowCount();
            
			if($count==0){
				
			$stmt = $db_con->prepare("INSERT INTO membership(mem_username,mem_password,mem_fname,mem_lname,mem_phone,mem_email,mem_startdate) VALUES(:mem_username, :mem_password, :mem_fname, :mem_lname, :mem_phone, :mem_email, :mem_startdate)");
            $stmt->bindParam(":mem_username",$username);
            $stmt->bindParam(":mem_password",$password);
			$stmt->bindParam(":mem_fname",$user_first);
			$stmt->bindParam(":mem_lname",$user_last);
            $stmt->bindParam(":mem_phone",$phone);
			$stmt->bindParam(":mem_email",$user_email);
			$stmt->bindParam(":mem_startdate",$joining_date);
                
                if($stmt->execute())
                {
                   
                    header("Location:login.php");
                }
            }//end of if count
            else{
                echo "<h2>Email already taken! Please try a different one.</h2>";
            }
		}//end of try
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}//end of if post
?>

<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SLC</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        
        
        <nav class=" navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="sidebar-collapse form-inline" align="center">
                <ul class="nav form-inline"  style="text-align:center; margin-top:5px;">
                    <a style="font-size:36pt;" class="navbar-brand col-sm-10" href="index.php">Personal Website Building</a>
                        <li><a  href="store.php" style="text-align:center; font-size:24pt; " ><i class="fa fa-3x"></i> Store </a></li>
                        <li><a  href="cart.php" style="text-align:center; font-size:24pt; " ><i class="fa fa-3x"></i> Cart </a></li>
                        <li><a  href="calendar.php" style="text-align:center; font-size:24pt; " ><i class="fa fa-3x"></i> Appointment </a></li>
                    
                    <?php if(isset($_SESSION['sess_username'])){ $name = $_SESSION['sess_username'];?>
                      <div style="color: white;padding: 5px 5px 5px 5px;float: right;font-size: 16px;"><?php echo "Welcome ". $name;?> &nbsp; 
                    <a href="logout.php" class="btn btn-danger square-btn-adjust">Log Out</a> </div>
                      
                <?php } else { ?>
                      <div style="color: white;padding: 10px 5px 5px 5px;float: right;font-size: 16px;">  &nbsp; 
                    <a href="login.php" class="btn btn-primary square-btn-adjust">Sign In</a> </div>
                      
                      <div style="color: white;padding: 10px 5px 5px 5px;float: right;font-size: 16px;">  &nbsp; 
                    <a href="registration.php" class="btn btn-danger square-btn-adjust">Sign Up</a> </div>
                <?php } ?>
                    </ul>
            </div>
        </nav>     

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >  
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        
                        <br><br><br>
                        
                        <div class="container">
                            <div class="info">
                                <div class="col-md-6 col-md-offset-3 shadow">
                                    <h4>Just need some info to begin your free membership! <span class="glyphicon glyphicon-user"/></h4><br/> 
<?php 							  
//Associative array to display 2 types of error message.
 $errors = array( 1=>"Invalid user name or password, Try again",
                  2=>"Please login to begin shopping" );	
				  					
//Get the error_id from URL
if (isset($_GET['err']))
{
	$error_id =  $_GET['err'];
	if ($error_id == 1) 
	{
	    echo '<p class="text-danger">'.$errors[$error_id].'</p>';
	} 
	if ($error_id == 2) 
	{
	    echo '<p class="text-danger">'.$errors[$error_id].'</p>';
	}
}
?>   
                                    <form method="POST" class="form-signin col-md-8 col-md-offset-2" role="form" id="register-form">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" name="username" class="form-control" placeholder="Username" required autofocus><br/>
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control" placeholder="Password" required><br/>
                                            <label>Email</label>
                                            <input type="email" name="user_email" class="form-control" placeholder="Email address"  id="user_email" required/><br/>
                                            <label>First Name</label>
                                            <input type="text" name="first_name" class="form-control" placeholder="First Name" id="first_name" required/><br/>
                                            <label>Last Name</label>
                                            <input type="text" name="last_name" class="form-control" placeholder="Last Name" id="last_name" required/><br/>
                                            <label>Phone Number</label>
                                            <input type="text" name="phone" class="form-control" placeholder="Phone Number" id="phone" required/><br/>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-default" name="submit">
                                                <span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account</button>
                                            </div> 
                                        </div>
                                    </form>
                                </div><!--end of shadow-->
                            </div><!--end of info-->
                        </div><!--end of container-->
                    </div><!--colmd12--> 
                </div><!-- /. ROW  -->          
            </div><!--  PAGE INNER  -->        
        </div><!--  PAGE WRAPPER  -->
    </div><!--  WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>

    
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
