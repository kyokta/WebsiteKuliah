<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();

        return view('user.index', compact('user'));
    }

    public function edit($id)
    {
        $detailUser = User::find($id);

        return view('user.edit', compact('detailUser'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'photo' => 'image|nullable|max:1999'
        ]);

        if ($request->hasFile('photo')) {
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('photo')->storeAs('public/photos', $filenameSimpan);
        }

        $user = User::find($request->id);
        $user->name = $request->name;

        if ($request->hasFile('photo')) {
            $user->photo = $filenameSimpan;
        }

        $user->save();

        return redirect()->route('user');
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('user');
    }
}
