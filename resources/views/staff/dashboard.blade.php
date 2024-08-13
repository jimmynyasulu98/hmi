<h1>Staff Dashboard</h1>

<form action="{{route('staff_logout')}}" method="post">
    @csrf
    <button type="submit">Logout</button>
</form>