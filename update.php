<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizare</title>
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



            <!--    SECȚIUNEA DE CONȚINUT-->
            <section>
                <h2>Actualizare tarifele mașinilor</h2>
                <h3>Introduceți id-ul mașinii</h3>
                <p>Introduceți tarifele zilnice sau săptămânale, sau ambele.</p>
                <form method="post" action="updatecar.php">

                    <label for="vid">ID mașină</label>
                    <input class="ips" type="text" name="vid" id="vid" required="required" />
                    <label for="dr">Tarif zilnic</label>
                    <input class="ips" type="number" name="dr" pattern='\d{20}' id="dr" />
                    <label for="wr">Tarif săptămânal</label>
                    <input class="ips" type="number" name="wr" pattern='\d{20}' id="wr" />


                    <input class="sub" type="submit" value="Submit" id="submit" />

                </form>
                <h2>ID-uri și specificații</h2>



                <?php 
                $connection = mysqli_connect('localhost', 'root', ''); //Parola goală este parola
                mysqli_select_db($connection,'rental _company');

                $query = "SELECT * FROM cars"; 
                $result = mysqli_query($connection,$query);
                
                

                echo "<table >"; // începeți un tag de tabel în HTML
                echo "    <tr>
                            <th>ID Mașină</th>
                            <th>Model</th>
                            <th>Tip</th>
                            <th>Tarif Zilnic</th>
                            <th>Tarif Săptămânal</th>
                            <th>An</th>
                          </tr>";
                while($row = mysqli_fetch_array($result))
                {   // Creați o buclă pentru a trece prin rezultate
                echo "<tr><td>" . $row['V_ID'] . "</td><td>" . $row['MODEL'] . "</td><td>" . $row['TYPE'] . "</td><td>" ."$". $row['D_RATE'] . "</td><td>" . "$".$row['W_RATE'] . "</td><td>" . $row['YEAR'] . "</td></tr>";  //$row['index'] indexul aici este un nume de câmp
                }

                echo "</table>"; //Închideți tabelul în HTML

                mysqli_close($connection);
                ?>
            </section>
            <br />
            <footer class="footer">
                <p>&copy; 2024 Închirieri Auto Elite. Toate drepturile rezervate. | <a href="privacy-policy.php">Politica de Confidențialitate</a> | <a href="terms-of-service.php">Termeni și Condiții</a></p>
            </footer>

        </div>

    </div>







</body>

</html>
