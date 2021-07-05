<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['name','description','publication_year'];

    public function author(){

       return $this->hasManyTrough(Author::class, BooksAuthor::class);
    }
}
