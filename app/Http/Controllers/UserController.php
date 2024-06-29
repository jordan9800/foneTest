<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.user.index')->with(['users' => $users]);
    }
}
