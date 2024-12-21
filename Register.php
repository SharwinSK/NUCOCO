<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cocuricular management system";

try 
{

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['Stu_Name'];
        $program = $_POST['Stu_Program'];
        $studentID = $_POST['Stu_ID'];
        $passwordInput = $_POST['Stu_PSW'];

        // Check if Stu_ID already exists
        $stmt = $conn->prepare("SELECT Stu_ID FROM students WHERE Stu_ID = :studentID");
        $stmt->bindParam(':studentID', $studentID);
        $stmt->execute();

        if ($stmt->rowCount() > 0)
         {
            // ID already exists, show error
            echo "<script>alert('Error: Student ID already registered! Please use a different ID.'); window.history.back();</script>";
        } else {
            // Hash the password
            $hashedPassword = password_hash($passwordInput, PASSWORD_BCRYPT);

            // Insert new student data
            $stmt = $conn->prepare("INSERT INTO students (Stu_Name, Stu_Program, Stu_ID, Stu_PSW) 
                                    VALUES (:name, :program, :studentID, :password)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':program', $program);
            $stmt->bindParam(':studentID', $studentID);
            $stmt->bindParam(':password', $hashedPassword);

            if ($stmt->execute()) 
            {
                echo "<script>alert('Registration successful! You can now login.'); window.location.href='StudentLogin.php';</script>";
            } else 
            {
                echo "<script>alert('Error: Registration failed! Please try again.'); window.history.back();</script>";
            }
        }
    }
} catch (PDOException $e) 
{
    echo "Connection failed: " . $e->getMessage();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <style>
        body 
        {
            margin: 0;
            font-family: Arial, sans-serif;
            background: url('NU background.webp') no-repeat center center fixed;
            background-size: cover;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container 
        {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .logo 
        {
            width: 200px;
            margin-bottom: 10px;
        }

        h1 
        {
            margin-bottom: 20px;
            font-size: 24px;
            color: #007bff;
        }

        input, select, button 
        {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button 
        {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover 
        {
            background-color:rgb(0, 179, 60);
        }

        a 
        {
            text-decoration: none;
            color: #007bff;
            font-size: 14px;
        }
    </style>
    
</head>
<body>
    <div class="container">
    
    <a href="Index.php"><img src="NU logo.png" alt="University Logo" class="logo"></a>
        <h1>Student Registration</h1>
        <form action="Register.php" method="POST">
            <input type="text" name="Stu_Name" placeholder="Student Name" required>
            <select name="Stu_Program" required>
                <option value="" disabled selected>Select Program</option>
                <option value="Foundation in Business">Foundation in Business</option>
                <option value="Foundation in Science">Foundation in Science</option>
                <option value="DCS">Diploma in Computer Science</option>
                <option value="DIA">Diploma in Accounting</option>
                <option value="DAME">Diploma in Aircraft Maintenance Engineering</option>
                <option value="DIT">Diploma in Information Technology</option>
                <option value="DHM">Diploma in Hotel Management</option>
                <option value="DCA">Diploma in Culinary Arts</option>
                <option value="DBA">Diploma in Business Adminstration</option>
                <option value="DIN">Diploma in Nursing</option>
                <option value="BOF">Bachelor of Finance</option>
                <option value="BAAF">Bachelor of Arts in Accounting & Finance</option>
                <option value="BBAF">Bachelor of Business Adminstration in Finance</option>
                <option value="BSB">Bachelor of Science Biotechonology</option>
                <option value="BCSAI">Bachelor of Computer Science Artificial intelligence</option>
                <option value="BITC">Bachelor of Information Technology Cybersecurity</option>
                <option value="BSE">Bachelor of Software Engineering</option>
                <option value="BCSDS">Bachelor of Computer Science Data Science</option>
                <option value="BIT">Bachelor of Information Technology</option>
                <option value="BITIECC">Bachelor of Information Technology Internet Engineering and Cloud Computing</option>
                <option value="BEM">Bachelor of Event Management</option>
                <option value="BHMBM">Bachelor of Hospitality Management with Business management</option>
                <option value="BBAGL">Bachelor of Business Adminstration in Global Logistic</option>
                <option value="BBADM">Bachelor of Business Adminstration in Digital Marketing</option>
                <option value="BBAM">Bachelor of Business Adminstration in Marketing</option>
                <option value="BBAMT">Bachelor of Business Adminstration in Management</option>
                <option value="BBAIB">Bachelor of Business Adminstration in International Business</option>
                <option value="BBAHRM">Bachelor of Business Adminstration in Human Resource Management</option>
                <option value="BBA">Bachelor of Business Adminstration</option>
                <option value="BSN">Bachelor of Science in Nursing</option>
            </select>
            <input type="text" name="Stu_ID" placeholder="Student ID" required>
            <input type="password" name="Stu_PSW" placeholder="Password" required>
            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="StudentLogin.php">Login Here</a></p>
    </div>
</body>
</html>
