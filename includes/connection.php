<?php

try {
	$pdo = new PDO('mysql:host=localhost;dbname=assetguide', 'root', '');
}	catch (PDOException $e) {
		exit('Database error.');
}

?>