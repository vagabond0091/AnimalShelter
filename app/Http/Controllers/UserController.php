<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
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

        $users = User::all();

        return view('user.index')->with('users',$users)->with('search',$search);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $search = null;
         if(auth()->user()->employee_type !== "employee"){
            return redirect('/user')->with('error','Unauthorized Personnel');
        }
        return view('user.create')->with('search',$search);
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
            'email' => 'required',
            'password' => 'required|confirmed',
            'employee_type' => 'required',

        ]);

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password =  $request->input('password');;
        $user->employee_type = $request->input('employee_type');
        $user->save();
        return redirect('/user')->with('success','User Created Successfully');
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
        $user = User::findOrFail($id);
         if(auth()->user()->employee_type !== "employee"){
            return redirect('/user')->with('error','Unauthorized Personnel');
        }
        return view('user.edit')->with('user',$user)->with('search',$search);
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
            'email' => 'required',
            'employee_type' => 'required',

        ]);
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->employee_type = $request->input('employee_type');
        $user->save();
        return redirect('/user')->with('success','Personnel Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $user = User::findOrFail($id);
          if(auth()->user()->employee_type !== "employee"){
               return redirect('/animal')->with('error','Unauthorized Personnel');
           }
          $user->delete();
          return redirect('/user')->with('error','Personnel Delete Successfully');
    }
}
