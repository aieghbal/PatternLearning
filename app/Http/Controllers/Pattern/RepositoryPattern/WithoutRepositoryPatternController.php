<?php

namespace App\Http\Controllers\Pattern\RepositoryPattern;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class WithoutRepositoryPatternController extends Controller
{
    public function index() {
        $users = User::where('active', 1)->get();
        return response()->json($users);
    }
}
