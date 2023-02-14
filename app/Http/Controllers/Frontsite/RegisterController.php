<?php

namespace App\Http\Controllers\Frontsite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function __invoke(): View
    {
        abort_if(!session()->has('success_register'), 403);

        return view('pages.frontsite.success.sign-up');
    }
}
