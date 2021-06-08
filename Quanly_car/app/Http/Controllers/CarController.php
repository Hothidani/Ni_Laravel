<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cars= Car::all();
        return view('cars.list',compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                    
        $model = $request->input('model');					
        $description = $request->input('description');	
        $produced_on = $request->input('produced_on')	;			
                            
        $file = $request->file('image');					
        $name_img = time() . '_' . $file->getClientOriginalName();					
        $destinationPath = public_path('images');					
        $file->move($destinationPath, $name_img);					
                            
        $car = new Car();					
        $car->model = $model;					
        $car->description = $description;					
        $car->image = $name_img;
        $car->produced_on=$produced_on;					
        $car->save();					
                            
        return redirect('/cars')->with('success', 'Thêm thành công!');					
				
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $car=Car::find($id);
        return view('cars.detail',compact('car','id'));
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
        $car=Car::find($id);
        return view('cars.edit',compact('car', 'id'));
        //return view('cars.edit',['car'=>$car]);
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
        //
        $model = $request->input('model');					
        $description = $request->input('description');					
                            
        $file = $request->file('image');					
        $name_img = time() . '_' . $file->getClientOriginalName();					
        $destinationPath = public_path('images');					
        $file->move($destinationPath, $name_img);					
                            
        $car = Car::find($id);					
        $car->model = $model;					
        $car->description = $description;					
        $car->image = $name_img;					
        $car->save();					
                            
        return redirect('/cars')->with('success', 'Cập nhật thành công!');					
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $car=Car::find($id);
        $car->delete();
        return redirect('/cars')->with('success','Bạn đã xóa thành công');
    }
}
