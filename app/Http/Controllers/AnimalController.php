<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
// use DB;
// use View;
use App\Models\Health;
use App\Models\Adopter;
class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $animals = AnimalHealth::with('animal')->where('health_status', 1)->get();
        $animals = Animal::with(['health','adopter'])->get();
        // $animals = DB::table('animal_healths')->join('animals','animal_healths.id','animals.health_status')->get();
        // dd($animals);
       // return View::make('animal.index',compact('animals'));
       return view('animal.index')->with('animals',$animals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $animal_health = Health::pluck('status','id');

        return view('animal.create')->with('animal_health',$animal_health);
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

        // $animal_health = AnimalHealth::findOrfail($id);
        return view('animal.edit')->with('animal',$animal)->with('animal_health',$animal_health);
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
        $animal->delete();
        return redirect('/animal')->with('error', 'Animal Deleted Successfully');
    }
}
