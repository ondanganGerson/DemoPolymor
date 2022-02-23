<?php

namespace App\Http\Controllers;

use App\Models\CarModel;
use Illuminate\Http\Request;
use App\Models\Car;

class CarModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                                                     //property //attribute
            // return view('layouts.admin.carmodel.index', ['name' => 'Gersons'],['lastname' => 'Ondangan']);
                                                      
            return view('layouts.admin.carmodel.index',['name' => 'Gerson', 'lastname' => 'Ondangan, Im defined through controller ']);  //array
                                                    // ->with('name', 'gerson')
                                                    // ->with('lastname', 'ondangan');          
                                                   

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $model = new CarModel();
        $model->model_name = $request->input('model_name');
        $model->car_id = $request->input('car_id');
        $model->save();
        
        
        return view('layouts.admin.car.show')->with('model', $model->car_id);
                
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CarModel  $carModel
     * @return \Illuminate\Http\Response
     */
    public function show(CarModel $carModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CarModel  $carModel
     * @return \Illuminate\Http\Response
     */
    public function edit(CarModel $carModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CarModel  $carModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CarModel $carModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CarModel  $carModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarModel $carModel)
    {
        //
    }
}
