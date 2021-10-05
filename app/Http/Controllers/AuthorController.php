<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $author = Author::all(); 

       if($author->count() == 0){
        return [
            'status' => 404,
            'message' => 'No Data'
           ];
       }else{
         return [
          
            'status' => 200, 
            'message' => 'loaded',   
            'data' => $author
          ]; 
       }
    }


 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([  
             
            'name' => 'required',
            'date_of_birth' => 'required', 
            'place_of_birth' => 'required', 
            'gender' => 'required', 
            'email' => 'required', 
            'hp' => 'required'

        ]);

        Author::create($request->all());
        $data = Author::all()->last();
        return [
            'status'  => 200,
            'message' => 'created', 
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
        $author = Author::find($id);
        $data = $author->first(); 
        if($author){
            return [
                'status' => '200',
                'message' => 'success',
                'data' => $data
            ];
        }        
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
            
             
            'name' => 'required',
            'date_of_birth' => 'required', 
            'place_of_birth' => 'required', 
            'gender' => 'required', 
            'email' => 'required', 
            'hp' => 'required'

        ]);
        $author = Author::find($id);
        $author->update($request->all());
        $data = Author::latest('updated_at')->first();
        if($author){
            return [
                'status' => 200,
                'message' => 'Data Edited Successfully',
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
        $author = Author::find($id);
        $author->delete();
        if($author){
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
