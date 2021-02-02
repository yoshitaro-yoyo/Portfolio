<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Validation\Rule;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ユーザー情報表示画面
    |--------------------------------------------------------------------------
    */
    public function show($id)
    {
        $user = Auth::user();
        //policy canメソッド → 条件不一致時にHTTPレスポンスのthrowを避ける
        //ログインしているユーザー以外の情報の取得・編集・削除をcanメソッドでアクセス制限
        if($user->can('view', $user)) {
            return view('users.show', compact('user'));
        } else {
            return back();
        }
    }

    /*
    |--------------------------------------------------------------------------
    | ユーザー情報編集画面
    |--------------------------------------------------------------------------
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

    /*
    |--------------------------------------------------------------------------
    | ユーザー情報更新機能
    |--------------------------------------------------------------------------
    */
    public function update($id, Request $request)
    {
        $params = $request->validate([
            'first_name' => ['required', 'string', 'max:16'], 
            'last_name' => ['required', 'string', 'max:16'], 
            'zipcode' => ['required', 'numeric', 'digits:7'], 
            'prefecture' => ['required', 'string', 'max:16'], 
            'municipality' => ['required', 'string', 'max:16'], 
            'address' => ['required', 'string', 'max:32'], 
            'apartments' => ['required', 'string', 'max:32'], 
            'email' => ['email', 'string', 'max:128', Rule::unique('users')->ignore(request('user'))], 
            'phone_number' => ['required', 'string', 'numeric', 'digits_between:1,16'], 
        ]);

        $user = Auth::user();
        if($user->can('update', $user)) {
            $user->fill($params)->save();
            return redirect()->route('users.show',  compact('user'));
        } else {
            return back();
        }
    }

    /*
    |--------------------------------------------------------------------------
    | ユーザー情報削除機能
    |--------------------------------------------------------------------------
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
