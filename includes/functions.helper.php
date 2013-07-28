<?php

	function debug($var)
	{
		echo "<pre>";
		print_r($var);
		echo "</pre>";
	}


	function makeReadable($var)
	{
		return ucwords(str_replace("_"," ",$var));
	}
