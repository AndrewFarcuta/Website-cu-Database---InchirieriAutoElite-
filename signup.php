<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Înregistrare</title>
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
                    <?php if (isset($_SESSION['loggedinemployee']) && $_SESSION['loggedinemployee'] == true) { ?>
                        <li><a href="add.php">Adaugă o mașină</a></li>
                        <li><a href="update.php">Actualizează o mașină</a></li>
                        <li><a href="check.php">Verifică încasările</a></li>
                        <li><a href="handleusers.php">Gestionează utilizatori</a></li>
                    <?php }
                    elseif (isset($_SESSION['loggedincustomer']) && $_SESSION['loggedincustomer'] == true) { ?>
                        <li><a href="reservations.php">Închiriază</a></li>
                    <?php } ?>
                </ul>
            </nav>
        </div>

        <div class="column-right" style="background-image: url('images/texturalogin.jpg')">
            <form id="login-form" name="form" action="signupcustomer.php" method="POST">
                <h2>Înregistrare - Client</h2>
                <label for="username">Nume utilizator:</label>
                <input type="text" id="signup-user" name="signup-user"><br><br>
                <label for="password">Parolă:</label>
                <input type="password" id="signup-pass" name="signup-pass"><br><br>
                <label for="confirm-pass">Confirmă Parola:</label>
                <input type="password" id="confirm-pass" name="confirm-pass" required><br><br>
                <input type="submit" id="signup-btn" value="Înregistrare" name="signup-submit">
            </form>
            <footer></footer>
        </div>
    </div>
</body>

</html>
