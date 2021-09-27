<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = Book::all(); 

       if($book->count() == 0){
        return [
            'status' => 404,
            'message' => 'No Data'
           ];
       }else{
         return [
          
            'status' => 200, 
            'message' => 'loaded',   
            'data' => $book
          ]; 
       }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            
            'title' => 'required',
            'description' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'date_of_issue' => 'required'

        ]);

        Book::create($request->all());
        $data = Book::all()->last();
        return [
            'status' => 'created', 
            'data' => $data
        ];  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $request->validate([
            
            'title' => 'required',
            'description' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'date_of_issue' => 'required'

        ]);

        Book::create($request->all());
        $data = Book::all()->last();
        return [
            'status' => 'created', 
            'data' => $data 
        ]
        ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            
            'title' => 'required',
            'description' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'date_of_issue' => 'required'

        ]);
        $book = Book::find($id);
        $book->update($request->all());
        $data = Book::latest('updated_at')->first();
        if($book){
            return [
                'status' => 'Data Edited Successfully',
                'data' => $data
            ];
        }else{
            return [
            'status' => '404',
            'message' => 'not found'
            ];
            
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
        if($book){
            return[
                'status' => 200,
                'message' => 'data deleted' 

            ];
        } else{
            return[
                'status' => 404,
                'message' => 'not found'
            ];
        }
    }
}
