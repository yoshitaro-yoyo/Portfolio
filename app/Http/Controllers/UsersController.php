<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User; // Userモデルを使うのに必要なuse文

class UsersController extends Controller
{
    public function index()
    {
        return view('users.edit');
    }
}
