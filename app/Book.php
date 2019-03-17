<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model {

	//
  protected $fillable = [
    'name',
    'isbn',
    'publication year',
    'publisher',
    'subscription status',
    'image',
  ];

}
