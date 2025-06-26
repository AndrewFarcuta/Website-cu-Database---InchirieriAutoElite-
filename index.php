<?php
session_start();
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
        <?php if (isset($_SESSION['loggedinemployee']) && $_SESSION['loggedinemployee'] == true) { ?>
                    <a href="logout.php"><button class="inline-button">Deconectare</button></a>
                    <?php } 
                elseif (isset($_SESSION['loggedincustomer']) && $_SESSION['loggedincustomer'] == true) { ?>
                        <a href="logout.php"><button class="inline-button">Deconectare</button></a>
                        <?php }
                else { ?>
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

        <img id="first-pic" src="images/slide1.png" height="350px;" width="100%" />
        <div class="slideshow-container">
            <div class="mySlides fade">
            <div class="numbertext">1 / 4</div>
            <img src="images/slide1.png" style="width:100%">
            </div>

            <div class="mySlides fade">
            <div class="numbertext">2 / 4</div>
            <img src="images/slide2.png" style="width:100%">
            </div>
            <div class="mySlides fade">
            <div class="numbertext">3 / 4</div>
            <img src="images/slide3.png" style="width:100%">
            </div>
            <div class="mySlides fade">
            <div class="numbertext">4 / 4</div>
            <img src="images/slide4.png" style="width:100%">
            </div>
            <a class="prev" onclick="plusSlides(-1)">❮</a>
            <a class="next" onclick="plusSlides(1)">❯</a>

        </div>
    <section class="content-section">
    <h2>Bine ați venit la Închirieri Auto Elite</h2>
    <p>La <span class="company-name">Închirieri Auto Elite</span>, oferim o selecție extinsă de vehicule pentru a satisface toate nevoile dvs. de transport, fie că este vorba de turism, afaceri sau ocazii speciale. Angajamentul nostru este de a vă oferi servicii de cea mai înaltă calitate și mașini fiabile la tarife competitive.</p>
    
    <h3>De ce să ne alegeți?</h3>
    <ul>
        <li><strong>Gama Largă de Vehicule:</strong> De la mașini compacte la limuzine de lux, SUV-uri și microbuze, avem un vehicul pentru fiecare cerință și buget.</li>
        <li><strong>Rezervări Ușoare:</strong> Platforma noastră prietenoasă vă permite să navigați printre mașinile disponibile, să faceți rezervări și să vă gestionați rezervările fără efort.</li>
        <li><strong>Serviciu Clienți Excepțional:</strong> Echipa noastră dedicată de suport este disponibilă 24/7 pentru a vă asista cu orice întrebări sau probleme pe care le puteți avea.</li>
        <li><strong>Opțiuni Flexibile de Închiriere:</strong> Oferim planuri de închiriere zilnice, săptămânale și lunare pentru a vă putea potrivi programului și preferințelor dvs.</li>
        <li><strong>Prețuri Competitve:</strong> Bucurați-vă de o tarifare transparentă fără taxe ascunse și de oferte excelente pentru închirieri pe termen lung.</li>
    </ul>
    
    <h3>Serviciile Noastre</h3>
    <ul>
        <li>Consultați Mașinile</li>
        <li>Faceți o Rezervare</li>
        <li>Verificați Rezervările</li>
    </ul>

    <h3>Contactați-ne</h3>
    <p>Pentru orice întrebări sau asistență, vă rugăm să ne contactați:</p>
    <address>
        <p>
            <span class="company-name">Servicii Închirieri Auto Elite</span> <br>
            Strada Universității nr.1<br>
            Oradea, Romania 410087 <br><br>
    <a href="mailto:support@inchirieriautoelite.com" class="email-link">support@inchirieriautoelite.com</a> <br>
    </p>
    </address>
    </section>
    <br />
    <footer class="footer">
    <p>© 2024 Închirieri Auto Elite. Toate drepturile rezervate. | <a href="privacy-policy.php">Politica de Confidențialitate</a> | <a href="terms-of-service.php">Termeni și Condiții</a></p>
    </footer>
    </div>
</body>
</html>
