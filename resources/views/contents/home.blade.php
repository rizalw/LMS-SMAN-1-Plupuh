@if(Session::has('email'))
  Yaay berhasil login sebagai {{ $email }}
  <a href="{{route('logout')}}">Logout</a>
@endif