<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
// use Illuminate\Support\Facades\Validator;
use DB;
// use Validator;
use App\Models\Health;
use App\Models\Adopter;
class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['index']]);
    }
    public function index()
    {
    //     $search = null;
    //     $animals = Animal::with(['health','adopter'])->where('health_id',1)->where('adopted',NULL)->get();
        return view('animal.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $search = null;
        $animal_health = Health::pluck('status','id');
        if(auth()->user()->employee_type !== "employee"){
            return redirect('/animal')->with('error','Unauthorized Personnel');
        }
        return view('animal.create')->with('animal_health',$animal_health)->with('search',$search);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'animal_type' => 'required',
            'animal_breed' => 'required',
            'health_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);

        // dd($request->all());
        $animal = new Animal;
        $animal->name = $request->input('name');
        $animal->age = $request->input('age');
        $animal->gender = $request->input('gender');
        $animal->animal_type = $request->input('animal_type');
        $animal->animal_breed = $request->input('animal_breed');
        $animal->health_id= $request->input('health_id');
        $destination_path = 'public/images';
        $image = $request->file('image');
        $image_name = $image->getClientOriginalName();
        $path = $image->storeAs($destination_path,$image_name);
        $animal->img_path = $image_name;
        $animal->save();
        return redirect('/animal')->with('success', 'Animal Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $animal =  Animal::findOrfail($id);
        // return view('animal.show')->with('animal',$animal);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $animal_health = Health::pluck('status','id');
        $animal = Animal::findOrfail($id);
        $search = null;
        if(auth()->user()->employee_type !== "employee"){
            return redirect('/animal')->with('error','Unauthorized Personnel');
        }
        // $animal_health = AnimalHealth::findOrfail($id);
        return view('animal.edit')->with('animal',$animal)->with('animal_health',$animal_health)->with('search',$search);
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
        $this->validate($request, [
            'name' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'animal_type' => 'required',
            'animal_breed' => 'required',
            'health_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);
        $animal = Animal::find($id);
        $animal->name = $request->input('name');
        $animal->age = $request->input('age');
        $animal->gender = $request->input('gender');
        $animal->animal_type = $request->input('animal_type');
        $animal->animal_breed = $request->input('animal_breed');
        $animal->health_id = $request->input('health_id');
        $destination_path = 'public/images';
        $image = $request->file('image');
        $image_name = $image->getClientOriginalName();
        $path = $image->storeAs($destination_path,$image_name);
        $animal->img_path = $image_name;
        $animal->save();

        return redirect('/animal')->with('success', 'Animal Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $animal = Animal::findOrfail($id);
        if(auth()->user()->employee_type !== "employee"){
            return redirect('/animal')->with('error','Unauthorized Personnel');
        }
        $animal->delete();
        return response()->json(["success" => "adopter deleted successfully.",
             "data" => $animal,"status" =>   200]);
    }
}
