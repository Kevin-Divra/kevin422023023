<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Models\Book;

class BookController extends Controller
{
    /**
    * Display a Listing Of The Item.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return Book::get();
    }

    /**
     * Store a Newly Created item in storage.
     * 
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $book = new Book;
            $book->fill($request->validated())->save();

            return $book;

        } catch(\Exception $exception) {
            throw new HttpException(400, "Invalid data -{$exception->getMessage}"); 
        }
    }

    /**
     * Diaplay the specified item.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::findOrfail($id);

        return $book;
    }

    /**
     * Update the specified item in store
     * 
     * @param \Illuminate\Http\Request  $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!$id) {
            throw new HttpException(400, "invalid id");    
        }

        try {
            $book = Book::find($id);
            $book->fill($request->validated())->save();

            return $book;
        
        } catch(\Exception $exception) {
            throw new HttpException(400, "Invalid data - {$exception->getMessage}");
        }
    }

    /**
     * Remove The specified otem from storage
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return response()->json(null, 204);
    }
}
