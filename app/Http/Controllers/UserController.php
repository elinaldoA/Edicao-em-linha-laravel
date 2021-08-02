<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::paginate(10);

        return view('users', compact('users'));
    }
    public function update(Request $request)
    {
        if ($request->ajax()) {
            User::find($request->pk)
                ->update([
                    $request->name => $request->value
                ]);
  
            return response()->json(['success' => true]);
        }
    }
}
