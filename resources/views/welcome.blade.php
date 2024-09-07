<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        .container {
            text-align: center;
            margin-top: 100px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>



<body>
    <div class="container">

    <h1>Welcome to the Application</h1>
    <a href="{{ route('register') }}">
        <button class="button">Sign Up</button>
    </a>
    <a href="{{ route('login') }}">
        <button class="button">Login</button>
    </a>

    </div>
</body>
</html>
