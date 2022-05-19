<?php

namespace App\Http\Controllers;

use App\Traits\DisplayTrait;  //traits
use App\Models\Name;
use Illuminate\Http\Request;

class NameController extends Controller
{   
    use DisplayTrait;                    //using traits

    public function displaytraitsdata(){     //display traits, called from routes
       return $this->traitsData('hello gerson pogi'); //return or echo messages
    }

    

    public function showFirstName()              
    {                                             
        $name = Name::get();

        foreach ($name as $name)            //no view created for sample only
        {
            echo $name->first_name . "</br>";     
        }                                         
    }

    public function showLastName()                 
    {
        $lastname = Name::get();
       foreach ($lastname as $lastname)            
       {
           echo $lastname->last_name . "</br>";
       }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 

        // $name = Name::get();
        // // $name = Name::all()->sortBy('full_name');
       
        // return view('layouts.admin.name.index')->with('name', $name);

        //===============================
                                             //mutators or setter
        $name = new Name();                 //defined to send in database, 
        $name->first_name = "Gerson";
        $name->last_name = "Ondangan";      //save to database when localhost refresh
        
        $name->save();                     //dave to database

        
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admin.name.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Name::create($request->all());

        $name = new Name();
        $name->first_name = $request->input('first_name');
        $name->last_name = $request->input('last_name');
        $name->save();

        return redirect()->route('name.index')->with('save', 'oi pre! you just got registered!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Name  $name
     * @return \Illuminate\Http\Response
     */
    public function show(Name $name)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Name  $name
     * @return \Illuminate\Http\Response
     */
    public function edit(Name $name)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Name  $name
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Name $name)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Name  $name
     * @return \Illuminate\Http\Response
     */
    public function destroy(Name $name)
    {
        //
 
    }

    public function view($name)              //??
    { 
        $name = Name::findOrFail($name);
        dd($name);                        //space
         echo $name->first_name,' ', $name->last_name;              // you can return a view now since it has already a data.
                                                                    // you can retuen a view now since it has already a data

    //   return view('layouts.admin.name.view')->with('name', $name);   

                                                                    // this could be good but you have to finish watched video to continue the view isong ok! ? 

    }
}
