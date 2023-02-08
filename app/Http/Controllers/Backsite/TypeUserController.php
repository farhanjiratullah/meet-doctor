<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use App\Models\TypeUser;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TypeUserController extends Controller
{
    public function __invoke(): View
    {
      $type_users = TypeUser::all();

      return view('pages.backsite.management-accesses.type-users.index', [
        'type_users' => $type_users
      ]);
    }
}
