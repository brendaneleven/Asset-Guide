<?php

session_start();
$_SESSION['views']=1;

include_once('../includes/connection.php');

$_SESSION['test_val'];

if (isset($_SESSION['logged_in'])) {
	//display index
} else {

	echo 'test';

	if (isset($_POST['username'], $_POST['password'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		if (empty($username) or empty($password)) {
			$error = 'All fields are required!';
		} else {

			$query = $pdo->prepare("SELECT * FROM user WEHERE username = $username AND password = $password");

			$query->bindValue(1, $username);
			$query->bindValue(2, $password);

			$query->execute();

			$num = $query->rowCount();

			if ($num == 1) {
				//user entered correct details
				$_SESSION['logged_in'] = true;
				header('Location: index.php');
				exit();
			} else {
				//user entered false details
				$error = 'Incorrect details!';
			}
		}
	}

}
	?>
	<?php if(isset($error)) {
		echo $error;
	}
	?>
	<form action="index.php" method="post">
		<input type="text" name="username" placeholder="Username" />
		<input type="password" name="password" placeholder="Password" />
		<input type="submit" value="Login" />
	</form>