<!-- resources/views/auth/reset-password.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>
    <h1>Reset Password</h1>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <label for="email">Email Address</label>
        <input id="email" type="email" name="email" value="{{ $request->email }}" required autofocus>
        
        @error('email')
            <span class="text-red-600">{{ $message }}</span>
        @enderror

        <label for="password">New Password</label>
        <input id="password" type="password" name="password" required>
        
        @error('password')
            <span class="text-red-600">{{ $message }}</span>
        @enderror

        <label for="password_confirmation">Confirm Password</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required>

        <button type="submit">Reset Password</button>
    </form>
</body>
</html>
