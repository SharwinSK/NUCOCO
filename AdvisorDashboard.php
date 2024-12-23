<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
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
            text-align: center;
        }

        .container 
        {
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 500px;
        }

        h1 
        {
            font-size: 50px;
            color: #FF5733;
            margin-bottom: 20px;
        }

        p 
        {
            font-size: 18px;
            margin-bottom: 20px;
        }

        a 
        {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            background: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s ease;
        }

        a:hover 
        {
            background: #0056b3;
        }
    </style>
    
</head>
<body>
    <div class="container">
        <h1>404</h1>
        <p>Oops! The page you're looking for doesn't exist.</p>
        <a href="Index.php">Go Back to Home</a>
    </div>
</body>
</html>
