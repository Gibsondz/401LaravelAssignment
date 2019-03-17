@extends('app')

@section('content')

  <h1>Admin Panel</h1>

  <td><button onclick="location.href='{{ url('/admin/users') }}'" class="btn btn-default">Users Page</button></td>
  <br><br>
  <td><button onclick="location.href='{{ url('/admin/books') }}'" class="btn btn-default">Books Page</button></td>
  <br><br>
  <td><button onclick="location.href='{{ url('/admin/subscriptions') }}'" class="btn btn-default">Book Subscriptions</button></td>
  <br><br>
  <td><button onclick="location.href='{{ url('/admin/comments') }}'" class="btn btn-default">Comments</button></td>

@stop
