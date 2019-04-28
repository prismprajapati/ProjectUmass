<?php

if(isset($_POST['registrationButton'])){

  require "./connectDB.php";

  $fstName = $_POST['firstName'];
  $lstName = $_POST['lastName'];
  $eMail = $_POST['emailAdd'];
  $dOb = $_POST['dateOB'];
  $countryName = $_POST['country'];
  $pwUser = $_POST['psw'];
  $pwUserCheck = $_POST['pswCheck'];

  if(!filter_var($eMail, FILTER_VALIDATE_EMAIL)){
    header("Location: ../../pages/regisSite.php?error=invalidEmailAddress&firstName=".$fstName."&lastName=".$lstName);
    exit();
  }

  elseif($pwUser != $pwUserCheck){
    header("Location: ../../pages/regisSite.php?error=passwordDoesNotMatch&firstName=".$fstName."&lastName=".$lstName."&emailAdd=".$eMail."&country=".$countryName);
    exit();
  }

  else{
    $sqlStatement = "SELECT emailAddress FROM userinfo WHERE emailAddress = ?";
    $statStatement = mysqli_stmt_init($conDB);
    if(!mysqli_stmt_prepare($statStatement, $sqlStatement)){
      header("Location: ../../pages/regisSite.php?error=sqlError");
      exit();
    }

    else{
      mysqli_stmt_bind_param($statStatement, "s", $eMail);
      mysqli_stmt_execute($statStatement);
      mysqli_stmt_store_result($statStatement);
      $checkEmail = mysqli_stmt_num_rows($statStatement);
      if ($checkEmail > 0) {
        header("Location: ../../pages/regisSite.php?error=emailAlreadyUsed&firstName=".$fstName."&lastName=".$lstName."&country=".$countryName);
        exit();
      }
      else {
          $sqlStatement = "INSERT INTO userinfo(fName, sName, emailAddress, dateOFbirth, country, pswUser) VALUES(?, ?, ?, ?, ?, ?)";
          $statStatement = mysqli_stmt_init($conDB);
          if(!mysqli_stmt_prepare($statStatement, $sqlStatement)){
          header("Location: ../../pages/regisSite.php?error=sqlError2");
          exit();
        }
          else {
            mysqli_stmt_bind_param($statStatement, "ssssss", $fstName, $lstName, $eMail, $dOb, $countryName, $pwUser);
            mysqli_stmt_execute($statStatement);
            header("Location: ../../pages/regisSite.php?registrationSuccessful");
            exit();
        }
      }
    }
  }
  mysqli_stmt_close($statStatement);
  mysqli_close($conDB);
  }
else{
  header("Location: ../../pages/regisSite.php");
  exit();
}
?>
