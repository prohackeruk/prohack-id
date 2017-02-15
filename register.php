<?php
	/* TODO */
	// Confirm that password and confirm password fields match
	// Don't allow duplicate user entries
	// Verify emails?
	// Redirect to login on successful register

	session_start();

	if (isset($_SESSION['user_id'])) {
		$message = 'You are already logged in, redirecting...';
		header("Location: /");
	}

	require 'database.php';

	$message = '';

	if (!empty($_POST['email']) && !empty($_POST['password'])){
		// The user has tried to register correctly, enter in database
		$sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
		$stmt = $conn->prepare($sql);

		// Bound parameters prevent SQL injection attacks
		$stmt->bindParam(':email', $_POST['email']);
		$stmt->bindParam(':password', password_hash($_POST['password'], PASSWORD_BCRYPT)); // Hash the password before it goes in the database
		
		if ($stmt->execute()) {
			$message = 'Successfully added user, redirecting...';
			header("Location: /login.php"); // Only redirect if you logged in successfully
		} else {
			$message = 'Failed to add user';
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Register | prohack-id</title>
</head>
<body>

	<h1>Register</h1>
	<a href="index.php">Back to Home</a>

	<!-- Show a result message if there is one -->
	<?php if (!empty($message)): ?>
		<p><?= $message ?></p>
	<?php endif; ?>

	<form action="register.php" method="POST">
		<input type="text" name="email" placeholder="Enter your email" required>
		<input type="password" name="password" placeholder="Choose a password" required>
		<input type="password" name="confirm_password" placeholder="Confirm password" required>
		<input type="submit" name="submit">
	</form>

	<a href="login.php">Log In Here</a>

</body>
</html>