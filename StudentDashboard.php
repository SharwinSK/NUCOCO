<?php
session_start();

// Check if the student is logged in
if (!isset($_SESSION['student_id'])) {
    header("Location: StudentLogin.php");
    exit();
}

echo "Welcome, " . htmlspecialchars($_SESSION['student_name']);
?>
