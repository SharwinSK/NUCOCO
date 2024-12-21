<?php
session_start(); // Start the session to store user login data

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cocuricular management system";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $studentID = $_POST['Stu_ID'];
        $passwordInput = $_POST['Stu_PSW'];

        // Retrieve student record from the database
        $stmt = $conn->prepare("SELECT * FROM students WHERE Stu_ID = :studentID");
        $stmt->bindParam(':studentID', $studentID);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verify password
        if ($user && password_verify($passwordInput, $user['Stu_PSW'])) {
            // Password matches, set session variables
            $_SESSION['student_id'] = $user['Stu_ID'];
            $_SESSION['student_name'] = $user['Stu_Name'];

            // Redirect to student dashboard
            header("Location: StudentDashboard.php");
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
    <title>Student Login</title>
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
            margin-bottom: 20px;
            font-size: 24px;
            color: #007bff;
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

        a {
            text-decoration: none;
            color: #007bff;
            font-size: 14px;
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
        <h1>Student Login</h1>
        <?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>
        <form action="StudentLogin.php" method="POST">
            <input type="text" name="Stu_ID" placeholder="Student ID" required>
            <input type="password" name="Stu_PSW" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="Register.php">Register Here</a></p>
    </div>
</body>
</html>
