<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
<h2>Register</h2>

<form method="POST" action="/register">
    @csrf
    <input type="text" name="name" placeholder="Nama"><br><br>
    <input type="email" name="email" placeholder="Email"><br><br>
    <input type="password" name="password" placeholder="Password"><br><br>
    <input type="password" name="password_confirmation" placeholder="Confirm Password"><br><br>
    <button type="submit">Register</button>
</form>

<p>Sudah punya akun? <a href="/login">Login</a></p>
</body>
</html>
