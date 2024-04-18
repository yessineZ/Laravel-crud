<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer4 ; 

class ComputersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
//---------------------------------------------------------------
     private static function getData() {
        return [
            ['id' => 1 , 'name' => 'LG' , 'Country' => 'Korea'],
            ['id' => 2 , 'name' => 'HP' , 'Country' => 'USA'],
            ['id' => 3 , 'name' => 'Dell' , 'Country' => 'Unknown'],

        ];
     }
     //---------------------------------------------------------
    public function index()
    {
        return view("Computers.index",
           [ 'computers' => Computer4::all()  
        ])  ; 
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Computers.create') ;
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request -> validate(['computer-name' => 'required' , 'computer-price' => ['required','integer'] ,'computer-Country'=> 'required' ]);         

        $computer = new Computer4() ; 
        $computer->name =strip_tags( $request->input('computer-name')  ); 
        $computer->Country =strip_tags($request ->input('computer-Country')); 
        $computer->price = strip_tags($request -> input('computer-price')); //strip tags is for validation of the form input scripts specials caracters  
        //
        $computer->save() ; 
        return redirect()->route('Computers.index') ;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $index = Computer4::findOrFail($id) ; 
        //
        
        //if( $index === false ) {
         //   abort(404) ; 
        //}
        return view('Computers.show',['computer'=> $index ]) ; 
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $computer = Computer4::findOrFail($id) ; 
        return view('Computers.edit',["computer" =>$computer]) ; 
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) 
    {
        $request ->validate(['computer-name' => 'required' , 'computer-Country' => 'required' , 'computer-price' => ['integer','required']]);
        $to_update = Computer4::findOrFail($id) ; 
        $to_update["name"] = strip_tags($request -> input('computer-name')) ; 
        $to_update["price"] = strip_tags($request -> input('computer-price')) ; 
        $to_update["Country"] = strip_tags($request -> input('computer-Country')) ; 

         $to_update->save() ; 
         return redirect()->route('Computers.show',$id) ; 


        //
    }

    public function page1() {
        return view("page1") ; 
    } 

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $to_delete = Computer4::findOrFail($id) ;
        $to_delete->delete() ;

        return redirect()->route('Computers.index') ;
        //
    }

}