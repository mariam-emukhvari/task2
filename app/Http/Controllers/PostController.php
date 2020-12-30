<?php

namespace App\Http\Controllers;

use App\Models\CustomUser;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $users = CustomUser::all();
        return view('welcome', compact('users'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'srname' => 'required',
            'address' => 'required',
            'biography' => 'required',
            'dayofbirth' => 'required',
        ]);

        CustomUser::create([
           'name' => $request->name,
           'srname' => $request->srname,
           'address' => $request->address,
           'biography' => $request->biography,
           'dayofbirth' => $request->dayofbirth,
        ]);

        return redirect('/');
    }
}
