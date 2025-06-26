<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionează utilizatori</title>
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
                <h2>Gestionează Utilizatori</h2>
                <table>
                    <tr>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Acțiune</th>
                    </tr>
                    <?php
                    // Funcția de conectare la baza de date
                    function connect(){
                        $con = mysqli_connect('localhost', 'root', '', 'rental _company');
                        if (!$con) {
                            die('Eroare de conectare la baza de date: ' . mysqli_connect_error());
                        }
                        return $con;
                    }

                    // Funcția de obținere a utilizatorilor din baza de date
                    function getUsers($con) {
                        $sql = "SELECT * FROM logincustomer";
                        $result = mysqli_query($con, $sql);

                        $users = array();
                        while ($row = mysqli_fetch_assoc($result)) {
                            $users[] = $row;
                        }

                        return $users;
                    }

                    // Funcția de ștergere a unui utilizator din baza de date
                    function deleteUser($con, $username) {
                        $sql = "DELETE FROM logincustomer WHERE username='$username'";
                        if (mysqli_query($con, $sql)) {
                            return true;
                        } else {
                            return false;
                        }
                    }

                    // Verifică dacă cererea este de tip POST și procesează acțiunile
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        if (isset($_POST['delete_user'])) {
                            $username_to_delete = $_POST['username'];
                            $con = connect();
                            deleteUser($con, $username_to_delete);
                            mysqli_close($con);
                        }
                    }

                    // Obține utilizatorii și afișează în tabel
                    $con = connect();
                    $users = getUsers($con);
                    foreach ($users as $user) {
                        echo "<tr>";
                        echo "<td>" . $user['username'] . "</td>";
                        echo "<td>Parolă ascunsă</td>";
                        echo "<td>";
                        echo "<form method='post'>";
                        echo "<input type='hidden' name='username' value='" . $user['username'] . "'>";
                        echo "<button type='submit' name='delete_user'>Șterge</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    mysqli_close($con);
                    ?>
                </table>
            </section>

            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_user'])) { ?>
                <p style="padding: 20px">
                    <?php
                    if (isset($_POST['username'])) {
                        echo "Utilizatorul " . $_POST['username'] . " a fost șters cu succes.";
                    }
                    ?>
                </p>
            <?php } ?>

            <br />
            <footer class="footer" style="margin-bottom:0;">
                <p>&copy; 2024 Închirieri Auto Elite. Toate drepturile rezervate. | <a href="privacy-policy.php">Politica de Confidențialitate</a> | <a href="terms-of-service.php">Termeni și Condiții</a></p>
            </footer>


        </div>

    </div>

</body>

</html>
