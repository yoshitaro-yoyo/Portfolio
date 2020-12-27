<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Validation\Rule;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
   	    //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        //policy → HTTPレスポンスのthrowを避ける
        if($user->can('view', $user)) {
            return view('users.show', compact('user'));
        } else {
            return back();
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();

        if($user->can('edit', $user)) {
            return view('users.edit', compact('user'));
        } else {
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $params = $request->validate([
            'first_name' => ['required', 'string', 'max:10'], 
            'last_name' => ['required', 'string', 'max:10'], 
            'zipcode' => ['required', 'numeric', 'digits:7'], 
            'prefecture' => ['required', 'string', 'max:5'], 
            'municipality' => ['required', 'string', 'max:10'], 
            'address' => ['required', 'string', 'max:15'], 
            'apartments' => ['required', 'string', 'max:20'], 
            'email' => ['email', 'string', 'max:128', Rule::unique('users')->ignore(request('user'))], 
            'phone_number' => ['required', 'string', 'numeric', 'digits_between:1,15'], 
        ]);

        $user = Auth::user();

        if($user->can('update', $user)) {
            $user->fill($params)->save();
            return redirect()->route('users.show',  compact('user'));
        } else {
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        if($user->can('delete', $user)) {
            $user->delete();
            return redirect()->route('top');
        } else {
            return back();
        }
    }
}
