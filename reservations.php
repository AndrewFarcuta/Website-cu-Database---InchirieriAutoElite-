<?php
session_start();

$message = '';
$reservation_id = null;

// Function to connect to the database
function connect(){
    $con = mysqli_connect('localhost', 'root', '', 'rental _company');
    if (!$con) {
        die('Database connection error: ' . mysqli_connect_error());
    }
    return $con;
}

// Function to make a reservation
function makeres($con, $Name, $RType, $CType, $Phone, $Vid, $From, $To, $Days) {
    $Amount = 0;
    $rate = 0;
    if ($RType == 'D_RATE') {
        $check3 = "SELECT D_RATE FROM cars WHERE V_ID=$Vid";
        $res3 = mysqli_query($con, $check3) or die("Eroare la căutarea tarifului zilnic.");
        $rows3 = mysqli_fetch_array($res3);
        $rate = $rows3['D_RATE'];
        $Amount = $Days * $rate;
    } else {
        $check3 = "SELECT W_RATE FROM cars WHERE V_ID=$Vid";
        $res3 = mysqli_query($con, $check3) or die("Eroare la căutarea tarifului săptămânale.");
        $rows3 = mysqli_fetch_array($res3);
        $rate = $rows3['W_RATE'];
        $Amount = ($Days / 7) * $rate;
    }
    $Amount = number_format((float)$Amount, 2, '.', '');

    $sql = "INSERT INTO customers (NAME, PHONE, TYPE) VALUES ('$Name', '$Phone', '$CType')";
    if (!mysqli_query($con, $sql)) {
        return ['Inserarea clientului a eșuat.', null];
    }

    $check = "SELECT MAX(C_ID) FROM customers";
    $res = mysqli_query($con, $check) or die("Eroare la căutarea clientului.");
    $rows = mysqli_fetch_array($res);
    $id = $rows['MAX(C_ID)'];

    $sql2 = "INSERT INTO reservations (R_TYPE, V_ID, C_ID) VALUES ('$RType', '$Vid', '$id')";
    if (!mysqli_query($con, $sql2)) {
        return ['Inserarea rezervării a eșuat.', null];
    }

    $check2 = "SELECT MAX(RES_ID) FROM reservations";
    $res2 = mysqli_query($con, $check2) or die("Eroare la căutarea rezervării.");
    $rows2 = mysqli_fetch_array($res2);
    $id2 = $rows2['MAX(RES_ID)'];

    $sql3 = "INSERT INTO reservation_details (RES_ID, S_DATE, E_DATE, AMOUNT) VALUES('$id2', '$From', '$To', $Amount)";
    if (!mysqli_query($con, $sql3)) {
        return ['Inserarea detaliilor de rezervare a eșuat.', null];
    }

    return ['Reservat cu succes!', $id2];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Name = $_POST['name'];
    $RType = $_POST['res_type'];
    $CType = $_POST['cus_type'];
    $Phone = $_POST['phone'];
    $Vid = $_POST['vid'];
    $From = $_POST['from'];
    $To = $_POST['to'];

    $t = date_create($To);
    $f = date_create($From);
    $diff = date_diff($t, $f);
    $Days = (int)$diff->format("%a");

    $con = connect();
    $find = "SELECT RES_ID FROM reservations WHERE V_ID=$Vid";
    $find2 = mysqli_query($con, $find) or die("Error checking reservations.");

    $conflicting = false;
    while ($find3 = mysqli_fetch_array($find2)) {
        $rdi = $find3['RES_ID'];
        if (!is_null($rdi)) {
            $find4 = "SELECT * FROM reservation_details WHERE RES_ID=$rdi";
            $find5 = mysqli_query($con, $find4) or die("Error checking reservation details.");
            $find6 = mysqli_fetch_array($find5);
            if (!is_null($find6)) {
                $date = $find6['S_DATE'];
                $date2 = $find6['E_DATE'];
                if (($From >= $date && $From <= $date2) || ($To >= $date && $To <= $date2) || ($From <= $date && $To >= $date2)) {
                    $conflicting = true;
                    $message = "Rezervarea nu este posibilă, alegeți altă dată. Alegeți o dată de returnare înainte de $date sau o dată de început după $date2.";
                    break;
                }
            }
        }
    }

    if (!$conflicting) {
        list($message, $reservation_id) = makeres($con, $Name, $RType, $CType, $Phone, $Vid, $From, $To, $Days);
    }

    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html>

<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Închiriere</title>
    <link rel="stylesheet" href="css/pacific.css">
    <script src="javascript/script.js"></script>
    <style>
        .message {
            border: 2px solid #4CAF50;
            background-color: #dff0d8;
            color: #3c763d;
            padding: 15px;
            margin: 20px 20px;
            border-radius: 5px;
        }
        .message h3 {
            margin-top: 0;
        }
    </style>
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
                    <li><a href="current.php">Închirieri Curente</a></li>
                    <li><a href="myreservations.php">Verifică Rezervările</a></li>
                    <?php if (isset($_SESSION['loggedinemployee']) && $_SESSION['loggedinemployee'] == true) { ?>
                        <li><a href="add.php">Adaugă o Mașină</a></li>
                        <li><a href="update.php">Actualizează Mașină</a></li>
                        <li><a href="check.php">Verifică Câștigurile</a></li>
                    <?php } elseif (isset($_SESSION['loggedincustomer']) && $_SESSION['loggedincustomer'] == true) { ?>
                        <li><a href="reservations.php">Închiriază</a></li>
                    <?php } ?>
                </ul>
            </nav>
        </div>

        <div class="column-right">
            <section>
                <h2>Închiriază un vehicul</h2>
                <h3>Introduceți numărul vehiculului din tabelul de mai jos.</h3>
                <p>Câmpurile obligatorii sunt marcate cu un asterisc (*)</p>
                <form method="post" action="reservations.php">
                    <label for="name">*Nume: </label>
                    <input class="ips" type="text" name="name" id="name" required="required" />

                    <label for="res_type">*Tip rezervare: </label>
                    <select class="ips" name="res_type" id="res_type">
                        <option value="D_RATE">Tarif zilnic</option>
                        <option value="W_RATE">Tarif săptămânal</option>
                    </select>

                    <label for="cus_type">*Tip client:</label>
                    <select class="ips" name="cus_type" id="cus_type">
                        <option value="regular">Normal</option>
                        <option value="vip">VIP</option>
                    </select>
                    <label for="phone">*Număr de telefon:</label>
                <input class="ips" type="text" name="phone" id="phone" maxlength="12" required="required" />

                <label for="vid">*ID mașină</label>
                <input class="ips" type="number" name="vid" pattern='\d{20}' id="vid" required="required" />

                <label for="from">*De la data:</label>
                <input class="ips" type="date" name="from" id="from" required="required" />

                <label for="to">*Până la data:</label>
                <input class="ips" type="date" name="to" id="to" required="required" />

                <input class="sub" type="submit" value="Trimite" id="submit" />
            </form>

            <?php if ($message) { ?>
                <div class="message">
                    <h3><?php echo $message; ?></h3>
                    <?php if ($reservation_id) { ?>
                        <p>Rezervarea dvs. a fost realizată cu succes. ID-ul rezervării dvs. este <strong><?php echo $reservation_id; ?></strong>. Vă rugăm să rețineți acest ID sau să faceți o poză. Vă mulțumim că ați ales Închirieri Auto Elite!</p>
                    <?php } ?>
                </div>
            <?php } ?>

            <h2>ID-uri și specificații ale mașinilor</h2>
            <?php 
            $connection = connect();
            $query = "SELECT * FROM cars"; 
            $result = mysqli_query($connection, $query);

            echo "<table>"; 
            echo "    <tr>
                        <th>ID Mașină</th>
                        <th>Model</th>
                        <th>Tip</th>
                        <th>Tarif Zilnic</th>
                        <th>Tarif Săptămânal</th>
                        <th>An</th>
                      </tr>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr><td>" . $row['V_ID'] . "</td><td>" . $row['MODEL'] . "</td><td>" . $row['TYPE'] . "</td><td>" . "$" . $row['D_RATE'] . "</td><td>" . "$" . $row['W_RATE'] . "</td><td>" . $row['YEAR'] . "</td></tr>";
            }
            echo "</table>"; 
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
