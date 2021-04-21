<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rescuer;
use App\Models\Animal;

class RescuerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rescuers = rescuer::with('animal')->get();

        return view('rescuer.index')->with('rescuers',$rescuers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $animal_id = animal::pluck('id');
        return view('rescuer.create')->with('animal_id',$animal_id);
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
            'res_name' => 'required',
            'res_lname' => 'required',
            'res_addr' => 'required',
            'res_phone' => 'required',
            'animal_id' => 'required',
        ]);
        $rescuer = new Rescuer;
        $rescuer->res_name = $request->input('res_name');
        $rescuer->res_lname = $request->input('res_lname');
        $rescuer->res_addr = $request->input('res_addr');
        $rescuer->res_phone = $request->input('res_phone');
        $rescuer->animal_id = $request->input('animal_id');
        $rescuer->save();
        return redirect('/rescuer')->with('success', 'Rescuer Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $animal_id = animal::pluck('id');
        $rescuer = rescuer::findOrfail($id);
        return view('rescuer.edit')->with('animal_id',$animal_id)->with('rescuer',$rescuer);
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
            'res_name' => 'required',
            'res_lname' => 'required',
            'res_addr' => 'required',
            'res_phone' => 'required',
            'animal_id' => 'required',
        ]);
        $rescuer = rescuer::find($id);
        $rescuer = new Rescuer;
        $rescuer->res_name = $request->input('res_name');
        $rescuer->res_lname = $request->input('res_lname');
        $rescuer->res_addr = $request->input('res_addr');
        $rescuer->res_phone = $request->input('res_phone');
        $rescuer->animal_id = $request->input('animal_id');
        $rescuer->save();
        return redirect('/rescuer')->with('success', 'Rescuer Updated');
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
