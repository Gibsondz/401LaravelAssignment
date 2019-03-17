@extends('app')

@section('content')

  <h1>Users</h1>



  @foreach($users as $user)
    <h3>
    <a href="{{ url('/admin/users', $user->id) }}">{{ $user->email }}</a>
    </h3>
    <h3>Role: {{ $user->role }}</h3>
    <h3>Birthday: {{ $user->birthday }}</h3>
    <h3>Education Field: {{ $user['eductation field'] }}</h3>
  @endforeach


@stop
