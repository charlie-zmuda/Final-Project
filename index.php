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
                       <h2>Welcome</h2><br/>
                        <div class="col-md-2"></div>
                        <div class="col-md-8"> 
                            <h3>My name is Charlie Zmuda and I build custom websites!<br/>
                                <br/>Check out some examples in my store!<br/>
                                <br/> Create an account and become a free member!<br/>
                                <br/>This is not a real store, more of an example and demonstration. Once you have explored the site, tell me about your needs on the store page and confirm a meeting time.<br/>
                                <br/>Together we will build a unique and personal website!</h3>
                        </div>
                        <div class="col-md-2"></div><br/>
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
