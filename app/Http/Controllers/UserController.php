<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index():View
    {
        $users =  User::query()->withLastLoginAt()->with('company')->orderBy('name')->simplePaginate();
        return view('users.index',['users'=>$users]);
    }
}
