<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adăugare mașină</title>
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
                <h2> Adăugă o mașină</h2>
                <h3>Completați Detaliile Mașinii</h3>
                <p>Câmpurile obligatorii sunt marcate cu un asterisc (*)</p>
                <form method="post" action="caradd.php">

                    <label for="model">*Model: </label>
                    <input class="ips" type="text" name="model" id="model" required="required" />

                    <label for="type">*Tip: </label>
                    <input class="ips" type="text" name="type" id="type" required="required" />

                    <label for="drate">*Tarif Zilnic</label>
                    <input class="ips" type="number" name="drate" id="drate" required="required" />

                    <label for="wrate">*Tarif Săptămânal</label>
                    <input class="ips" type="number" name="wrate" id="wrate" required="required" />

                    <label for="year">*An</label>
                    <input class="ips" type="number" name="year" id="year" required="required" />

                    <label for="rad">*Proprietar Nou?</label>
                    <input type="radio" name="rad" id="yes" value="yes" onClick="yesFunction()" />Da
                    <input type="radio" name="rad" id="no" value="no" onClick="noFunction()" />Nu
                    <br /><br />
                    <label class="ipshidden" for="owner">*Nume Proprietar: </label>
                    <input class="ipshidden" type="text" name="owner" id="owner" />
                    <label class="ipshidden" for="otype">*Tip Proprietar: </label>
                    <input class="ipshidden" type="text" name="otype" id="otype" />
                    <label class="ipshidden" for="ophone">*Telefon: </label>
                    <input class="ipshidden" type="text" name="ophone" id="ophone" />


                    <label class="ipshidden2" for="oid">*ID-ul proprietarului</label>
                    <input class="ipshidden2" type="number" name="oid" id="oid" />


                    <br /><br />
                    <input class="sub" type="submit" value="Trimite" id="submit" />

                </form>

                <?php if (isset($_SESSION['message'])) { ?>
                    <div class="message">
                        <h3><?php echo $_SESSION['message']; ?></h3>
                    </div>
                    <?php unset($_SESSION['message']); // Șterge mesajul din sesiune după afișare ?>
                <?php } ?>
            </section>

            <br />
            <footer class="footer">
                <p>&copy; 2024 Închirieri Auto Elite. Toate drepturile rezervate. | <a href="privacy-policy.php">Politica de Confidențialitate</a> | <a href="terms-of-service.php">Termeni și Condiții</a></p>
            </footer>


        </div>

    </div>





    <script type="text/javascript">
        function yesFunction() {
            var x = document.getElementsByClassName('ipshidden');
            var y = document.getElementsByClassName('ipshidden2');
            for (var i = 0; i < 2; i++) {
                y[i].style.display = "none";
            }

            for (var i = 0; i < 6; i++) {
                if (x[i].style.display == "none") {
                    x[i].style.display = "block";
                    //                                } else {
                    //                                    x[i].style.display = "none";
                    //                                }

                }
            }

        }

        function noFunction() {
            var y = document.getElementsByClassName('ipshidden2');
            var x = document.getElementsByClassName('ipshidden');
            for (var i = 0; i < 6; i++) {
                x[i].style.display = "none";
            }

            for (var i = 0; i < 2; i++) {

                if (y[i].style.display == "none") {
                    y[i].style.display = "block";
                    // } else { // y[i].style.display = "none"; // }

                }
            }

        }

    </script>

</body>

</html>
