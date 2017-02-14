<?php 
	session_start();

	require 'database.php';

	$user = NULL;

	if(isset($_SESSION['user_id'])) {
		$sql = "SELECT id,email,password FROM users WHERE id = :id";
		$records = $conn->prepare($sql);
		$records->bindParam(':id', $_SESSION['user_id']);
		$records->execute();

		$results = $records->fetch(PDO::FETCH_ASSOC);

		if (count($results) > 0) {
			$user = $results;
		}

	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Index | prohack-id</title>
</head>
<body>

	<h1>prohack-id</h1>

	<?php if (!empty($user)): ?>
		<!-- your web app here -->
		<h1>You are logged in as <?= $user['email']; ?></h1>

		<a href="logout.php">Log Out</a>
	<?php else: ?>
		<a href="login.php">Log In Here</a>
		<a href="register.php">Register Here</a>
	<?php endif; ?>

</body>
</html>