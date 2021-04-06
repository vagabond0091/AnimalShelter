<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animals = Animal::all();

        return view('animal.index')->with('animals',$animals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('animal.create');
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
        ]);
        $animal = new Animal;
        $animal->name = $request->input('name');
        $animal->age = $request->input('age');
        $animal->gender = $request->input('gender');
        $animal->animal_type = $request->input('animal_type');
        $animal->animal_breed = $request->input('animal_breed');
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
        $animal = Animal::findOrfail($id);
        return view('animal.edit')->with('animal',$animal);;
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
        ]);
        $animal = new Animal;
        $animal->name = $request->input('name');
        $animal->age = $request->input('age');
        $animal->gender = $request->input('gender');
        $animal->animal_type = $request->input('animal_type');
        $animal->animal_breed = $request->input('animal_breed');
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
        //
    }
}
