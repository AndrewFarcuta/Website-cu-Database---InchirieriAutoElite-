<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezervări</title>
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

            <!-- SECȚIUNEA DE CONȚINUT -->
            <section>
                <h2> Rezervări la Închirieri Auto Elite</h2>
                <h3>Rezervările Mele</h3>

                <form method="post" action="myreservations.php">

                    <label for="rid">ID Rezervare: </label>

                    <input class="ips" type="number" name="rid" id="rid" size="35" />


                    <input class="sub" type="submit" value="Trimite" name="sub" />
                </form>

                <?php
    
                if(isset($_POST['sub']))
                {
        
                include('connect.php');
                $rid=$_POST['rid'];
                
                $query="SELECT * FROM reservations WHERE RES_ID = '$rid'";
                $result=mysqli_query($con,$query) or die("eroare");
                $row = mysqli_fetch_array($result);
                $cid=$row['C_ID'];
                $vid=$row['V_ID'];
                
                $query2="SELECT S_DATE, E_DATE, AMOUNT from reservation_details where RES_ID='$rid'";
                $result2=mysqli_query($con,$query2) or die("eroare");
                $row2=mysqli_fetch_array($result2); 
                $amount=$row2['AMOUNT'];    
                $sdate=$row2['S_DATE'];
                $edate=$row2['E_DATE'];
                    
                $query3="SELECT NAME from customers where C_ID='$cid'";
                $result3=mysqli_query($con,$query3) or die("eroare");
                $row3=mysqli_fetch_array($result3); 
                $name=$row3['NAME'];  
                

                $query4="SELECT MODEL from cars where V_ID='$vid'";
                $result4=mysqli_query($con,$query4) or die("eroare");
                $row4=mysqli_fetch_array($result4); 
                $car=$row4['MODEL'];                     
                    

                }
    
                ?>
                    <br /><br />

                    <form method="post" action="return.php">

                        <label for="fname">Nume: </label>
                        <input class="ips" type="text" name="fname" id="fname" autocomplete="off" readonly />

                        <label for="mod">Model: </label>
                        <input class="ips" type="text" name="mod" id="mod" autocomplete="off" readonly />

                        <label for="sdate">Data de început:</label>
                        <input class="ips" type="date" name="sdate" id="sdate" readonly autocomplete="off" />

                        <label for="edate">Data de sfârșit:</label>
                        <input class="ips" type="date" name="edate" id="edate" readonly autocomplete="off" />

                        <label for="amnt">Suma datorată: </label>
                        <input class="ips" type="number" name="amnt" id="amnt" readonly autocomplete="off" />


                        <input class="ips" type="number" name="r" id="r" readonly autocomplete="off" style="display:none;" />
                        <?php if (isset($_SESSION['loggedinemployee']) && $_SESSION['loggedinemployee'] == true || isset($_SESSION['loggedincustomer']) && $_SESSION['loggedincustomer'] == true) { ?>
                        <input class="sub" type="submit" value="Return" name="sub" />
                        <?php }?>

                    </form>




            </section>

            <script type="text/javascript">
                var name = "<?php echo $row3['NAME'];?>";
                var model = "<?php echo $row4['MODEL'];?>";
                var st = "<?php echo $row2['S_DATE'];?>";
                var ed = "<?php echo $row2['E_DATE'];?>";
                var amount = "<?php echo $row2['AMOUNT'];?>";
                var r = "<?php echo $_POST['rid'];?>"  
                document.getElementById('fname').value = name;
            document.getElementById('mod').value = model;
            document.getElementById('sdate').value = st;
            document.getElementById('edate').value = ed;
            document.getElementById('amnt').value = amount;
            document.getElementById('r').value = r;

        </script>

        <br />
        <footer class="footer">
            <p>&copy; 2024 Închirieri Auto Elite. Toate drepturile rezervate. | <a href="privacy-policy.php">Politica de Confidențialitate</a> | <a href="terms-of-service.php">Termeni și Condiții</a></p>
        </footer>


    </div>

</div>
</body>
</html> 
