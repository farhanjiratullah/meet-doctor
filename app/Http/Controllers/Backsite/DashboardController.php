<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Gate;

class DashboardController extends Controller
{
    public function __invoke(): View {
        abort_if(Gate::denies('dashboard_access'), 403);

        return view('pages.backsite.dashboard.index');
    }
}
