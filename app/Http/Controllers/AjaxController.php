<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Health;
use App\Models\Adopter;
class AjaxController extends Controller
{
    public function index(){
        $search = null;
         // $animals = Animal::with(['health','adopter'])->where('health_id',1)->where('adopted',NULL)->get();
       return view('welcome')->with('search',$search);
    }
    public function list(){
         $animals = Animal::with(['health','adopter'])->where('health_id',1)->where('adopted',Null)->get();
        return response()->json($animals);
    }
    public function search(Request $request){
        $search = $request->input('search');
        $animal_search = Animal::with(['health','adopter'])->where('health_id',1)->where('adopted',Null)->where('animal_type','LIKE','%'.$search.'%')->get();
        // dd($animal_search);
        return response()->json($animal_search);
    }
    public function search_index(Request $request){
        $search = $request->input('search');
        return view('search.index')->with('search',$search);
    }
    public function list_adopted(){
        $adopters = Adopter::with(['animal'])->get();
         // dd($adopters);
        return response()->json($adopters);
    }
     public function list_animals(){
        $animals = Animal::with(['health','adopter'])->get();
        return response()->json($animals);
    }



}
