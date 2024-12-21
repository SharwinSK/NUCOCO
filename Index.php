<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Kings&family=Pacifico&display=swap" rel="stylesheet">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Cocurricular Management System</title>
    
    <style>
        * 
        {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            
        }

        body 
        {
            height: 100vh;
            background: url('NU background.webp') no-repeat center center fixed; 
            background-size: cover; 
            display: flex;
            justify-content: center;
            align-items: center;
            color: #333;
        }

        .container 
        {
            text-align: center;
            background-color: rgba(255, 255, 255, 0.9); 
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 400px;
            margin: 10px;
        }
    
        .logo 
        {
            width: 200px;
            height: auto;
            margin-bottom: 15px;
        }

        h1 
        {
            color: #333;
            font-size: 28px;
            margin-bottom: 10px;
            font-family: "Crimson Text", serif;
            font-weight: 400;
            font-style: normal;
        }
 
        .user-type a 
        {
            display: block;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            padding: 12px;
            margin: 10px auto;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            transition: all 0.3s ease;
            font-family: "Kings", cursive;
            font-weight: 400;
            font-style: normal;
        }
        
        .user-type a:hover 
        {
            background-color:rgb(0, 179, 60);
            transform: translateY(-5px);
        }

        .footer 
        {
            margin-top: 20px;
            font-size: 12px;
            color: #666;
        }

        @media screen and (max-width: 768px) 
        {
            .container 
            {
                padding: 15px;
            }
            h1 
            {
                font-size: 18px;
            }
            .user-type a 
            {
                font-size: 14px;
                padding: 10px;
            }
        }

        @media screen and (max-width: 480px) 
        {
            .logo 
            {
                width: 70px; 
            }
            h1 
            {
                font-size: 16px;
            }
            .user-type a 
            {
                font-size: 12px;
                padding: 8px;
            }
        }
    </style>

</head>
<body>
    <div class="container">
        <a href="Index.php">
            <img src="NU logo.png" alt="University Logo" class="logo">
        </a>

        <h1>Welcome to the Cocurricular Management System</h1>
       
        <div class="user-type">
            <a href="StudentLogin.php">STUDENT</a>
            <a href="AdvisorLogin.php">ADVISOR</a>
            <a href="CoordinatorLogin.php">COORDINATOR</a>
        </div>

        <div class="footer">
            <p>&copy; 2024 Cocurricular Management System</p>
        </div>
    </div>
</body>
</html>
