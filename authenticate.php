<?php 
require 'dbconfig.php'; //Databse Connection
session_start(); //Start the session

if(isset($_POST['username']))
{	$username = $_POST['username'];	 }

if(isset($_POST['password'])) 
{	$password = $_POST['password'];	 }
	
// Check whether the entered username/password pair exist in the Database

$query = $db_con->prepare("SELECT * FROM membership WHERE MEM_USERNAME=:username AND MEM_PASSWORD=:password");
$query->execute(array(':username' => $username, ':password' => $password));

//fetch the result as associative array
	$row = $query->fetch(PDO::FETCH_ASSOC);
	
	//Store the fetched details into $_SESSION
	$_SESSION['sess_user_id'] = $row['MEM_ID'];
	$_SESSION['sess_username'] = $row['MEM_USERNAME'];

if($query->rowCount() == 0)
{	header('Location: login.php?err=1');  }


else 
{	
    
    header('Location: store.php');
    
}?>




