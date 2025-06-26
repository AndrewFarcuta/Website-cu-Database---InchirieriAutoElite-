<?php 
    include("connection.php");
    include("login.php")
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acasă</title>
    <link rel="stylesheet" href="css/pacific.css">
    
    <script src="javascript/script.js"></script>
</head>

<body id="wrapper">
    <header>
        <h1 id="logo">Închirieri Auto Elite</h1>
        <button id="burger-button" onclick="toggleMenu()">&#9776;</button>
        <div id="login">
         <a href="employee.php"><button class="inline-button">Angajat</button></a>
         <a href="customer.php"><button class="inline-button">Client</button></a>
        </div>
    </header>


    <div class="row">
        <div class="column-left">

            <nav>
                <ul>
                    <li><a href="index.php">Acasă</a></li>
                    <li><a href="cars.php">Mașini</a></li>
                    <li><a href="owners.php">Proprietari</a></li>
                    <li><a href="current.php">Închirieri curente</a></li>
                    <li><a href="myreservations.php">Verifică rezervările</a></li>
                </ul>
            </nav>

        </div>

        <div class="column-right" style="background-image: url('images/texturalogin.jpg')">

            <form id="login-form" name="form" action="login.php" onsubmit="return isvalid()" method="POST">
                <h2>Autentificare - Angajat</h2>
                <label for="username">Nume utilizator:</label>
                <input type="text" id="user" name="user"><br><br>
                <label for="password">Parolă:</label>
                <input type="password" id="pass" name="pass"><br><br>
                <input type="submit" id="btn" value="Autentificare" name = "submit">
            </form>

            <footer>

            </footer>

        </div>

    </div>

</body>

</html>
