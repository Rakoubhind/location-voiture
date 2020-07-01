<?php

namespace App\Http\Controllers;
use App\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(){
        $cars = Car::all();
        return view('acceuil')->with('cars', $cars);
    }
    public function show($id)
    {
        $car = Car::where('id', $id)->firstorFail();
        return view('show', [
            'car' => $car,

        ]);
    }
}
