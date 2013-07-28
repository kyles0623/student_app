<!-- Classes XML file taken from http://www.cs.washington.edu/research/xmldatasets/www/repository.html -->

<?php
	//Security
	define('ACCESS',1);


	define('DS',DIRECTORY_SEPARATOR);

	//Includes
	require_once('includes'.DS.'config.php');

	//Start Session
	session_start();

	//Titles of pages
	$page_titles = array('Basic Information','Personal Information','Next Semesters Classes','Summary');

	//Set page
	$maxPage = 4;
	$page = isset($_GET['page'])&&$_GET['page']>0&&$_GET['page']<=$maxPage?$_GET['page']:'1';


	//reset the session if the user revisits the main page
	if(!isset($_GET['page']))
	{
		
		session_destroy();
		header('Location: index.php?page=1');
	}
	//Make the user fill out any information they haven't filled out already
	if($page > 1)
	{
		if(!isset($_SESSION['page-'.($page-1)]))
		{
			header('Location: index.php?page='.($page-1));
		}
	}

	//sets the current data for the page
	$currentData = isset($_SESSION['page-'.$page])?$_SESSION['page-'.$page]:array();

	//Set the template and current page for grabing the file
	$currentPage = ROOT_DIR.DS.'pages'.DS.'page-'.$page.'.php';
	$template_url = ROOT_DIR.DS.'templates'.DS.TEMPLATE.'.php';

	//set the title of the page
	$title = $page_titles[$page-1];
	

	//initialize the errors
	$errors = array();
	

	//Validation, Session saving, and page forwarding
	if(isset($_POST['page']))
	{
			$page = isset($_POST['page'])&&$_POST['page']>0&&$_GET['page']<=$maxPage?$_POST['page']:'1';
			$currentPage = ROOT_DIR.DS.'pages'.DS.'page-'.$page.'.php';
		switch($_POST['page'])
		{
			//Validate the first page's material.
			case '1':
				if(!isset($_POST['first_name']) || !isset($_POST['last_name']) || $_POST['first_name'] == '' || $_POST['last_name'] == '')
					$errors[] = 'First and Last Name are Required';
				if(!isset($_POST['state']) || $_POST['state'] == '')
					$errors[] = 'State is Required';
				if(!isset($_POST['address']) || $_POST['address'] =='')
					$errors[] = 'Address is Required';
				if(!isset($_POST['city']) || $_POST['city'] =='')
					$errors[] = 'City is Required';
				if(!isset($_POST['zip']) || $_POST['zip'] =='')
					$errors[] = 'Zip Code is Required';
				else if(strlen(preg_replace('/[^\d]+/', '', $_POST['zip'])) < 5 )
					$errors[] = 'Zip code is invalid';
				if(!isset($_POST['phone']) || $_POST['phone'] == '')
					$errors[] = 'Phone Number is required';
				else if(strlen(preg_replace('/[^\d]+/', '', $_POST['phone'])) != 10)
				{
					$errors[] = 'Phone Number is invalid';
				}
				break;
			case '2':
				if(!isset($_POST['sex']) || $_POST['sex'] == '' )
					$errors[] = 'A sex is required';
				if(!isset($_POST['marital-status']) || $_POST['marital-status'] == '' )
					$errors[] = 'A Marital Status is required';
				if(!isset($_POST['parent-status']) || $_POST['parent-status'] == '' )
					$errors[] = 'A Parent Status is required';
				if(!isset($_POST['income']) || $_POST['income'] == '' )
					$errors[] = 'An Income is required';
				if(!isset($_POST['race']) || empty($_POST['race']) )
					$errors[] = 'A Race is required';
				break;
			//Validate the 3rd pages materials
			case '3':
				
				if(!isset($_POST['classes']))
					$errors[] = "You must select at least one class";
				break;

		}
		//Save session and forward to next page if there are no erros.
		if(empty($errors))
		{
			if(isset($_SESSION['page-'.$page]))
				unset($_SESSION['page-'.$page]);
			$_SESSION['page-'.$page] = $_POST;

			
			$currentData = $_POST;
			
			header('Location: '.INDEX_PAGE.'?page='.($page+1));
		}




	}


	//debug($currentData);
	require_once($template_url);

?>