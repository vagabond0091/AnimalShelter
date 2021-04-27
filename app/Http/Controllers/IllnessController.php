<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Illness;
use App\Models\Health;

use DB;
class IllnessController extends Controller
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
        $illnesses = illness::with('animal')->get();
        return view('illness.index')->with('illnesses',$illnesses)->with('search',$search);
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
        if(auth()->user()->employee_type !== "veterinarians"){
            return redirect('/illness')->with('error','Unauthorized Personnel');
        }
        return view('illness.create')->with('animal_id',$animal_id)->with('search',$search);
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
            'illness_status' => 'required',
            'description' => 'required',
            'animal_id' => 'required',
        ]);
        $ill_stat = $request->input('illness_status');
        $illness = new Illness;
        $illness->illness_status = $ill_stat;
        $illness->description = $request->input('description');
        $animal_id = $request->input('animal_id');
        $illness->save();
        $illness_id = $illness->id;
        $illness = DB::table('animal_illness')->insert([
            'animal_id' => $animal_id,
            'illness_id' => $illness_id,
            'created_at' => date("Y-m-d"),
        ]);
        $animal = Animal::findOrFail($animal_id);
        if($ill_stat == "cured"){
            $animal->health_id = 1;
            $animal->save();
        }
        else{
            $animal->health_id = 2;
            $animal->save();
        }
        return redirect('/illness')->with('success', 'New Record Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // $animal_id = animal::pluck('name','id');
        // return view('illness.create')->with('animal_id',$animal_id)->with('search',$search);
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
        $illness = illness::findOrFail($id);
        if(auth()->user()->employee_type !== "veterinarians"){
            return redirect('/illness')->with('error','Unauthorized Personnel');
        }
        return view('illness.edit')->with('illness',$illness)->with('search',$search);
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
            'illness_status' => 'required',
            'description' => 'required',
        ]);
        $illness = illness::findOrFail($id);
        $results= $illness->id;
        $animal_id = DB::table('animal_illness')->where('illness_id', $results)->value('animal_id');
        $ill_stat = $request->input('illness_status');
        $illness->illness_status = $ill_stat;
        $illness->description = $request->input('description');
        $illness->save();
        $animal = Animal::findOrFail($animal_id);

        if($ill_stat == "cured"){
            $animal->health_id = 1;
            $animal->save();
        }
        else{
            $animal->health_id = 2;
            $animal->save();
        }
         return redirect('/illness')->with('success', 'Updated Record Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $illness = Illness::findOrFail($id);
        if(auth()->user()->employee_type !== "veterinarians"){
            return redirect('/illness')->with('error','Unauthorized Personnel');
        }
        $illness->delete();
        return redirect('/illness')->with('error', 'Deleted Record Successfully');
    }
}
