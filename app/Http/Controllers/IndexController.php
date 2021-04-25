<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Health;
use App\Models\Adopter;
class IndexController extends Controller
{
    public function index(){
         $animals = Animal::with(['health','adopter'])->where('health_id',1)->where('adopted',NULL)->get();

       return view('welcome')->with('animals',$animals);
    }
}
