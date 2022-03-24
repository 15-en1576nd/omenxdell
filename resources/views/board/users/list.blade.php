<a href="/boards/{{$board->id}}"><button>terug</button></a>
<form action="/boards/{{$board->id}}/users" method="post">

    @csrf
    <input type="email" name="email" placeholder="email of user">
    <input type="submit" value="Add">
</form>
@foreach($board->users as $user)

    {{$user->name}}
    {{$user->surname}}
    Role: {{$user->role->first()->name}}
    <form method="post" action="/boards/{{$board->id}}/users/{{$user->id}}">
        <p>
        @method('DELETE')
        @csrf
        <input type="submit" value="X">
        </p>
    </form>

@endforeach
