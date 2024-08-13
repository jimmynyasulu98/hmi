<h1>Dashboard</h1>

<form action="{{route('member_logout')}}" method="post">
    @csrf
    <button type="submit">Logout</button>
</form>