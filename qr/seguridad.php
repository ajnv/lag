<?php
session_start();
$valida=$_SESSION['valida'];

if(!$valida){
	header("Location: login.php");  
    
    exit();  

	
	
	}