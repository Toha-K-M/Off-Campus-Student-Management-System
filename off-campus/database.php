<?php

    $username = 'root';
	$dbn = 'mysql:host=localhost; dbname=off-campus';
	$password = '';
	
	try{
		$db= new PDO($dbn, $username,$password);
		//echo "connected !!";
	}
	catch (PDOexception $e){
		echo "connection failed !!";
	}

?>
