<?php

namespace App\Http\Controllers\Frontsite;

use App\Http\Controllers\Controller;
use App\Models\Specialist;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LandingController extends Controller
{
    public function __invoke(): View
    {
        $specialists = Specialist::withCount('doctors')->orderBy('created_at', 'desc')->take(5)->get();
        $doctors = Doctor::with('specialist')->orderBy('created_at', 'desc')->take(4)->get();

        return view('pages.frontsite.landing-page.index', [
            'specialists' => $specialists,
            'doctors' => $doctors,
        ]);
    }
}
