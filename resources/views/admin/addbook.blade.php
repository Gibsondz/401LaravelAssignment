@extends('app')

@section('content')

  <h1>Add a Book!</h1>

  <hr/>


  {!! Form::open(['url' => 'admin/addbook']) !!}

    <div class="form-group">

    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}

    </div>

    <div class="form-group">

    {!! Form::label('author', 'Author:') !!}
    {!! Form::text('author', null, ['class' => 'form-control']) !!}

    </div>

    <div class="form-group">
      {!! Form::label('isbn', 'ISBN:') !!}
      {!! Form::text('isbn', null, ['class' => 'form-control']) !!}
    </div>

    <div class='form-group'>
      {!! Form::label('publicationyear', 'Published On:') !!}
      {!! Form::text('publicationyear', null, ['class' => 'form-control']) !!}
    </div>

    <div class='form-group'>
      {!! Form::label('publisher', 'Publisher:') !!}
      {!! Form::text('publisher', null, ['class' => 'form-control']) !!}
    </div>

    <div class='form-group'>
      {!! Form::label('image', 'Image Link:') !!}
      {!! Form::text('image', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::submit('Add Book', ['class' => 'btn btn-primary form-control']) !!}
    </div>


  {!! Form::close() !!}


@stop
