<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $types = Type::all();
        $users = User::all();

        return view('admin.index', ['types' => $types, 'users' => $users]);
    }
}
