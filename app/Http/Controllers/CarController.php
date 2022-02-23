<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
// use App\Models\CarModel;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $car = Car::get();


        return view('layouts.admin.car.index')->with('car', $car);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admin.car.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $car = new Car();
        $car->name = $request->input('name');
        $car->founded = $request->input('founded');
        $car->description = $request->input('description');
        $car->save();

        return redirect()->route('car.index')->with('save', ' ok na pre! stored na imung car ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {                                   
         
      
        $car = Car::with('carmodels')->find($car);                                  
        
        
        return view('layouts.admin.car.show')
                ->with('car', $car);    
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        return view('layouts.admin.car.edit')->with('car', $car);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        $car->name = $request->input('name');
        $car->founded = $request->input('founded');
        $car->description = $request->input('description');
        $car->save();

        return redirect()->route('car.index')->with('edit', 'Pre successfullt updted na!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        // dd($car);
        $car->delete();

        return redirect()->route('car.index')->with('delete', 'Pre wa na delete na imung car!');

        //OR
        // $car = Car::find($car);

        // if(!is_null($car)) {                           //doesn't work

        //     $car->delete();

        //     return "Car Successfully Deleted";
        // }

        // return "Car not found";

        //OR
        // try{

        // }catch(); see sample in hms project for this exemption.
    }
}
    