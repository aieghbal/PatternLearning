<?php

namespace App\Http\Controllers\DependencyInjection;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\Mailer\Mailer;

class DependencyInjectionController extends Controller
{
    protected $mailer;
    public function __construct(Mailer $mailer) {
        $this->mailer = $mailer;
    }
}
