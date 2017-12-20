<?php 
session_start();
//phpinfo();
include('dbconfig.php');
if(isset($_SESSION['sess_user_id'])){ 
    $mid = $_SESSION['sess_user_id'];
    
    $cal = $db_con->prepare("SELECT * FROM calendar");
    $cal->execute();
    
    $stmt = $db_con->prepare("SELECT * FROM calendar WHERE cal_mem_id=:mem_id");
			$stmt->execute(array(":mem_id"=>$mid));
			$count = $stmt->rowCount();   
}

else{
    header("Location:login.php");
}

if(isset($_POST['submorning'])){
    $id = $_POST['rowidm'];
    $mbook = $db_con->prepare("UPDATE calendar SET morning = '1', cal_mem_id = '$mid' WHERE id = '$id'");
    $mbook->execute();
    header('Location: ' . $_SERVER['PHP_SELF']);
}

if(isset($_POST['subafternoon'])){
    $id = $_POST['rowida'];
    $abook = $db_con->prepare("UPDATE calendar SET afternoon = '1', cal_mem_id = '$mid' WHERE id = '$id'");
    $abook->execute();
    header('Location: ' . $_SERVER['PHP_SELF']);
}

if(isset($_POST['subremove'])){
    $id = $_POST['appid'];
    $subrem = $db_con->prepare("UPDATE calendar SET afternoon = '0', morning = '0', cal_mem_id = '0' WHERE id = '$id'");
    $subrem->execute();
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
                        <div class="container shadow">     
                        <br/>
                            
 <?php if($count==0){ ?>    <!--Shows user content based on whether they are logged into their account-->
                            
                            <h3>Scheduling a meeting at the click of a button! <br/>After you Book, expect a phone call to discuss website intentions and a location for the meeting.</h3>
                            <table class="table table-responsive" >
                                <thead>
                                    <tr>
                                        <th>Days Available</th>
                                        <th>Morning 10:00am</th>
                                        <th>Afternoon 1:00pm</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
<?php                               //Joins account_types table with accounts table and displays data concurrently
    while($calendar = $cal->fetch(PDO::FETCH_ASSOC))
    {   
        $id=$calendar['id'];
        $days=$calendar['days'];
        $morn=$calendar['morning'];
        $after=$calendar['afternoon'];
//        $comm=$prod_list['comment'];
               
?>                      
                                    <tr>                                              
                                        <td><?php echo $days ;?></td>
                                        
                                        <form method="POST" role="form" id="register-form">
                                            <td><?php if($calendar['morning'] == 0){ ?>
                                                <button type="submit" class="btn btn-primary" name="submorning" >  <span class="glyphicon glyphicon-pencil"></span> &nbsp; Book</button><input type="hidden" name="rowidm" value=" <?php echo $id ;?> " >

                                            <?php } else { ?>
                                                <fieldset disabled="disabled">
                                                    <button type="submit" class="btn btn-danger" name="disabled" >Reserved</button>
                                                    </fieldset>
                                            <?php } ?> </td>
                                        
                                            <!-- Shows user a diabled button if time slot has been reserved -->
                                            
                                            <td><?php if($calendar['afternoon'] == 0){ ?>
                                                <button type="submit" class="btn btn-primary" name="subafternoon" >  <span class="glyphicon glyphicon-pencil"></span> &nbsp; Book</button><input type="hidden" name="rowida" value=" <?php echo $id ;?> " >

                                            <?php } else { ?>
                                                <fieldset disabled="disabled">
                                                    <button type="submit" class="btn btn-danger" name="disabled" >Reserved</button>
                                                    </fieldset>
                                            <?php } ?> </td>
                                        </form>
                                    </tr>                                    
<?php
    }
?>   
                                </tbody>
                            </table>
                            
                            <?php } else {
        while($appoinment = $stmt->fetch(PDO::FETCH_ASSOC))
    {   
        $aid=$appoinment['id'];
        $aday=$appoinment['days'];
        $amorn=$appoinment['morning'];
        $aafter=$appoinment['afternoon'];
               
?>
                                <h3> <?php echo $name;?>, <br/>
                                    
                                <br/>You have a meeting scheduled with me on:<br/>
                                    
                                <br/><?php echo $aday ;?> at
                                    
                                <?php if($amorn == 1){ ?>
                                    
                                                    10:00am.
                                    
                                <?php } else { ?>
                                    
                                                    1:00pm.
                                    
                                <?php  } ?> </h3><br/>
                            
                                <p style="float:left;">If you have questions, you can reach me directly at - </p><p style="color:#ffd820;"> charliezmuda@gmail.com</p>
                            
                                <form method="POST" role="form" id="register-form">
                                    <div class="form-group" style="float:left;">
                                        <p>If you need to cancel or re-schedule</p>
                                        <button type="submit" class="btn btn-danger" name="subremove" >  <span class="glyphicon glyphicon-pencil"></span> &nbsp; Click Here</button><input type="hidden" name="appid" value=" <?php echo $aid ;?> " >
                                    </div>
                                </form>
                            
<?php  } ?>
<?php  } ?>                 
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