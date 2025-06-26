<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Politica de Confidențialitate - Închirieri Auto Elite</title>
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
            <section class="content-section">
                <h2>Politica de Confidențialitate</h2>
                <p>La <span class="company-name">Închirieri Auto Elite</span>, ne angajăm să protejăm confidențialitatea dumneavoastră și să ne asigurăm că informațiile dumneavoastră personale sunt gestionate într-un mod sigur și responsabil. Această Politică de Confidențialitate descrie modul în care colectăm, utilizăm și protejăm informațiile dumneavoastră atunci când vizitați site-ul nostru sau utilizați serviciile noastre.</p>

                <h3>Informațiile pe Care le Colectăm</h3>
                <p>Putem colecta următoarele tipuri de informații:</p>
                <ul>
                    <li><strong>Informații Personale:</strong> Acestea includ numele dumneavoastră, adresa de email, numărul de telefon și informațiile de plată atunci când faceți o rezervare sau vă înregistrați pentru serviciile noastre.</li>
                    <li><strong>Date de Utilizare:</strong> Colectăm informații despre modul în care interacționați cu site-ul nostru, cum ar fi adresa IP, tipul de browser și paginile pe care le vizitați.</li>
                    <li><strong>Cookies:</strong> Site-ul nostru utilizează cookie-uri pentru a îmbunătăți experiența dumneavoastră și pentru a colecta informații despre comportamentul vizitatorilor.</li>
                </ul>

                <h3>Folosirea Informațiilor Dumneavoastră</h3>
                <p>Folosim informațiile dumneavoastră în următoarele scopuri:</p>
                <ul>
                    <li>Pentru a procesa rezervările dumneavoastră și a vă oferi serviciile solicitate.</li>
                    <li>Pentru a comunica cu dumneavoastră despre rezervările dumneavoastră și pentru a vă oferi suport pentru clienți.</li>
                    <li>Pentru a îmbunătăți site-ul nostru și serviciile pe baza feedback-ului și a modelelor de utilizare.</li>
                    <li>Pentru a vă trimite oferte promoționale și actualizări despre serviciile noastre, dacă v-ați abonat să primiți astfel de comunicări.</li>
                </ul>

                <h3>Modul în Care Protejăm Informațiile Dumneavoastră</h3>
                <p>Implementăm o varietate de măsuri de securitate pentru a menține siguranța informațiilor dumneavoastră personale. Aceste măsuri includ servere securizate, criptare și acces restricționat la informațiile dumneavoastră.</p>

                <h3>Partajarea Informațiilor Dumneavoastră</h3>
                <p>Nu vindem, nu schimbăm și nu transferăm informațiile dumneavoastră personale către părți terțe, cu excepția cazului în care este necesar pentru a furniza serviciile noastre sau pentru a respecta legea. Acest lucru poate include partajarea informațiilor cu furnizorii de servicii terțe de încredere care ne ajută să operăm site-ul nostru și să desfășurăm afacerile noastre.</p>            
                <h3>Opțiunile Dumneavoastră</h3>
                <p>Aveți dreptul să accesați, să actualizați sau să ștergeți informațiile dumneavoastră personale în orice moment. De asemenea, puteți renunța să primiți comunicări promoționale de la noi prin urmarea instrucțiunilor de dezabonare din emailurile noastre sau contactându-ne direct.</p>

                <h3>Modificări ale Politicii noastre de Confidențialitate</h3>
                <p>Putem actualiza această Politică de Confidențialitate din când în când. Vă vom notifica cu privire la orice modificări semnificative prin postarea noii Politici de Confidențialitate pe site-ul nostru și actualizarea datei de intrare în vigoare. Utilizarea continuă a site-ului nostru și a serviciilor noastre după astfel de modificări constituie acceptarea politicii actualizate.</p>

                <h3>Contactați-ne</h3>
                <p>Dacă aveți întrebări sau preocupări legate de această Politică de Confidențialitate sau practicile noastre de confidențialitate, vă rugăm să ne contactați la:</p>
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
            <p>&copy; 2024 Închirieri Auto Elite. Toate drepturile rezervate. | <a href="privacy-policy.php">Politica de Confidențialitate</a> | <a href="terms-of-service.php">Termeni și Condiții</a></p>
            
        </footer>
    </div>

</div>
</body>
</html>
