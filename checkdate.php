<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Câștiguri</title>
    <link rel="stylesheet" href="css/pacific.css">
    <script src="javascript/script.js"></script>
</head>

<body id="wrapper">
    <header>
        <h1 id="logo">Închirieri Auto Elite</h1>
        <button id="burger-button" onclick="toggleMenu()">&#9776;</button>
        <div id="login">
            <a href="logout.php"><button class="inline-button">Deconectare</button></a>
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
                        <li><a href="add.php">Adaugă o mașină</a></li>
                        <li><a href="update.php">Actualizează o mașină</a></li>
                        <li><a href="check.php">Verifică încasările</a></li>
                        <li><a href="handleusers.php">Gestionează utilizatori</a></li>
                </ul>
            </nav>

        </div>

        <div class="column-right">

            <img id="coast" src="images/money.jpg" height="300px;" width="100%" />
            <section>
                <h2>Câștiguri pe tip de mașină între
                    <?php echo $_POST['sdate']." și ".$_POST['edate']; ?>
                </h2>



                <?php 
function connect(){
$con =mysqli_connect('localhost','root','');
if(!$con)
{
    echo 'Conexiune eșuată';
}
   
else if(!mysqli_select_db($con,'rental _company'))
{
    echo 'Baza de date nu a fost selectată';
}
    else{
        return $con;
}
}


$sd=$_POST['sdate'];
$ed=$_POST['edate'];



$sql="SELECT owners.NAME, cars.TYPE, SUM(reservation_details.AMOUNT) AS EARNINGS from cars INNER JOIN reservations on cars.V_ID=reservations.V_ID INNER join reservation_details on reservation_details.RES_ID=reservations.RES_ID INNER JOIN owners ON cars.O_ID=owners.O_ID WHERE reservation_details.E_DATE BETWEEN '$sd' AND '$ed' GROUP BY cars.TYPE ";

$c=connect();
$res=mysqli_query($c, $sql);
                    
                                    echo "<table>"; // începeți o etichetă de tabel în HTML
                echo "    <tr>
                            <th>PROPRIETAR</th>
                            <th>TIP</th>
                            <th>CÂȘTIGURI</th>

                          </tr>";

while($row = mysqli_fetch_array($res))
{   // Creează o buclă pentru a parcurge rezultatele
echo "<tr><td>" . $row['NAME'] . "</td><td>" . $row['TYPE'] . "</td><td>" . "$".number_format((float)$row['EARNINGS'], 2, '.', '') . "</td></tr>";}
                
                




                echo "</table>"; // Închideți tabelul în HTML

                mysqli_close($c);
                ?>

            </section>
            <footer class="footer">
                <p>&copy; 2024 Închirieri Auto Elite. Toate drepturile rezervate. | <a href="privacy-policy.php">Politica de Confidențialitate</a> | <a href="terms-of-service.php">Termeni și Condiții</a></p>
            </footer>

        </div>

    </div>



    <!-- PICIOR DE PAGINĂ CU ADRESA, DREPTURI DE AUTOR ȘI E-MAIL -->


</body>

</html>
