<?php

namespace App\Http\Controllers;
use App\Car;
use App\Category;
use Illuminate\Http\Request;

class AccueilController extends Controller
{
    public function index()
    {

        // $cars = Car::all();
        // return view('acceuil')->with('cars', $cars);
        if(request()->categorie)
        {
       $cars = Car::with('categories')->whereHas('categories', function ($query) {
           $query->where('id', request()->categorie);
       })->orderBy('created_at', 'DESC')->paginate(12);

   } else {
        $cars = Car::with('categories')->orderBy('created_at', 'DESC')->paginate(12);
        
       
   }
         return view('acceuil')->with('cars' , $cars);
   
    }
    
    public function show($id)
    {
        $cars = Car::where('id', $id)->firstorFail();
        
        return view('show', [
            'cars' => $cars,

        ]);
    }
}
