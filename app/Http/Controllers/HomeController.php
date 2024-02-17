<?php

namespace App\Http\Controllers;

use App\Models\Mechanic;
use App\Models\Car;
use App\Models\Owner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $mechanics = Mechanic::with('owners')->get();
        return view('index',compact('mechanics'));
    }

    public function addMechanic(Request $request){
        $request->validate([
            'name'=>'required'
        ]);
        Mechanic::create([
            'name'=>$request->name,
        ]);
        return redirect()->back();
    }

    public function addCarOwner(Request $request){
        $request->validate([
            'mechanic_id'=>'required',
            'model'=>'required',
            'name'=>'required',
        ]);

        $car = Car::create([
            'mechanic_id'=>$request->mechanic_id,
            'model'=>$request->model,
        ]);

        $carOwner = new Owner();
        $carOwner->car_id = $car->id;
        $carOwner->name = $request->name;
        $carOwner->save();
        
        return redirect()->back();

    }
}
