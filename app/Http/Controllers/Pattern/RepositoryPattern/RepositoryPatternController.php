<?php

namespace App\Http\Controllers\Pattern\RepositoryPattern;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use UserRepositoryInterface;

class RepositoryPatternController extends Controller
{
    protected $userRepo;

    public function __construct(UserRepositoryInterface $userRepo) {
        $this->userRepo = $userRepo;
    }

    public function index() {
        return response()->json($this->userRepo->getActiveUsers());
    }
}
