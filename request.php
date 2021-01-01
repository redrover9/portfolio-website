<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="main.550dcf66.css?v=<?php echo time(); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Request an Account</title>
<h2>Request an Account</h2>
</head>
<body>
<form method="post">
<p>Please fill out this form to request an account.</p>
<label>Username</label>
<input type="text" name="username">
</input>
<label>Email</label>
<input type="text" name="email">
</input>
<input type="submit" value="Submit">
</input>
<p>Already have an account? <a href="login.php">Log in here</a></p>
<?php
$username = $_POST['username'];
$email = $_POST['email'];
$headers = array(
	'From' => 'noreply@tanakhyomi.com',
	'Reply-To' => 'noreply@tanakhyomi.com'
);
if (!empty($username) && !empty($email)) { 
mail("grace.thompson97@gmail.com", "User requested an account", "A user with the username $username and the email address $email requested an account.", $headers);
}
?>
</body>
</html>
