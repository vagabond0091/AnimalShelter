<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Animal;
use App\Models\Rescuer;
use DB;
class RescuerController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth',['except' => ['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // view('rescuer.index')->with('rescuers',$rescuers)
        $search = null;
        $rescuers = rescuer::with('animal')->get();
        // dd($rescuers);
        return view('rescuer.index')->with('rescuers',$rescuers)->with('search',$search);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $search = null;
        $animal_id = animal::pluck('name','id');
        if(auth()->user()->employee_type !== "employee"){
            return redirect('/rescuer')->with('error','Unauthorized Personnel');
        }
        return view('rescuer.create')->with('animal_id',$animal_id)->with('search',$search);
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
            'res_phone' => 'required|numeric',
        ]);
        $rescuer = new Rescuer;
        $rescuer->res_name = $request->input('res_name');
        $rescuer->res_lname = $request->input('res_lname');
        $rescuer->res_addr = $request->input('res_addr');
        $rescuer->res_phone = $request->input('res_phone');
        $rescuer->save();
        $animal_id = $request->input('animal_id');
        $rescuer_id = $rescuer->id;
        $animal = DB::table('animal_rescuer')->insert([
            'animal_id' => $animal_id,
            'rescuer_id' => $rescuer_id,
            'created_at' => date("Y-m-d"),
        ]);
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
        $search = null;
        $rescuer = rescuer::findOrfail($id);
         if(auth()->user()->employee_type !== "employee"){
            return redirect('/rescuer')->with('error','Unauthorized Personnel');
        }
        return view('rescuer.edit')->with('rescuer',$rescuer)->with('search',$search);
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

        ]);
        $rescuer = rescuer::find($id);
        $rescuer->res_name = $request->input('res_name');
        $rescuer->res_lname = $request->input('res_lname');
        $rescuer->res_addr = $request->input('res_addr');
        $rescuer->res_phone = $request->input('res_phone');
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
        $rescuer = rescuer::findOrfail($id);
        if(auth()->user()->employee_type !== "employee"){
            return redirect('/rescuer')->with('error','Unauthorized Personnel');
        }
        $rescuer->delete();
        return redirect('/rescuer')->with('error', 'Rescuer Deleted Successfully');
    }
}
