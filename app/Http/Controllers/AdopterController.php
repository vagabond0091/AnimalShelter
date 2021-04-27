<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Health;
use App\Models\Animal;
use App\Models\Adopter;
use DB;
class AdopterController extends Controller
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
        $search = null;
        $adopters = adopter::with('animal')->get();
        // $adoptered= $adopters->adopter_animal;
        // dd($adopters);
        return view('adopter.index')->with('adopters',$adopters)->with('search',$search);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $search = null;

        $animal_id = animal::with('health')->where('health_id',1)->where('adopted',NULL)->get();
        if(auth()->user()->employee_type !== "employee"){
            return redirect('/adopter')->with('error','Unauthorized Personnel');
        }
        return view('adopter.create')->with('animal_id',$animal_id)->with('search',$search);
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
            'adpt_name' => 'required',
            'adpt_lname' => 'required',
            'adpt_addr' => 'required',
            'adpt_phone' => 'required',
            'animal_id' => 'required',
        ]);

        $adopter = new Adopter;
        $adopter->adpt_name = $request->input('adpt_name');
        $adopter->adpt_lname = $request->input('adpt_lname');
        $adopter->adpt_addr = $request->input('adpt_addr');
        $adopter->adpt_phone = $request->input('adpt_phone');
        $animal_id = $request->input('animal_id');
        $adopter->save();

        $adopter_id = $adopter->id;
        $animal = DB::table('adopter_animal')->insert([
            'animal_id' => $animal_id,
            'adopter_id' => $adopter_id,
            'created_at' => date("Y-m-d"),
        ]);
        $animal = Animal::findOrfail($animal_id);
        $animal->adopted = true;
        $animal->save();
        return redirect('/adopter')->with('success', 'Adopter Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $adopter = adopter::findOrFail($id);
        if(auth()->user()->employee_type !== "employee"){
            return redirect('/adopter')->with('error','Unauthorized Personnel');
        }
        return view('adopter.edit')->with('adopter',$adopter)->with('search',$search);
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
            'adpt_name' => 'required',
            'adpt_lname' => 'required',
            'adpt_addr' => 'required',
            'adpt_phone' => 'required',
        ]);
        $adopter = Adopter::findOrFail($id);
        $adopter->adpt_name = $request->input('adpt_name');
        $adopter->adpt_lname = $request->input('adpt_lname');
        $adopter->adpt_addr = $request->input('adpt_addr');
        $adopter->adpt_phone = $request->input('adpt_phone');
        $adopter->save();
         return redirect('/adopter')->with('success', 'Adopter Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adopter = adopter::findOrfail($id);
        if(auth()->user()->employee_type !== "employee"){
            return redirect('/adopter')->with('error','Unauthorized Personnel');
        }
        $adopter->delete();
        return redirect('/adopter')->with('error', 'Adopter Deleted Successfully');
    }
}
