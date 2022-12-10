<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MemberController extends Controller
{
    public function index(): View
    {
        $members = Member::query()->with('company')->search(request('search'))->simplePaginate();
        return view('members.index', ['users' => $members]);
    }
}
