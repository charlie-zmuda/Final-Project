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
                                    <h4>Please enter your username and password <span class="glyphicon glyphicon-user"/></h4><br/>

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

    

    
                                    <form action="authenticate.php" method="POST" class="form-signin col-md-8 col-md-offset-2" role="form">  
                                        <div class="form-group"> 
                                            <input type="text" name="username" class="form-control" placeholder="Username" required autofocus><br/>
                                            <input type="password" name="password" class="form-control" placeholder="Password" required><br/>
                                            <button class="btn btn-primary btn-lg square-btn-adjust" type="submit" name = "signButton">Sign In</button>  
                                        </div>
                                        
                                        <div class="form-group" style="float:right;">
                                            <p style=" font-size:16pt;">Not a free member yet?</p>
                                            <a  style="float:right;" href="registration.php" class="btn btn-danger square-btn-adjust" role="button">Register</a>
                                        </div>
                                    </form>
                                </div><!--end of shadow-->
                            </div><!--end of info-->
                        </div><!--end of container-->
                    </div><!--PAGE INNER INNER-->
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
