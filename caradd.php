<?php
session_start(); // Începe sesiunea

$con = mysqli_connect('localhost', 'root', '');
if (!$con) {
    die('Not connected');
}

if (!mysqli_select_db($con, 'rental _company')) {
    die('Database not selected');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $oname = mysqli_real_escape_string($con, $_POST['owner']);
    $ophone = mysqli_real_escape_string($con, $_POST['ophone']);
    $otype = mysqli_real_escape_string($con, $_POST['otype']);
    $oid = mysqli_real_escape_string($con, $_POST['oid']);
    $model = mysqli_real_escape_string($con, $_POST['model']);
    $type = mysqli_real_escape_string($con, $_POST['type']);
    $drate = mysqli_real_escape_string($con, $_POST['drate']);
    $wrate = mysqli_real_escape_string($con, $_POST['wrate']);
    $year = mysqli_real_escape_string($con, $_POST['year']);

    $message = "";

    if ($oid == '') {
        $sql = "INSERT INTO owners(NAME, PHONE, O_TYPE) VALUES('$oname', '$ophone', '$otype')";
        if (!mysqli_query($con, $sql)) {
            $message .= "<br />Proprietarii nu au fost inserați.";
        } else {
            $message .= "<br />Proprietarii au fost inserați.";
        }
        $sql2 = "SELECT MAX(O_ID) FROM owners;";
        $result = mysqli_query($con, $sql2) or die("error");
        $row = mysqli_fetch_array($result);
        $newid = $row['MAX(O_ID)'];
        $sql3 = "INSERT INTO cars(MODEL, TYPE, D_RATE, W_RATE, O_ID, YEAR) VALUES('$model','$type','$drate','$wrate','$newid','$year')";
        if (!mysqli_query($con, $sql3)) {
            $message .= "<br />Mașina a fost adaugată.";
        } else {
            $message .= "<br />Mașina a fost adaugată.";
        }
    } else {
        $sql4 = "INSERT INTO cars(MODEL, TYPE, D_RATE, W_RATE, O_ID, YEAR) VALUES('$model','$type','$drate','$wrate','$oid','$year')";
        if (!mysqli_query($con, $sql4)) {
            $message .= "<br />Mașina nu a fost adaugată.";
        } else {
            $message .= "<br />Mașina a fost adaugată.";
        }
    }

    mysqli_close($con);

    // Stochează mesajul în sesiune și redirecționează
    $_SESSION['message'] = $message;
    header("Location: add.php");
    exit;
}
?>
