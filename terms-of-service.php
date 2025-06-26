<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Termeni și Condiții - Închirieri Auto Elite</title>
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
            <section class="content-section">
                <h2>Termeni și Condiții</h2>
                <p>Bine ați venit la <span class="company-name">Închirieri Auto Elite</span>. Accesând sau folosind serviciile noastre, sunteți de acord să respectați următorii termeni și condiții ("Termeni și Condiții"). Vă rugăm să-i citiți cu atenție.</p>

                <h3>1. Acceptarea Termenilor</h3>
                <p>Prin utilizarea website-ului nostru și a serviciilor noastre, sunteți de acord să respectați și să fiți legal obligat de acești Termeni și Condiții și Politica noastră de Confidențialitate. Dacă nu sunteți de acord cu acești termeni, vă rugăm să nu utilizați serviciile noastre.</p>

                <h3>2. Modificări ale Termenilor</h3>
                <p>Ne rezervăm dreptul de a modifica acești Termeni și Condiții în orice moment. Orice modificări vor intra în vigoare imediat după publicarea lor pe website-ul nostru. Continuarea utilizării serviciilor noastre după orice modificare constituie acceptarea noilor termeni.</p>

                <h3>3. Utilizarea Serviciilor</h3>
                <p>Sunteți de acord să utilizați serviciile noastre numai în scopuri legale și în conformitate cu acești Termeni și Condiții. Sunteți responsabil pentru propriul comportament și activitățile pe website-ul nostru și trebuie să respectați toate legile și reglementările aplicabile.</p>

                <h3>4. Conturi Utilizator</h3>
                <p>Pentru a accesa anumite funcționalități ale serviciilor noastre, poate fi necesar să creați un cont. Sunteți responsabil pentru menținerea confidențialității informațiilor contului dumneavoastră și pentru toate activitățile care apar sub contul dumneavoastră. Sunteți de acord să ne notificați imediat în cazul oricărei utilizări neautorizate a contului dumneavoastră.</p>

                <h3>5. Rezervări și Plăți</h3>
                <p>Toate rezervările sunt supuse disponibilității și trebuie confirmate de noi. Sunteți de acord să furnizați informații exacte și complete atunci când faceți o rezervare. Plățile trebuie efectuate conform politicilor noastre de plată.</p>

                <h3>6. Anulări și Rambursări</h3>
                <p>Politica noastră de anulare și rambursare este descrisă pe website-ul nostru. Vă rugăm să revizuiți aceste politici cu atenție înainte de a face o rezervare. Prin efectuarea unei rezervări, sunteți de acord să respectați aceste politici.</p>

                <h3>7. Limitarea Răspunderii</h3>
                <p>În măsura permisă de lege, <span class="company-name">Închirieri Auto Elite</span> nu va fi responsabil pentru niciun prejudiciu indirect, incidental, special sau consecvent rezultat din sau în legătură cu utilizarea serviciilor noastre.</p>

                <h3>8. Despăgubire</h3>
                <p>Sunteți de acord să despăgubiți și să ne exonerați pe noi, <span class="company-name">Închirieri Auto Elite</span>, filialele noastre și directorii, ofițerii, angajații și agenții lor, de orice pretenții, răspunderi, daune, pierderi și cheltuieli rezultate din sau în orice fel legate de utilizarea serviciilor noastre.</p>
                <h3>9. Legea Aplicabilă</h3>
                <p>Acești Termeni și Condiții vor fi guvernați și interpretați în conformitate cu legile României, fără a ține cont de conflictele de legi.</p>

                <h3>10. Contact</h3>
                <p>Dacă aveți întrebări sau nelămuriri cu privire la acești Termeni și Condiții, vă rugăm să ne contactați la:</p>
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


