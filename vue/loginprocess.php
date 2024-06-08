<?php
// Include the PDO connection script
require_once '../model/connexion.php';

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['mdp']);

    // Prepare SQL statement
    $sql = "SELECT * FROM admin WHERE username = :username AND mdp = :mdp";

    try {
        // Get PDO connection object from included file
        global $connexion; // Access the global variable $connexion from the included file
        // Prepare statement
        $stmt = $connexion->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':mdp', $password);

        // Execute statement
        $stmt->execute();

        // Check if user was found
        if ($stmt->rowCount() > 0) {
            // User authenticated
            session_start();
            $_SESSION['username'] = $username;
            header('Location: home.php');
            exit;
        } else {
            // Authentication failed
            echo "Invalid username or password";
        }
    } catch (PDOException $e) {
        // Handle PDO exception
        echo "Error: " . $e->getMessage();
    }
} else {
    // Redirect to login page if form was not submitted
    header('Location: login.php');
    exit;
}
?>
