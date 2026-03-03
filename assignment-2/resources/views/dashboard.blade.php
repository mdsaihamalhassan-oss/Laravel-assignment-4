<h2>Dashboard</h2>
<h3>Welcome, {{ auth()->user()->name }}</h3>
<form method="POST" action="/logout">
    @csrf
    <button type="submit">Logout</button>
</form>
