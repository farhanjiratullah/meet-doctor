<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use App\Models\TypeUser;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Gate;

class TypeUserController extends Controller
{
    public function __invoke(): View
    {
      abort_if(Gate::denies('type_user_access'), 403);

      $type_users = TypeUser::all();

      return view('pages.backsite.management-accesses.type-users.index', [
        'type_users' => $type_users
      ]);
    }
}
