<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Rolle;
use App\User_Role;
use App\Client;
use App\Http\Requests\SoapRequest;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::with('user_type')->with('role')->paginate(10);
        return view('users.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $roles = Rolle::all();
      return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SoapRequest $request)
    {
      $new = $request->all();
      $new = array('create' => $new);
      $client = new Client;
      $client->create($new);
      return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $users = User::with('user_type')->with('role')->findOrFail($user)[0];
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(SoapRequest $request, User $user)
    {

        $user_id = array('id' => $user->id);
        $old = $request->all();
        $old = array_merge($user_id,$old);
        $old = array('update' => $old);
        $client = new Client;
        $client->update($old);
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
    public function updateAll(Request $request){
      $ckecked = $request->all();
      User_Role::whereIn('user_id',$ckecked['user_id'])->delete();
      foreach ($ckecked['UserRole'] as $user => $keys) {
        foreach ($keys as $key => $value) {
          User_Role::insert(['user_id' => $user, 'rolle_id' => $key]);
        }
      }
      return redirect()->back();
    }
    public function searchLastname(Request $request){
      $name = $request->name;
      $users = User::with('role')->where('name', $name)->paginate(10);
      $roles = Rolle::all();
      return view('users.index', compact('users', 'roles'));
    }

    public function searchDate(Request $request){
      $created_from = date("Y-m-d", strtotime($request->created_from));
      $created_to = date("Y-m-d", strtotime($request->created_to));
      $users = User::with('role')
      ->whereBetween('created_at',[$created_from, $created_to])
      ->paginate(10);
      $roles = Rolle::all();
      return view('users.index', compact('users', 'roles'));
    }
}
