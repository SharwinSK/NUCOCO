<?php
session_start(); // Start a session to track advisor login

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cocuricular management system";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $advID = $_POST['Adv_ID'];
        $passwordInput = $_POST['Adv_PSW'];

        // Fetch advisor credentials
        $stmt = $conn->prepare("SELECT * FROM advisors WHERE Adv_ID = :advID");
        $stmt->bindParam(':advID', $advID);
        $stmt->execute();

        $advisor = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verify password
        if ($advisor && $passwordInput === $advisor['Adv_PSW']) {
            // Set session variables
            $_SESSION['adv_id'] = $advisor['Adv_ID'];
            $_SESSION['club_id'] = $advisor['Club_ID'];
            header("Location: AdvisorDashboard.php"); // Redirect to advisor dashboard
            exit();
        } else {
            // Invalid credentials
            $error = "Invalid Advisor ID or Password.";
        }
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advisor Login</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: url('NU background.webp') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .logo {
            width: 200px;
            margin-bottom: 10px;
        }

        h1 {
            color: #007bff;
            margin-bottom: 20px;
        }

        input, button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background-color:rgb(0, 179, 60);
        }

        .error {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="Index.php">
            <img src="NU logo.png" alt="University Logo" class="logo">
        </a>
        <h1>Advisor Login</h1>
        <?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>
        <form action="AdvisorLogin.php" method="POST">
            <input type="text" name="Adv_ID" placeholder="Adv ID" required>
            <input type="password" name="Adv_PSW" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
