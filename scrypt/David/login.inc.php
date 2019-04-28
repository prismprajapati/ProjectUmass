<?php

	//First we start a session
	session_start();

	//We then check if the user has clicked the login button
	if (isset($_POST['submit'])) {

		//Then we include the database connection
		include_once 'connect.php';
		//And we get the data from the login form
		$Email = $_POST['emlreg'];
		$Password = $_POST['psdreg'];

		//Error handlers
		//Error handlers are important to avoid any mistakes the user might have made when filling out the form!
		//Check if inputs are empty
		if (empty($Email[0]) || empty($Password[0])) {
			header("Location: ../main_login.php?login=zero");
			exit();
		}
		else {
			//Check if username exists in the database USING PREPARED STATEMENTS
			$sql = "SELECT * FROM users_info WHERE Email=?;";
			//Create a prepared statement
			$stmt = mysqli_stmt_init($conn);
			//Check if prepared statement fails
			if(!mysqli_stmt_prepare($stmt, $sql)) {
			    header("Location: ../main_login.php?login=first");
			    exit();
			}
			//If the prepared statement didn't fail, then continue
			else {
				//Bind parameters/data to the placeholder (?) in our $sql
				mysqli_stmt_bind_param($stmt, "ss", $Email, $Email);

				//Run query in database
				mysqli_stmt_execute($stmt);

				//Get results from query
	      		$result = mysqli_stmt_get_result($stmt);

				//If we had a result, which means the username does exist, then assign the database row data to $row.
				if ($row = mysqli_fetch_assoc($result)) {
					//De-hashing the password using the password provided by the user, and the password from the database, to see if they match.
					$hashedPwdCheck = password_verify($Password, $row['Password']);
					//If they didn't match!
					if ($hashedPwdCheck == false) {
						header("Location: ../main_login.php?login=second");
						exit();
					}
					//If they did match!
					elseif ($hashedPwdCheck == true) {
						//Set SESSION variables and log user in
						$_SESSION['u_id'] = $row['ID'];
						$_SESSION['u_email'] = $row['Email'];
						$_SESSION['u_first'] = $row['First_Name'];
						$_SESSION['u_last'] = $row['Last_Name'];
						header("Location: ../main_login.php?login=success");
						exit();
					}
	      } else {
	        header("Location: ../main_login.php?login=third");
				exit();
	      }
			}
		}

		//Close the prepared statement
		mysqli_stmt_close($stmt);
	} else {
		header("Location: ../main_login.php?login=forth");
		exit();
	}
