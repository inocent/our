<?php
require_once("../includes/initialize.php");
	$content='home.php';
	 //$title=$_GET['Home'];
	$view = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
	switch ($view) {
	
		case '1' :
	    $title=$_GET['calendar'];	
		$content = 'calendar.php';		
		break;
		case '2' :
	    //$title=$_GET['Home'];	
		$content = 'home.php';		
		break;
		
		case 'register':
		//$title=$_GET['register'];
		$content = 'register.php';
		break;
		
}
require_once '../admin/themes/adminTemplate.php';
?>
