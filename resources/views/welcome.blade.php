<!-- resources/views/welcome.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome to the Application</h1>
    <a href="{{ route('register') }}">
        <button>Sign Up</button>
    </a>
    <a href="{{ route('login') }}">
        <button>Login</button>
    </a>
</body>
</html>
