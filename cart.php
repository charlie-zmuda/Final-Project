<?php 
session_start();
//phpinfo();
include('dbconfig.php');
if(isset($_SESSION['sess_user_id'])){ 
    $mid = $_SESSION['sess_user_id'];
    $cart = $db_con->prepare("SELECT * 
                                FROM product 
                                INNER JOIN cart_list ON product.PROD_ID = cart_list.CART_PROD_ID 
                                WHERE cart_list.CART_MEM_ID = '$mid'");
        $cart->execute();
        
}
else{
    header("Location:login.php");
}

if(isset($_POST['subdelete'])){
    $id = $_POST['rowid'];
    
    $del = $db_con->prepare("DELETE FROM `cart_list` WHERE `cart_list`.`CART_ID` = '$id'");
    $del->execute();
    header('Location: ' . $_SERVER['PHP_SELF']);
}

if(isset($_POST['subupdate'])){
    $id = $_POST['rowid'];
    $comm = $_POST['comment'];
    
    $update = $db_con->prepare("UPDATE cart_list SET comment = '$comm' WHERE `cart_list`.`CART_ID` = '$id'");
    $update->execute();
    header('Location: ' . $_SERVER['PHP_SELF']);
}

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
            <div class="sidebar-collapse" align="center">
                <ul class="nav"  style="text-align:center; margin-top:5px;">
                    <a style="font-size:36pt; font" class="navbar-brand" href="index.php">Personal Website Building</a>
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
                        <div class="container">     
                            <h3>Review your details and when ready, schedule an appointment! Together we will build a great website!</h3>
                            <br/>
                            <table class="table table-bordered table-responsive shadow">
                                <thead>
                                    <tr>
                                        <th>Selection</th>
                                        <th>Description</th>
                                        <th>Comment</th>
                                        <th>Update Comment | Remove From Cart</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php                               //Joins account_types table with accounts table and displays data concurrently
    while($prod_list = $cart->fetch(PDO::FETCH_ASSOC))
    {   
        
        $id=$prod_list['CART_ID'];
        $pname=$prod_list['PROD_NAME'];
        $pdesc=$prod_list['PROD_DESC'];
        $comm=$prod_list['comment'];
               
?>                      
                                    <tr>                                              
                                        <td><?php echo $pname ;?></td>
                                        <td><?php echo $pdesc ;?></td>
                                         <form method="POST" role="form" id="register-form">
                                            <td><input type="text" name="comment" class="form-control" value=" <?php echo $comm ;?> "></td>
                                             <td>
                                                 <button type="submit" class="btn btn-primary" name="subupdate" >  <span class="glyphicon glyphicon-pencil"></span> &nbsp; Update</button>
                                                 &nbsp;
                                                <button type="submit" class="btn btn-danger" name="subdelete" >
                                                <span class="glyphicon glyphicon-remove"></span> &nbsp; Remove</button>
                                               <input type="hidden" name="rowid" value=" <?php echo $id ;?> " >
                                             </td>
                                        </form>
                                    </tr>                                    
<?php
    }
?>   
                                </tbody>
                            </table>
                        </div><!--end of container -->     
                    </div><!--end of col-md-12 -->
                </div><!--end of row -->          
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