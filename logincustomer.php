<?php
session_start();
include('connection.php');

if (isset($_POST['submit'])) {
    $username = trim($_POST['user']);
    $password = trim($_POST['pass']);

    $res=$conn->query("SELECT password FROM logincustomer WHERE username='$username'");
    $hashedPassword=$res->fetch_assoc()['password'];
    if (password_verify($password, $hashedPassword)) {
            // Password is correct, set session variables and redirect
            $_SESSION['loggedincustomer'] = true;
            $_SESSION['username'] = $username;
            header("Location: index.php");
            exit();
    } else {
            echo '<script>
                      window.location.href = "customer.php";
                      alert("Credentialele nu sunt valide, incearca din nou.");
                  </script>';
        }
    } 
?>
