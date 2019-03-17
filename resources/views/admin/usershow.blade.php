
@extends('app')

@section('content')

<h3>
<a href="{{ url('/admin/users', $user->id) }}">{{ $user->email }}</a>
</h3>
<h3>Role: {{ $user->role }}</h3>
<h3>Birthday: {{ $user->birthday }}</h3>
<h3>Education Field: {{ $user['eductation field'] }}</h3>




{!! Form::open(['url' => 'admin/users/' . $user->id]) !!}
  <div class="form-group">
    {!! Form::label('role', 'Edit Role:') !!}
    {!! Form::text('role', null, ['class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
  </div>
{!! Form::close() !!}


@stop
