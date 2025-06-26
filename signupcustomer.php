<?php
session_start();
include('connection.php');

if (isset($_POST['signup-submit'])) {
    $username = trim($_POST['signup-user']);
    $password = trim($_POST['signup-pass']);
    $confirmPassword = trim($_POST['confirm-pass']);
    $pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";

    if (!preg_match($pattern, $username)) {
        echo '<script>
                  window.location.href = "signup.php";
                  alert("Format email invalid.");
              </script>';
    } elseif ($password != $confirmPassword) {
        echo '<script>
                  window.location.href = "signup.php";
                  alert("Parolele nu se potrivesc.");
              </script>';
    } else {
        // Check if username already exists
        $sql = "SELECT * FROM logincustomer WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $count = $result->num_rows;

        if ($count == 0) {
            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert new user into the database
            $sql = "INSERT INTO logincustomer (username, password) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $username, $hashedPassword);
            
            if ($stmt->execute()) {
                $_SESSION['loggedincustomer'] = true;
                $_SESSION['username'] = $username;
                header("Location: index.php");
            } else {
                echo '<script>
                          window.location.href = "signup.php";
                          alert("Inregistrarea a esuat. Incearca din nou.");
                      </script>';
            }
        } else {
            echo '<script>
                      window.location.href = "signup.php";
                      alert("Numele de utilizator exista deja. Introdu alt email.");
                  </script>';
        }
    }
}
?>
