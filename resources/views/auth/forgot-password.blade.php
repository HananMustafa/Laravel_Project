<!-- resources/views/auth/forgot-password.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
</head>
<body>
    <h1>Forgot Password</h1>

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <label for="email">Email Address</label>
        <input id="email" type="email" name="email" required autofocus>
        
        @error('email')
            <span class="text-red-600">{{ $message }}</span>
        @enderror

        <button type="submit">Send Password Reset Link</button>
    </form>
</body>
</html>
