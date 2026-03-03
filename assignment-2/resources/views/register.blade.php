<h2>Register</h2>
<form method="POST" action="/register">
    @csrf
    <input type="text" name="name" placeholder="Name"><br>
    <input type="email" name="email" placeholder="Email"><br>
    <input type="text" name="phone" placeholder="Phone"><br>
    <input type="date" name="date_of_birth"><br>
    <input type="password" name="password" placeholder="Password"><br>
    <button type="submit">Register</button>
</form>
<a href="/login">Login</a>
