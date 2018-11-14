<?php
	session_start();
	$errorMessage = '';
	if(isset($_POST['txtUserId']) && isset($_POST['txtPassword'])){
		include 'library/config.php';
		include 'library/opendb.php';

		$userId = $_POST['txtUserId'];
		$password = $_POST['txtPassword'];

		$sql = "SELECT user_id FROM user WHERE user_id = '$userId' AND user_password = '$password'";

		$result = mysqli_query($conn, $sql) or die ('Query failed .'. mysql_error());
		if (mysqli_num_rows($result) == 1) {
			$_SESSION['db_is_logged_in'] = true;

			header('Location: index.php');
		}else{
			$errorMessage = 'Sorry, user id atau password salah';
		}
		include 'library/closedb.php';
	}
	?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>Basic Login</title>
</head>
<body>

	<?php
		if($errorMessage !=''){
	?>
	<p align="center">
		<strong>
			<font color="#990000">
				<?php
				echo $errorMessage;
				?>
			</font>
		</strong>
	</p>
	<?php
	}
	?>

	<form action="" method="post" name="frmLogin" id="frmLogin">
		<table width="400" border="1" align="center" cellpadding="2" cellspacing="2">
			<tr>
				<td width="150">
					User Id
				</td>
				<td>
					<input type="text" name="txtUserId" id="txtUserId">
				</td>
			</tr>

			<tr>
				<td width="150">
					Password
				</td>
				<td>
					<input type="password" name="txtPassword" id="txtPassword">
				</td>
			</tr>

			<tr>
				<td width="150">
					&nbsp;
				</td>
				<td>
					<input type="submit" name="btnLogin" id="btnLogin">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>