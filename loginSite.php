<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html" ; charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css" />
    <title>Rho Aias</title>
</head>

<body>

    <head>
        <h1 class="pageTitle" align="center">Rho Aias</h1>
        <ul class="navBar">
            <li class="topBar">
                <a href="./loginSite.php" class="barHover">
                    Main
                </a>
            </li>
            <li class="topBar">
                <a href="./pages/regisSite.php" class="barHover">
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
    <div class="sideBarLog">
        <form action="../scrypt/login.js" method="post">
            <ul class="formBar">
                <h1 class="logHeader">Log-in:</h1>
                Email:
                <li>
                    <input type="email" name="emlreg" />
                </li>
                Password:
                <li>
                    <input type="password" name="psdreg" />
                </li>
                <nav class="positionButton">
                    <button>Login</button>
                    <button>Forget Password</button>
                </nav>
            </ul>
        </form>
    </div>
</body>

</html>
