<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Rezervare completă</title>
    <link rel="stylesheet" href="css/pacific.css">
    <script src="javascript/script.js"></script>
</head>

<body id="wrapper">
    <header>
        <h1 id="logo">Închirieri Auto Elite</h1>
        <button id="burger-button" onclick="toggleMenu()">&#9776;</button>
        <div id="login">
            <?php if (isset($_SESSION['loggedinemployee']) && $_SESSION['loggedinemployee'] == true) { ?>
                <a href="logout.php"><button class="inline-button">Deconectare</button></a>
            <?php } elseif (isset($_SESSION['loggedincustomer']) && $_SESSION['loggedincustomer'] == true) { ?>
                <a href="logout.php"><button class="inline-button">Deconectare</button></a>
            <?php } else { ?>
                <a href="employee.php"><button class="inline-button">Angajat</button></a>
                <a href="customer.php"><button class="inline-button">Client</button></a>
            <?php } ?>
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

        <div class="column-right">
            <section>
                <h2>Rezervare completă</h2>
                <p>Vă mulțumim că sunteți clientul nostru!</p>
                <p>Rezervarea dvs. a fost finalizată cu succes.</p>
                <p>Puteți găsi rezervările dvs. pe pagina de <a href="current.php" class="email-link">Închirieri Curente</a>.</p>
                <p>Pentru orice asistență suplimentară, contactați-ne la:</p>
                <p>Email: <a href="mailto:support@inchirieriautoelite.com" class="email-link">support@inchirieriautoelite.com</a></p>
                <p>Apreciem afacerea dvs. și sperăm să vă bucurați de experiența dvs. de închiriere cu Închirieri Auto Elite.</p>
            </section>
            <footer class="footer">
            <p>&copy; 2024 Închirieri Auto Elite. Toate drepturile rezervate. | <a href="privacy-policy.php">Politica de Confidențialitate</a> | <a href="terms-of-service.php">Termeni și Condiții</a></p>
            </footer>
        </div>
    </div>
    
</body>

</html>
