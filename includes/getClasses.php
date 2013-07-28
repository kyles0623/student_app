<?php
session_start();

if(isset($_SESSION['page-3']))
{
	echo json_encode($_SESSION['page-3']['classes']);
}
else
{
	echo 'empty';
}