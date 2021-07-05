<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Requests\AuthorsRequest;
use App\Http\Resources\AuthorsResource;

class AuthorController extends Controller
{
    public function index(){

        return AuthorsResource::collection(Author::all());
    }
    
    public function show(Author $author){
        
        return new AuthorsResource($author);
    }

    public function store(Request $request){
        

       /* $author = Author::create([
            'name' =>'Jhon Doe'
        ]);

        return new AuthorsResource($author);*/
        $faker = \Faker\Factory::create(1);
        $author = Author::create([
            'name' => $faker->name
        ]);

        return new AuthorsResource($author);
    }

    public function update(AuthorsRequest $request, Author $author){
        
        $author->update([
            
            'name' => $request->input('name'),
        ]);

        return new AuthorsResource($author);
    }

    public function destroy(Author $author){

        $author->delete();

        return response(null, 204);
    }
}
