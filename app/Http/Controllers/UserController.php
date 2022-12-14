<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::query()->withLastLogin()
            ->with('company')->orderBy('id')->simplePaginate();
        return view('users.index', ['users' => $users]);
    }
}
