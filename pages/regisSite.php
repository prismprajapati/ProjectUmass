<!DOCTYPE html>

<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html" ; charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/regis.css" />
    <title>Rho Aias</title>
</head>

<body>

    <head>
        <h1 class="pageTitle" align="center">Rho Aias</h1>
        <ul class="navBar">
            <li class="topBar">
                <a href="../loginSite.php" class="barHover">
                    Main
                </a>
            </li>
            <li class="topBar">
                <a href="./regisSite.php" class="barHover">
                    Registration
                </a>
            </li>
            <li class="topBar">
                <a href="" class="barHover">
                    About us
                </a>
            </li>
        </ul>
    </head>

    <div class="regisBar">
        <form action="../scrypt/php/registration.php" method="post">
            <ul class="formBar">
                <h1 class="logHeader">Registration:</h1>
                <label for="firstName">First Name:</label>
                <li>
                    <input type="text" name="firstName" />
                </li>
                <label for="lastName">Last Name:</label>
                <li>
                    <input type="text" name="lastName" />
                </li>
                <label for="emailAdd">Email:</label>
                <li>
                    <input type="email" name="emailAdd" />
                </li>
                <label for="dateOB">Date of Birth:</label>
                <li>
                    <input type="date" name="dateOB" />
                </li>
                <label for="country">Country:</label>
                <li>
                    <input type="text" name="country" />
                </li>
                <label for="psw">Password:</label>
                <li>
                    <input type="password" name="psw" />
                </li>
                <label for="pswCheck">Confirm Password:</label>
                <li>
                    <input type="password" name="pswCheck" />
                </li>
                <nav class="positionButton">
                    <button type="submit" name="registrationButton">Register</button>
                </nav>
            </ul>
        </form>
    </div>
</body>

</html>
