<?php
	session_start();
	//Here we include our database connection
	include_once 'regconnect2.php';

	//Here we fetch the data from the URL that was passed from our HTML form
	$FirstName = $_POST['fnamreg'];
	$LastName = $_POST['lnamreg'];
	$Email = $_POST['emlreg'];
	$DOB = $_POST['dobreg'];
	$Country = $_POST['cntryreg'];
	$Password = $_POST['psdreg'];

	//Error handlers
	//Check for empty fields
	if (empty($FirstName) || empty($LastName) || empty($Email) || empty($DOB) || empty($Country) || empty($Password)) {
		header("Location: ../form.php?signup=empty");
		exit();
	} else {
		//Check if input characters are valid
		if (!preg_match("/^[a-zA-Z]*$/", $FirstName) || !preg_match("/^[a-zA-Z]*$/", $LastName)) {
			header("Location: ../form.php?signup=invalid");
			exit();
		} else {
			//Check if email is valid
			if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
				header("Location: ../form.php?signup=email");
			exit();
		} else {
			 //Hashing the password
			 $hashedPwd = password_hash($Password, PASSWORD_DEFAULT);
			 //Insert the user into the database
			 $sql = "INSERT INTO users_info (First_Name, Last_Name, Email, DOB, Country, Password) VALUES ('$FirstName', '$LastName', '$Email', '$DOB', '$Country', '$hashedPwd');";
			 mysqli_query($conn, $sql);
			 header("Location: ../form.php?signup=success");
			 exit();
			}
		}
	}

	//Here we create a SQL statement that insert data into our database
	//$sql = "INSERT INTO users_info (First_Name, Last_Name, Email, DOB, Country, Password) VALUES ('$FirstName', '$LastName', '$Email', '$DOB', '$Country', '$Password');";
	//Here we "query" the data in the database
	//mysqli_query($conn, $sql);

	//We don't need to do anythin else in order to insert data
	//HOWEVER!!!
	//We have not added ANY security to our code by filtering the data the user typed into the HTML form. We will learn about security later using prepared statements!

	//Here we go back to the front page
	//header("Location: ../form.php?signup=success");