<!DOCTYPE html>

<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html" ; charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/home.css" />
    <script type="text/javascript" src="../scrypt/home.js"></script>
    <title>Rho Aias</title>
</head>

<body>

    <head>
        <h1 class="pageTitle" align="center">Rho Aias</h1>
        <ul class="navBar">
            <li class="topBar">
                <a href="./homeSite.php" class="barHover">
                    Home
                </a>
            </li>
            <li class="topBar">
                <a href="./profileSite.php" class="barHover">
                    Profile
                </a>
            </li>
            <li class="topBarLogout">
                <a href="" class="barHover">
                    Logout
                </a>
            </li>
        </ul>
    </head>
    <table class="tableStyle">
        <tr>
            <th>Website</th>
            <th>Email</th>
            <th>Password</th>
        </tr>
        <script>
            tableExpand();

        </script>
    </table>
    <div align="center">
        <button onclick="tableExpension">Add Email/Password</button>
    </div>
</body>

</html>
