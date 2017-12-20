<?php 
session_start();

include('dbconfig.php');

if(isset($_POST['submit'])){
    $mid = $_SESSION['sess_user_id'];
    
    $id = $_POST['product'];
    $comm = $_POST['comment'];
    
    try{
    $stmt = $db_con->prepare("INSERT INTO cart_list(cart_mem_id,cart_prod_id,comment) VALUES(:mem_id, :prod_id, :comm)");
            $stmt->bindParam(":mem_id",$mid);
            $stmt->bindParam(":prod_id",$id);
            $stmt->bindParam(":comm",$comm);
    
         if($stmt->execute())
                {
                   
                    header("Location:store.php");
                }
            
		}//end of try
		catch(PDOException $e){
			echo $e->getMessage();
		}
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
                    <div class="col-md-12 ">  
                        <h2 style="color: #fff; text-align:center;">Here are examples of what I can build for you! </h2>
             <br/>&nbsp;<h3 style="color: #ffd820; text-align:left;">But first I need some information...</h3>
                            <h4 style="color: #fff; text-align:left;"> 
                                <ol>
                                    <li>Must be logged into your free account</li>
                                    <li>If you see something you want on your site, leave me a comment and tell me more!</li>
                                    <li>Everything you write will be discussed at our meeting</li>
                                    <li>Click the Add To Cart button!</li>
                                </ol>
                            </h4>
                            <h3 style="color: #fff; text-align:center;">When ready, review your "<a  href="cart.php" style="color:#ffd820;" >Shopping Cart</a>" example and schedule a meeting!</h3>
                    </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="panel panel-default">
                                    <div class="panel-heading"></div>         
                                    <div class="panel-body shadow">
                                        
                                           <?php if(isset($_SESSION['sess_username'])){ ?>
                                        <form method="POST" role="form" id="register-form">
                                            <div class="form-group">
                                                
                                                
                                                <button type="submit" class="btn btn-default" name="submit">
                                                <span class="glyphicon glyphicon-log-in"></span> &nbsp; Add to Cart</button>

                                                <br/><br/>
                                                <input type="text" name="comment" class="form-control" placeholder="Comment">
                                                <input type="hidden" name="product" value="1">
                                            </div>
                                            <hr/>
                                        </form>
                                      <?php } else { ?>
                                        <?php } ?>
                                        
                                      <h3>Simple Button Examples</h3>
                                        <h4>Default Button</h4>
                                        <a href="#" class="btn btn-default">default</a>
                                        <a href="#" class="btn btn-primary">primary</a>
                                        <a href="#" class="btn btn-danger">danger</a>
                                        <a href="#" class="btn btn-success">success</a>
                                        <a href="#" class="btn btn-info">info</a>
                                        <a href="#" class="btn btn-warning">warning</a>

                                        <h4>Small Button</h4>
                                        <a href="#" class="btn btn-default btn-sm">default</a>
                                        <a href="#" class="btn btn-primary btn-sm">primary</a>
                                        <a href="#" class="btn btn-danger btn-sm">danger</a>
                                        <a href="#" class="btn btn-success btn-sm">success</a>
                                        <a href="#" class="btn btn-info btn-sm">info</a>
                                        <a href="#" class="btn btn-warning btn-sm">warning</a>

                                        <h4>Large Button</h4>
                                        <a href="#" class="btn btn-default btn-lg">default</a>
                                        <a href="#" class="btn btn-primary btn-lg">primary</a>
                                        <a href="#" class="btn btn-danger btn-lg">danger</a>
                                        <a href="#" class="btn btn-success btn-lg">success</a>
                                        <a href="#" class="btn btn-info btn-lg">info</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <div class="panel panel-default">
                                    <div class="panel-heading"></div>  
                                    <div class="panel-body shadow"> 
                                        
                                      <?php if(isset($_SESSION['sess_username'])){ ?>
                                        <form method="POST" role="form" id="register-form">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-default" name="submit">
                                                <span class="glyphicon glyphicon-log-in"></span> &nbsp; Add to Cart</button>
                                                <br/><br/>
                                                <input type="text" name="comment" class="form-control" placeholder="Comment">
                                                <input type="hidden" name="product" value="2">
                                            </div>
                                            <hr/>
                                        </form>
                                      <?php } else { ?>
                                        <?php } ?>
                                        <h3>Icons Provided By Font-Awesome!</h3>
                                         <h4>Button Dropdown Examples</h4>
                                        <div style="margin-top: 10px;">
											<div class="btn-group">
								            <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Action <span class="caret"></span></button>
											  <ul class="dropdown-menu">
												<li><a href="#">Action</a></li>
												<li><a href="#">Another action</a></li>
												<li><a href="#">Something else here</a></li>
												<li class="divider"></li>
												<li><a href="#">Separated link</a></li>
											  </ul>
											</div>
											<div style="margin:5px;" class="btn-group">
											  <button data-toggle="dropdown" class="btn btn-danger dropdown-toggle">Danger <span class="caret"></span></button>
											  <ul class="dropdown-menu">
												<li><a href="#">Action</a></li>
												<li><a href="#">Another action</a></li>
												<li><a href="#">Something else here</a></li>
												<li class="divider"></li>
												<li><a href="#">Separated link</a></li>
											  </ul>
											</div>
                                           <div style="margin:5px;" class="btn-group">
											  <button data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Danger <span class="caret"></span></button>
											  <ul class="dropdown-menu">
												<li><a href="#">Action</a></li>
												<li><a href="#">Another action</a></li>
												<li><a href="#">Something else here</a></li>
												<li class="divider"></li>
												<li><a href="#">Separated link</a></li>
											  </ul>
											</div>
										  </div>
										  <div>
                                               
                                            <div class="btn-group">
											  <button data-toggle="dropdown" class="btn btn-success dropdown-toggle">Success <span class="caret"></span></button>
											  <ul class="dropdown-menu">
												<li><a href="#">Action</a></li>
												<li><a href="#">Another action</a></li>
												<li><a href="#">Something else here</a></li>
												<li class="divider"></li>
												<li><a href="#">Separated link</a></li>
											  </ul>
											</div>
											<div class="btn-group">
											  <button data-toggle="dropdown" class="btn btn-info dropdown-toggle">Info <span class="caret"></span></button>
											  <ul class="dropdown-menu">
												<li><a href="#">Action</a></li>
												<li><a href="#">Another action</a></li>
												<li><a href="#">Something else here</a></li>
												<li class="divider"></li>
												<li><a href="#">Separated link</a></li>
											  </ul>
											</div>
											<div class="btn-group">
											  <button data-toggle="dropdown" class="btn btn-default dropdown-toggle">Default <span class="caret"></span></button>
											  <ul class="dropdown-menu">
												<li><a href="#">Action</a></li>
												<li><a href="#">Another action</a></li>
												<li><a href="#">Something else here</a></li>
												<li class="divider"></li>
												<li><a href="#">Separated link</a></li>
											  </ul>
											</div>
										  </div>
                                       <h4>Buttons With Icons</h4>                                       
											<button class="btn btn-default"><i class=" fa fa-refresh "></i> Update</button>
											<button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button>
											<button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button>
                                        </div><!--end of panel body-->
                                    </div><!--end of panel-->
                                </div><!--end of col-md-5-->
                            </div><!--end of row for buttons-->
                    <div class="row">
                        <div class="col-md-5">
                            <div class="panel panel-default">
                                <div class="panel-heading"></div>  
                                    <div class="panel-body shadow">
                                        
                                     <?php if(isset($_SESSION['sess_username'])){ ?>
                                        <form method="POST" role="form" id="register-form">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-default" name="submit">
                                                <span class="glyphicon glyphicon-log-in"></span> &nbsp; Add to Cart</button>
                                                <br/><br/>
                                                <input type="text" name="comment" class="form-control" placeholder="Comment">
                                                <input type="hidden" name="product" value="3">
                                            </div>
                                            <hr/>
                                        </form>
                                      <?php } else { ?>
                                        <?php } ?>
                                        
                                  <h3>With radio &amp; checkboxes</h3>
                                        <div class="form-group">
                                            <label>Checkboxes</label>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Checkbox Example One
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Checkbox Example Two
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Checkbox Example Three
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Inline Checkboxes Examples</label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox"> One
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox"> Two
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox"> Three
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Radio Button Examples</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">Radio Example One
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Radio Example Two
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">Radio Example Three
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <div class="panel panel-default">
                                    <div class="panel-heading"></div>        
                                        <div class="panel-body shadow">
                                            
                                             <?php if(isset($_SESSION['sess_username'])){ ?>
                                        <form method="POST" role="form" id="register-form">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-default" name="submit">
                                                <span class="glyphicon glyphicon-log-in"></span> &nbsp; Add to Cart</button>
                                                <br/><br/>
                                                <input type="text" name="comment" class="form-control" placeholder="Comment">
                                                <input type="hidden" name="product" value="4">
                                            </div>
                                            <hr/>
                                        </form>
                                      <?php } else { ?>
                                        <?php } ?>
                                            
                                        <h3>Basic Form Examples</h3>
                                        <div class="form-group">
                                            <label>Select Example</label>
                                                <select class="form-control">
                                                    <option>One</option>
                                                    <option>Two</option>
                                                    <option>Three</option>
                                                    <option>Four</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Multiple Select Example</label>
                                                <select multiple="" class="form-control">
                                                    <option>One</option>
                                                    <option>Two</option>
                                                    <option>Three</option>
                                                    <option>Four</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-default">Submit Button</button>
                                            <button type="reset" class="btn btn-primary">Reset Button</button>
                                    <br>
                                    </div>
                                </div>
                            </div>
                        </div><!--end of row-->
                    <div class="row">
                        <div class="col-md-5">
                            <div class="panel panel-default">
                                <div class="panel-heading"></div>        
                                    <div class="panel-body shadow">
                                        
                                     <?php if(isset($_SESSION['sess_username'])){ ?>
                                        <form method="POST" role="form" id="register-form">
                                            <div class="form-group">
                                                
                                                
                                                <button type="submit" class="btn btn-default" name="submit">
                                                <span class="glyphicon glyphicon-log-in"></span> &nbsp; Add to Cart</button>

                                                <br/><br/>
                                                <input type="text" name="comment" class="form-control" placeholder="Comment">
                                                <input type="hidden" name="product" value="5">
                                            </div>
                                            <hr/>
                                        </form>
                                      <?php } else { ?>
                                        <?php } ?>
                                
                                        <h3>Registration Form Example!</h3>
                                        <h4>Just need some info to begin your free membership! <span class="glyphicon glyphicon-user"/></h4><br/>
                                        <form method="" class="form-signin col-md-8 col-md-offset-2" >
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" name="" class="form-control" placeholder="Username" ><br/>
                                                <label>Password</label>
                                                <input type="password" name="" class="form-control" placeholder="Password"><br/>
                                                <label>Email</label>
                                                <input type="email" name="" class="form-control" placeholder="Email address"  id="user_email"/><br/>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-default" name="">
                                                    <span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account</button>
                                                </div> 

                                            </div>
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>    
                        <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <div class="panel panel-default">
                                    <div class="panel-heading"></div>        
                                        <div class="panel-body shadow">
                                            
                                            <?php if(isset($_SESSION['sess_username'])){ ?>
                                            <form method="POST" role="form" id="register-form">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-default" name="submit">
                                                    <span class="glyphicon glyphicon-log-in"></span> &nbsp; Add to Cart</button>
                                                    <br/><br/>
                                                    <input type="text" name="comment" class="form-control" placeholder="Comment">
                                                    <input type="hidden" name="product" value="6">
                                                </div>
                                                <hr/>
                                            </form>
                                            <?php } else { ?>
                                            <?php } ?>
                                            
                                            <h3>Login Form Example</h3>
                                            <h4>Please enter your username and password <span class="glyphicon glyphicon-user"/></h4><br/>
                                            <form action="" class="form-signin col-md-8 col-md-offset-2" role="form">
                                                <div class="form-group">    
                                               <input type="text"  class="form-control" placeholder="Username" ><br/>
                                               <input type="password"  class="form-control" placeholder="Password" ><br/>
                                               <button class="btn btn-primary btn-lg square-btn-adjust" type="">Sign In</button>  
                                                </div>
                                                <div class="form-group" style="float:right;">
                                                <p style=" font-size:16pt;">Not a free member yet?</p>
                                                <a  style="float:right;" href="" class="btn btn-danger square-btn-adjust" role="button">Register</a>
                                                </div>
                                            </form>
                                    </div>
                                </div>
                            </div>
                    </div><!--end of row-->
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading"></div>
                        <div class="panel-body shadow">
                            
                            <?php if(isset($_SESSION['sess_username'])){ ?>
                                    <form method="POST" role="form" id="register-form">
                                        <div class="form-group">


                                            <button type="submit" class="btn btn-default" name="submit">
                                            <span class="glyphicon glyphicon-log-in"></span> &nbsp; Add to Cart</button>

                                            <br/><br/>
                                            <input type="text" name="comment" class="form-control" placeholder="Comment">
                                            <input type="hidden" name="product" value="7">
                                        </div>
                                        <hr/>
                                    </form>
                                  <?php } else { ?>
                                    <?php } ?>
                            
                            <h3>Advanced Table Functionality!</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Rendering engine</th>
                                            <th>Browser</th>
                                            <th>Platform(s)</th>
                                            <th>Engine version</th>
                                            <th>CSS grade</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <td>Trident</td>
                                            <td>Internet Explorer 4.0</td>
                                            <td>Win 95+</td>
                                            <td class="center">4</td>
                                            <td class="center">X</td>
                                        </tr>
                                        <tr class="even gradeC">
                                            <td>Trident</td>
                                            <td>Internet Explorer 5.0</td>
                                            <td>Win 95+</td>
                                            <td class="center">5</td>
                                            <td class="center">C</td>
                                        </tr>
                                        <tr class="odd gradeA">
                                            <td>Trident</td>
                                            <td>Internet Explorer 5.5</td>
                                            <td>Win 95+</td>
                                            <td class="center">5.5</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="even gradeA">
                                            <td>Trident</td>
                                            <td>Internet Explorer 6</td>
                                            <td>Win 98+</td>
                                            <td class="center">6</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="odd gradeA">
                                            <td>Trident</td>
                                            <td>Internet Explorer 7</td>
                                            <td>Win XP SP2+</td>
                                            <td class="center">7</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="even gradeA">
                                            <td>Trident</td>
                                            <td>AOL browser (AOL desktop)</td>
                                            <td>Win XP</td>
                                            <td class="center">6</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Gecko</td>
                                            <td>Firefox 1.0</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td class="center">1.7</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Gecko</td>
                                            <td>Firefox 1.5</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td class="center">1.8</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Gecko</td>
                                            <td>Firefox 2.0</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td class="center">1.8</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Gecko</td>
                                            <td>Firefox 3.0</td>
                                            <td>Win 2k+ / OSX.3+</td>
                                            <td class="center">1.9</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Gecko</td>
                                            <td>Camino 1.0</td>
                                            <td>OSX.2+</td>
                                            <td class="center">1.8</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Gecko</td>
                                            <td>Camino 1.5</td>
                                            <td>OSX.3+</td>
                                            <td class="center">1.8</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Gecko</td>
                                            <td>Netscape 7.2</td>
                                            <td>Win 95+ / Mac OS 8.6-9.2</td>
                                            <td class="center">1.7</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Gecko</td>
                                            <td>Netscape Browser 8</td>
                                            <td>Win 98SE+</td>
                                            <td class="center">1.7</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Gecko</td>
                                            <td>Netscape Navigator 9</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td class="center">1.8</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Gecko</td>
                                            <td>Mozilla 1.0</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td class="center">1</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Gecko</td>
                                            <td>Mozilla 1.1</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td class="center">1.1</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Gecko</td>
                                            <td>Mozilla 1.2</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td class="center">1.2</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Gecko</td>
                                            <td>Mozilla 1.3</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td class="center">1.3</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Gecko</td>
                                            <td>Mozilla 1.4</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td class="center">1.4</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Gecko</td>
                                            <td>Mozilla 1.5</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td class="center">1.5</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Gecko</td>
                                            <td>Mozilla 1.6</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td class="center">1.6</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Gecko</td>
                                            <td>Mozilla 1.7</td>
                                            <td>Win 98+ / OSX.1+</td>
                                            <td class="center">1.7</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Gecko</td>
                                            <td>Mozilla 1.8</td>
                                            <td>Win 98+ / OSX.1+</td>
                                            <td class="center">1.8</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Gecko</td>
                                            <td>Seamonkey 1.1</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td class="center">1.8</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Gecko</td>
                                            <td>Epiphany 2.20</td>
                                            <td>Gnome</td>
                                            <td class="center">1.8</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Webkit</td>
                                            <td>Safari 1.2</td>
                                            <td>OSX.3</td>
                                            <td class="center">125.5</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Webkit</td>
                                            <td>Safari 1.3</td>
                                            <td>OSX.3</td>
                                            <td class="center">312.8</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Webkit</td>
                                            <td>Safari 2.0</td>
                                            <td>OSX.4+</td>
                                            <td class="center">419.3</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Webkit</td>
                                            <td>Safari 3.0</td>
                                            <td>OSX.4+</td>
                                            <td class="center">522.1</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Webkit</td>
                                            <td>OmniWeb 5.5</td>
                                            <td>OSX.4+</td>
                                            <td class="center">420</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Webkit</td>
                                            <td>iPod Touch / iPhone</td>
                                            <td>iPod</td>
                                            <td class="center">420.1</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Webkit</td>
                                            <td>S60</td>
                                            <td>S60</td>
                                            <td class="center">413</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Presto</td>
                                            <td>Opera 7.0</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td class="center">-</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Presto</td>
                                            <td>Opera 7.5</td>
                                            <td>Win 95+ / OSX.2+</td>
                                            <td class="center">-</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Presto</td>
                                            <td>Opera 8.0</td>
                                            <td>Win 95+ / OSX.2+</td>
                                            <td class="center">-</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Presto</td>
                                            <td>Opera 8.5</td>
                                            <td>Win 95+ / OSX.2+</td>
                                            <td class="center">-</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Presto</td>
                                            <td>Opera 9.0</td>
                                            <td>Win 95+ / OSX.3+</td>
                                            <td class="center">-</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Presto</td>
                                            <td>Opera 9.2</td>
                                            <td>Win 88+ / OSX.3+</td>
                                            <td class="center">-</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Presto</td>
                                            <td>Opera 9.5</td>
                                            <td>Win 88+ / OSX.3+</td>
                                            <td class="center">-</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Presto</td>
                                            <td>Opera for Wii</td>
                                            <td>Wii</td>
                                            <td class="center">-</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Presto</td>
                                            <td>Nokia N800</td>
                                            <td>N800</td>
                                            <td class="center">-</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Presto</td>
                                            <td>Nintendo DS browser</td>
                                            <td>Nintendo DS</td>
                                            <td class="center">8.5</td>
                                            <td class="center">C/A<sup>1</sup>
                                            </td>
                                        </tr>
                                        <tr class="gradeC">
                                            <td>KHTML</td>
                                            <td>Konqureror 3.1</td>
                                            <td>KDE 3.1</td>
                                            <td class="center">3.1</td>
                                            <td class="center">C</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>KHTML</td>
                                            <td>Konqureror 3.3</td>
                                            <td>KDE 3.3</td>
                                            <td class="center">3.3</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>KHTML</td>
                                            <td>Konqureror 3.5</td>
                                            <td>KDE 3.5</td>
                                            <td class="center">3.5</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeX">
                                            <td>Tasman</td>
                                            <td>Internet Explorer 4.5</td>
                                            <td>Mac OS 8-9</td>
                                            <td class="center">-</td>
                                            <td class="center">X</td>
                                        </tr>
                                        <tr class="gradeC">
                                            <td>Tasman</td>
                                            <td>Internet Explorer 5.1</td>
                                            <td>Mac OS 7.6-9</td>
                                            <td class="center">1</td>
                                            <td class="center">C</td>
                                        </tr>
                                        <tr class="gradeC">
                                            <td>Tasman</td>
                                            <td>Internet Explorer 5.2</td>
                                            <td>Mac OS 8-X</td>
                                            <td class="center">1</td>
                                            <td class="center">C</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Misc</td>
                                            <td>NetFront 3.1</td>
                                            <td>Embedded devices</td>
                                            <td class="center">-</td>
                                            <td class="center">C</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Misc</td>
                                            <td>NetFront 3.4</td>
                                            <td>Embedded devices</td>
                                            <td class="center">-</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeX">
                                            <td>Misc</td>
                                            <td>Dillo 0.8</td>
                                            <td>Embedded devices</td>
                                            <td class="center">-</td>
                                            <td class="center">X</td>
                                        </tr>
                                        <tr class="gradeX">
                                            <td>Misc</td>
                                            <td>Links</td>
                                            <td>Text only</td>
                                            <td class="center">-</td>
                                            <td class="center">X</td>
                                        </tr>
                                        <tr class="gradeX">
                                            <td>Misc</td>
                                            <td>Lynx</td>
                                            <td>Text only</td>
                                            <td class="center">-</td>
                                            <td class="center">X</td>
                                        </tr>
                                        <tr class="gradeC">
                                            <td>Misc</td>
                                            <td>IE Mobile</td>
                                            <td>Windows Mobile 6</td>
                                            <td class="center">-</td>
                                            <td class="center">C</td>
                                        </tr>
                                        <tr class="gradeC">
                                            <td>Misc</td>
                                            <td>PSP browser</td>
                                            <td>PSP</td>
                                            <td class="center">-</td>
                                            <td class="center">C</td>
                                        </tr>
                                        <tr class="gradeU">
                                            <td>Other browsers</td>
                                            <td>All others</td>
                                            <td>-</td>
                                            <td class="center">-</td>
                                            <td class="center">U</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                    </div><!--PAGE INNER INNER-->
                <!-- /. ROW  -->          
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