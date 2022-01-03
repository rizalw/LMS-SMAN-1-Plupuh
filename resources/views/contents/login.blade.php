<form action="{{route('loginQuery')}}" method="POST">
    @csrf
    <label for="">Email</label>
    <input type="text" name="email" id="" required>
    <label for="">Password</label>
    <input type="password" name="password" id="" required>
    <input type="submit" value="Submit">
</form>