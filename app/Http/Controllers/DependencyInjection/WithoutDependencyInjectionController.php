<?php

namespace App\Http\Controllers\DependencyInjection;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\Mailer\Mailer;

class WithoutDependencyInjectionController extends Controller
{
    protected $mailer;

    public function __construct() {
        $this->mailer = new Mailer();
    }
}
