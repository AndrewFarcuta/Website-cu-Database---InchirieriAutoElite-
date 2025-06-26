<?php


$con =mysqli_connect('localhost','root','');
if(!$con)
{
    echo 'Not connected';
}
   
if(!mysqli_select_db($con,'rental _company'))
{
    echo 'Databse not selected';
}

$rd=$_POST['r'];

$sql3="SELECT C_ID FROM reservations WHERE RES_ID='$rd'";
$res3=mysqli_query($con,$sql3) or die("error");
$ro=mysqli_fetch_array($res3);
$cd=$ro['C_ID'];

$sql="DELETE FROM reservation_details WHERE RES_ID='$rd'";
$sql2="DELETE  FROM reservations WHERE RES_ID='$rd'";
$sql4="DELETE  FROM customers WHERE C_ID='$cd'";
mysqli_query($con,$sql) or die("error");
mysqli_query($con,$sql2) or die("error");
mysqli_query($con,$sql4) or die("error");
?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link rel="stylesheet" href="css/pacific.css">
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

                <img id="coast" src="images/slide1.png" height="350px;" width="100%" />
                <!--    THE CONTENT SECTION-->
                <section>
                    <h2>Închirieri Auto Elite</h2>

                    <h3>Masina închiriată de tine a fost returnată!</h3>

                    <address>
                    <p>
            <span class="company-name">Servicii Închirieri Auto Elite</span> <br>
            Strada Universității nr.1<br>
            Oradea, Romania 410087 <br><br>
    <a href="mailto:support@inchirieriautoelite.com" class="email-link">support@inchirieriautoelite.com</a> <br>
    </p>
        </address>
                </section>
                <footer class="footer">
    <p>© 2024 Închirieri Auto Elite. Toate drepturile rezervate. | <a href="privacy-policy.php">Politica de Confidențialitate</a> | <a href="terms-of-service.php">Termeni și Condiții</a></p>
    </footer>

            </div>

        </div>
    </body>

    </html>
