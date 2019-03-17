@extends('app')

@section('content')

  <h1>Edit: {!! $book->name !!}</h1>

  {!! Form::model($book, ['method' => 'PATCH', 'url' => 'admin/books/' . $book->id]) !!}


    <div class="form-group">

    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}

    </div>

    <div class="form-group">

    {!! Form::label('author', 'Author:') !!}
    {!! Form::text('author', $author->name, ['class' => 'form-control']) !!}

    </div>

    <div class="form-group">
      {!! Form::label('isbn', 'ISBN:') !!}
      {!! Form::text('isbn', null, ['class' => 'form-control']) !!}
    </div>

    <div class='form-group'>
      {!! Form::label('publicationyear', 'Published On:') !!}
      {!! Form::text('publicationyear', $book['publication year'], ['class' => 'form-control']) !!}
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
      {!! Form::submit('Edit Book', ['class' => 'btn btn-primary form-control']) !!}
    </div>


  {!! Form::close() !!}


@stop
