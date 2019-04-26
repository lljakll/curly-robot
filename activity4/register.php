<?php
    // CST-126 Blog Project 2.0
    // Module: index.php  Version: 1.4
    // Jackie Adair
    // 25 April 2019
    // Site Main Page
 
	require_once("header.php");
?>
	
<!DOCTYPE html>
<html>
	<head>
		<title>Registration Form</title>
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
		<h1>Register</h1>
		<div class="baseForm">
			<form action="registerHandler.php" method="POST">
				<table>
					<tr>
						<td>First Name: </td>
						<td><input type="text" name="userFirst"></td>
					</tr>
						<td>Last Name: </td>
						<td><input type="text" name="userLast"></td>
					</tr>
					<tr>
						<td>UserName: </td>
						<td><input type="text" name="userName"></td>
					</tr>
					<tr>
						<td>Email: </td>
						<td><input type="text" name="userEmail"></td>
					</tr>
					<tr>
						<td>Password: </td>
						<td><input type="password" name="userPass"></td>
					</tr>
					<tr>
						<td>Confirm: </td>
						<td><input type="password" name="userPass2"></td>
					</tr>
					<tr><td colspan="2"> </td></tr>
					<tr>
					<td colspan="2" align="center"><input type="submit" value="submit"></td>
					</tr>
					<tr>
						<td colspan="2" align="center"><a href="index.html">Main Menu</a></td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>

<?php
    require_once("footer.php");
?>